<?php

namespace App\Modules\Tag\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Modules\TagBlog\Models\TagBlog;
use App\Modules\Tag\Models\Tag;
use App\Modules\TagProduct\Models\TagProduct;

class TagController extends Controller
{
    protected $pagesize;

    public function __construct()
    {
        $this->pagesize = env('NUMBER_PER_PAGE', '20');
        $this->middleware('auth');
    }

    public function store_blog_tag($blog_id, $tag_ids)
    {
        if (!$tag_ids || count($tag_ids) == 0) {
            return;
        }
        foreach ($tag_ids as $tag_id) {
            $tag = Tag::find($tag_id);
            if (!$tag) {
                $datatag['title'] = $tag_id;
                $slug = Str::slug($datatag['title']);
                $slug_count = Tag::where('slug', $slug)->count();
                if ($slug_count > 0) {
                    $slug .= time() . '-' . $slug;
                }
                $datatag['slug'] = $slug;

                $tag = Tag::create($datatag);
                sleep(1);
            }
            $data['tag_id'] = $tag->id;
            $data['blog_id'] = $blog_id;
            TagBlog::create($data);
            $tag->hit += 1;
            $tag->save();
        }
    }

    public function update_blog_tag($blog_id, $tag_ids)
    {
        DB::table('tag_blogs')->where('blog_id', $blog_id)->delete();
        $this->store_blog_tag($blog_id, $tag_ids);
    }

    public function update_product_tag($product_id, $tag_ids)
    {
        DB::table('tag_products')->where('product_id', $product_id)->delete();
        $this->store_product_tag($product_id, $tag_ids);
    }

    public function store_product_tag($product_id, $tag_ids)
    {
        if (!$tag_ids || count($tag_ids) == 0) {
            return;
        }
        foreach ($tag_ids as $tag_id) {
            $tag = Tag::find($tag_id);
            if (!$tag) {
                $datatag['title'] = $tag_id;
                $slug = Str::slug($datatag['title']);
                $slug_count = Tag::where('slug', $slug)->count();
                if ($slug_count > 0) {
                    $slug .= time() . '-' . $slug;
                }
                $datatag['slug'] = $slug;

                $tag = Tag::create($datatag);
            }
            $data['tag_id'] = $tag->id;
            $data['product_id'] = $product_id;
            TagProduct::create($data);
            $tag->hit += 1;
            $tag->save();
            sleep(1);
        }
    }

    public function index()
    {
        $func = "tag_list";
        if (!$this->check_function($func)) {
            return redirect()->route('unauthorized');
        }

        $active_menu = "tag_list";
        $breadcrumb = '
        <li class="breadcrumb-item"><a href="#">/</a></li>
        <li class="breadcrumb-item active" aria-current="page"> tags </li>';
        $tags = Tag::orderBy('id', 'DESC')->paginate($this->pagesize);
        return view('Tag::index', compact('tags', 'breadcrumb', 'active_menu'));
    }

    public function tagSearch(Request $request)
    {
        $func = "tag_list";
        if (!$this->check_function($func)) {
            return redirect()->route('unauthorized');
        }

        if ($request->datasearch) {
            $active_menu = "tag_list";
            $searchdata = $request->datasearch;
            $tags = DB::table('tags')->where('title', 'LIKE', '%' . $request->datasearch . '%')
                ->paginate($this->pagesize)->withQueryString();
            $breadcrumb = '
            <li class="breadcrumb-item"><a href="#">/</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="' . route('admin.tag.index') . '">tags</a></li>
            <li class="breadcrumb-item active" aria-current="page"> tìm kiếm </li>';

            return view('Tag::search', compact('tags', 'breadcrumb', 'searchdata', 'active_menu'));
        } else {
            return redirect()->route('admin.tag.index')->with('error', 'Không có thông tin tìm kiếm!');
        }
    }

    public function tagStatus(Request $request)
    {
        $func = "tag_edit";
        if (!$this->check_function($func)) {
            return redirect()->route('unauthorized');
        }
        if ($request->mode == 'true') {
            DB::table('tags')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('tags')->where('id', $request->id)->update(['status' => 'inactive']);
        }
        return response()->json(['msg' => "Cập nhật thành công", 'status' => true]);
    }

