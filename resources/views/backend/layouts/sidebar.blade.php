<nav class="side-nav">

    <ul>
        <li>
            <a href="{{route('admin.home')}}" class="side-menu side-menu{{$active_menu=='dashboard'?'--active':''}}">
                <div class="side-menu__icon"> <i data-lucide="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="{{route('admin.comment.index')}}" class="side-menu {{$active_menu=='comment_list'||$active_menu=='comment_add'?'side-menu--active':''}}">
                <div class="side-menu__icon"> <i data-lucide="package"></i> </div>
                <div class="side-menu__title"> Bình luận</div>
            </a>

        </li>

        <!-- Blog -->
        <li>
            <a href="javascript:;.html" class="side-menu side-menu{{( $active_menu=='blog_list'|| $active_menu=='blog_add'||$active_menu=='blogcat_list'|| $active_menu=='blogcat_add' )?'--active':''}}">
                <div class="side-menu__icon"> <i data-lucide="align-center"></i> </div>
                <div class="side-menu__title">
                    Bài viết
                    <div class="side-menu__sub-icon transform"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{ ($active_menu=='blog_list'|| $active_menu=='blog_add'||$active_menu=='blogcat_list'|| $active_menu=='blogcat_add')?'side-menu__sub-open':''}}">
                <li>
                    <a href="{{route('admin.blog.index')}}" class="side-menu {{$active_menu=='blog_list'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="compass"></i> </div>
                        <div class="side-menu__title">Danh sách bài viết </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.blog.create')}}" class="side-menu {{$active_menu=='blog_add'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="plus"></i> </div>
                        <div class="side-menu__title"> Thêm bài viết</div>
                    </a>
                </li>

                <li>
                    <a href="{{route('admin.blogcategory.index')}}" class="side-menu {{$active_menu=='blogcat_list'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="hash"></i> </div>
                        <div class="side-menu__title">Danh mục bài viết </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{($active_menu=='tag_list'|| $active_menu=='tag_add')?'side-menu--active':''}}">
                <div class="side-menu__icon"> <i data-lucide="anchor"></i> </div>
                <div class="side-menu__title">
                    Tag
                    <div class="side-menu__sub-icon transform"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{($active_menu=='tag_list'|| $active_menu=='tag_add')?'side-menu__sub-open':''}}">
                <li>
                    <a href="{{ route('admin.tag.index') }}" class="side-menu {{$active_menu=='tag_list'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="anchor"></i> </div>
                        <div class="side-menu__title">Danh sách Tag </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.tag.create') }}" class="side-menu {{$active_menu=='tag_add'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="plus"></i> </div>
                        <div class="side-menu__title"> Thêm Tag</div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu  class=" side-menu {{($active_menu =='ugroup_add'|| $active_menu=='ugroup_list' || $active_menu =='ctm_add'|| $active_menu=='ctm_list'  )?'side-menu--active':''}}">
                <div class="side-menu__icon"> <i data-lucide="user"></i> </div>
                <div class="side-menu__title">
                    Người dùng
                    <div class="side-menu__sub-icon "> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{($active_menu =='ugroup_add'|| $active_menu=='ugroup_list' || $active_menu =='ctm_add'|| $active_menu=='ctm_list')?'side-menu__sub-open':''}}">
                <li>
                    <a href="{{route('admin.user.index')}}" class="side-menu {{$active_menu=='ctm_list'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="users"></i> </div>
                        <div class="side-menu__title">Danh sách người dùng</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.user.create')}}" class="side-menu {{$active_menu=='ctm_add'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="plus"></i> </div>
                        <div class="side-menu__title"> Thêm người dùng</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.ugroup.index')}}" class="side-menu {{$active_menu=='ugroup_list'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="circle"></i> </div>
                        <div class="side-menu__title">Ds nhóm người dùng</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.ugroup.create')}}" class="side-menu {{$active_menu=='ugroup_add'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="plus"></i> </div>
                        <div class="side-menu__title"> Thêm nhóm người dùng</div>
                    </a>
                </li>
            </ul>
        </li>

        <!--Quản lí sản phẩm -->
        <li>
            <?php
            // Fetch the count of pending orders
            $reg_totals = \DB::select("select count(id) as tong from orders where status = 'pending'");
            $reg_total = $reg_totals[0]->tong;
            ?>
            <a href="javascript:;" class="side-menu {{($active_menu == 'pro_add' || $active_menu == 'pro_list' || $active_menu == 'brand_list' || $active_menu == 'cat_add' || $active_menu == 'cat_list' || $active_menu == 'or_list') ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"><i data-lucide="box"></i></div>
                <div class="side-menu__title">
                    Quản lí sản phẩm
                    <div class="side-menu__sub-icon"><i data-lucide="chevron-down"></i></div>
                </div>
            </a>
            <ul class="{{($active_menu == 'pro_add' || $active_menu == 'pro_list' || $active_menu == 'brand_list' || $active_menu == 'cat_add' || $active_menu == 'cat_list' || $active_menu == 'or_list') ? 'side-menu__sub-open' : ''}}">

                <!-- Order Management (Đơn đặt hàng) -->
                <li>
                    <a href="{{route('admin.order.index')}}" class="side-menu {{$active_menu == 'or_list' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"><i data-lucide="shopping-cart"></i></div>
                        <div class="side-menu__title"> Đơn đặt hàng
                            @if ($reg_total > 0)
                            <div style="margin-top:-0.5rem"> &nbsp;
                                <span class="text-xs px-1 rounded-full bg-success text-white mr-1">{{$reg_total}}</span>
                            </div>
                            @endif
                        </div>
                    </a>
                </li>

                <!-- Product List -->
                <li>
                    <a href="{{route('admin.product.index')}}" class="side-menu {{$active_menu == 'pro_list' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"><i data-lucide="list"></i></div>
                        <div class="side-menu__title">Danh sách hàng hóa</div>
                    </a>
                </li>

                <!-- Add New Product -->
                <li>
                    <a href="{{route('admin.product.create')}}" class="side-menu {{$active_menu == 'pro_add' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"><i data-lucide="plus"></i></div>
                        <div class="side-menu__title">Thêm hàng hóa</div>
                    </a>
                </li>

                <!-- Category List -->
                <li>
                    <a href="{{route('admin.category.index')}}" class="side-menu {{$active_menu == 'cat_list' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"><i data-lucide="archive"></i></div>
                        <div class="side-menu__title">Danh sách danh mục</div>
                    </a>
                </li>

                <!-- Add New Category -->
                <li>
                    <a href="{{route('admin.category.create')}}" class="side-menu {{$active_menu == 'cat_add' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"><i data-lucide="plus"></i></div>
                        <div class="side-menu__title">Thêm danh mục</div>
                    </a>
                </li>

                <!-- Brand List -->
                <li>
                    <a href="{{route('admin.brand.index')}}" class="side-menu {{$active_menu == 'brand_list' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"><i data-lucide="package"></i></div>
                        <div class="side-menu__title">Ds nhà sản xuất</div>
                    </a>
                </li>

                <!-- Add New Brand -->
                <li>
                    <a href="{{route('admin.brand.create')}}" class="side-menu {{$active_menu == 'brand_add' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"><i data-lucide="plus"></i></div>
                        <div class="side-menu__title">Thêm nhà sản xuất</div>
                    </a>
                </li>
            </ul>
        </li>
                <!-- Quản lí kho -->
                <li>
            <a href="javascript:;" class="side-menu {{($active_menu == 'wh_list' || $active_menu == 'wh_add') ? 'side-menu--active' : ''}}">
                <div class="side-menu__icon"> <i data-lucide="box"></i> </div>
                <div class="side-menu__title">
                    Quản lí kho
                    <div class="side-menu__sub-icon transform"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{($active_menu == 'wh_list' || $active_menu == 'wh_add') ? 'side-menu__sub-open' : ''}}">
                <li>
                    <a href="{{route('admin.warehouse.index')}}" class="side-menu {{$active_menu == 'wh_list' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-lucide="list"></i> </div>
                        <div class="side-menu__title">Danh sách kho</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.warehouse.create')}}" class="side-menu {{$active_menu == 'wh_add' ? 'side-menu--active' : ''}}">
                        <div class="side-menu__icon"> <i data-lucide="plus"></i> </div>
                        <div class="side-menu__title">Thêm kho</div>
                    </a>
                </li>
            </ul>
        </li>

        <!-- setting menu -->
        <li>
            <a href="javascript:;.html" class="side-menu side-menu{{($active_menu=='cmdfunction_list'||$active_menu=='cmdfunction_add'||$active_menu=='role_list'||$active_menu=='role_add'||$active_menu=='kiot'|| $active_menu=='setting_list'|| $active_menu=='log_list'||$active_menu=='banner_add'|| $active_menu=='banner_list')?'--active':''}}">
                <div class="side-menu__icon"> <i data-lucide="settings"></i> </div>
                <div class="side-menu__title">
                    Cài đặt
                    <div class="side-menu__sub-icon transform"> <i data-lucide="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{($active_menu=='cmdfunction_list'||$active_menu=='cmdfunction_add'||$active_menu=='role_list'||$active_menu=='role_add'||$active_menu=='kiot'|| $active_menu=='setting_list'|| $active_menu=='banner_add'|| $active_menu=='banner_list')?'side-menu__sub-open':''}}">

                <li>
                    <a href="{{route('admin.role.index',1)}}" class="side-menu {{$active_menu=='role_list'||$active_menu=='role_add'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="octagon"></i> </div>
                        <div class="side-menu__title"> Roles</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.cmdfunction.index',1)}}" class="side-menu {{$active_menu=='cmdfunction_list'||$active_menu=='cmdfunction_add'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="moon"></i> </div>
                        <div class="side-menu__title"> Chức năng</div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.setting.edit',1)}}" class="side-menu {{$active_menu=='setting_list'?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="key"></i> </div>
                        <div class="side-menu__title"> Thông tin công ty</div>
                    </a>
                </li>
                <li>
                    <a href="javascript:;" class="side-menu {{($active_menu=='banner_list'||$active_menu=='banner_add')?'side-menu--active':''}}">
                        <div class="side-menu__icon"> <i data-lucide="image"></i> </div>
                        <div class="side-menu__title">
                            Banner
                            <div class="side-menu__sub-icon transform"> <i data-lucide="chevron-down"></i> </div>
                        </div>
                    </a>
                    <ul class="{{($active_menu=='banner_list'||$active_menu=='banner_add')?'side-menu__sub-open':''}}">
                        <li>
                            <a href="{{route('admin.banner.index')}}" class="side-menu {{$active_menu=='banner_list'?'side-menu--active':''}}">
                                <div class="side-menu__icon"> <i data-lucide="image"></i> </div>
                                <div class="side-menu__title">Danh sách banner</div>
                            </a>
                        </li>
                        <li>
                            <a href="{{route('admin.banner.create')}}" class="side-menu {{$active_menu=='banner_add'?'side-menu--active':''}}">
                                <div class="side-menu__icon"> <i data-lucide="plus"></i> </div>
                                <div class="side-menu__title"> Thêm banner</div>
                            </a>
                        </li>
                    </ul>
                </li>



            </ul>
        </li>


        <!-- product category menu -->
        <!-- Product Management Menu -->


    </ul>
</nav>