    public function create()
    {
        $func = "tag_add";
        if (!$this->check_function($func)) {
            return redirect()->route('unauthorized');
        }
        $active_menu = "tag_add";
        $breadcrumb = '
        <li class="breadcrumb-item"><a href="#">/</a></li>
        <li class="breadcrumb-item" aria-current="page"><a href="' . route('admin.tag.index') . '">tags</a></li>
        <li class="breadcrumb-item active" aria-current="page"> tạo tags </li>';
        return view('Tag::create', compact('breadcrumb', 'active_menu'));
    }

    public function store(Request $request)
    {
        $func = "tag_add";
        if (!$this->check_function($func)) {
            return redirect()->route('unauthorized');
        }

        // Validate the request
        $this->validate($request, [
            'title' => 'string|required',
            'status' => 'nullable|in:active,inactive',
        ]);

        // Prepare data for creating a new tag
        $data = $request->all();
        $slug = Str::slug($request->input('title'));
        $slug_count = Tag::where('slug', $slug)->count();

        // Ensure slug is unique
        if ($slug_count > 0) {
            $slug .= '-' . time();  // Add timestamp to avoid duplicate slug
        }

        $data['slug'] = $slug;

        // Attempt to create the new tag
        try {
            $tag = Tag::create($data);
            // Clear any previous error session data to avoid showing old errors
            $request->session()->forget('error');
            return redirect()->route('admin.tag.index')->with('success', 'Tạo tag thành công!');
        } catch (\Exception $e) {
            // Log the exception if necessary for debugging
            \Log::error($e->getMessage());

            // Clear any previous success session data to avoid showing old successes
            $request->session()->forget('success');
            // Redirect back with error message
            return back()->with('error', 'Có lỗi xảy ra trong quá trình tạo tag!');
        }
    }


    public function show(string $id)
    {
        // Placeholder for show method
    }

    public function edit(string $id)
    {
        $func = "tag_edit";
        if (!$this->check_function($func)) {
            return redirect()->route('unauthorized');
        }
        $tag = Tag::find($id);
        if ($tag) {
            $active_menu = "tag_list";
            $breadcrumb = '
            <li class="breadcrumb-item"><a href="#">/</a></li>
            <li class="breadcrumb-item" aria-current="page"><a href="' . route('admin.tag.index') . '">tags</a></li>
            <li class="breadcrumb-item active" aria-current="page"> điều chỉnh tags </li>';
            return view('Tag::edit', compact('tag', 'breadcrumb', 'active_menu'));
        } else {
            return back()->with('error', 'Không tìm thấy dữ liệu');
        }
    }

    public function update(Request $request, string $id)
    {
        $func = "tag_edit";
        if (!$this->check_function($func)) {
            return redirect()->route('unauthorized');
        }

        $tag = Tag::find($id);
        if ($tag) {
            $this->validate($request, [
                'title' => 'string|required',
                'status' => 'nullable|in:active,inactive',
            ]);
            $data = $request->all();
            $slug = Str::slug($request->input('title'));
            $slug_count = Tag::where('slug', $slug)->where('id', '!=', $id)->count();
            if ($slug_count > 0) {
                $slug .= time() . '-' . $slug;
            }
            $data['slug'] = $slug;

            $status = $tag->fill($data)->save();
            if ($status) {
                return redirect()->route('admin.tag.index')->with('success', 'Cập nhật thành công');
            } else {
                return back()->with('error', 'Có lỗi xảy ra trong quá trình cập nhật!');
            }
        } else {
            return back()->with('error', 'Không tìm thấy dữ liệu');
        }
    }

    public function destroy(string $id)
    {
        $func = "tag_delete";
        if (!$this->check_function($func)) {
            return redirect()->route('unauthorized')->with('error', 'Bạn không có quyền xóa tag này.');
        }

        $tag = Tag::find($id);
        if ($tag) {
            $status = $tag->delete();
            if ($status) {
                // Xóa thông báo lỗi để tránh xung đột
                session()->forget('error');
                return redirect()->route('admin.tag.index')->with('success', 'Xóa tag thành công!');
            } else {
                session()->forget('success');
                return back()->with('error', 'Có lỗi xảy ra trong quá trình xóa!');
            }
        } else {
            session()->forget('success');
            return back()->with('error', 'Không tìm thấy dữ liệu');
        }
    }
}
