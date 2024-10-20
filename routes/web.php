<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('/admin', function () {
//     //xuly 
//     return view('backend.index');
// });
Route::get('/admin/login',[ \App\Http\Controllers\Auth\LoginController::class,'viewlogin'])->name('admin.login');
Route::post('/admin/login',[ \App\Http\Controllers\Auth\LoginController::class,'login'])->name('admin.checklogin');
 
Route::group( ['prefix'=>'admin/','middleware'=>'admin.auth', 'as'=>'admin.'],function(){
    Route::get('/',[ \App\Http\Controllers\AdminController::class,'index'])->name('home');
    Route::post('/logout',[ \App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');
   
    Route::get('/dasboard', [App\Http\Controllers\AdminController::class, 'index'])->name('dasboard');

    //User section
    Route::resource('user', \App\Http\Controllers\UserController::class);
    Route::post('user_status',[\App\Http\Controllers\UserController::class,'userStatus'])->name('user.status');
    Route::get('user_search',[\App\Http\Controllers\UserController::class,'userSearch'])->name('user.search');
    Route::get('user_sort',[\App\Http\Controllers\UserController::class,'userSort'])->name('user.sort');
    Route::post('user_detail',[\App\Http\Controllers\UserController::class,'userDetail'])->name('user.detail');
    Route::post('user_profile',[\App\Http\Controllers\UserController::class,'userUpdateProfile'])->name('user.profileupdate');
    Route::get('user_profile',[\App\Http\Controllers\UserController::class,'userViewProfile'])->name('user.profileview');
   ///UGroup section
   Route::resource('ugroup', \App\Http\Controllers\UGroupController::class);
   Route::post('ugroup_status',[\App\Http\Controllers\UGroupController::class,'ugroupStatus'])->name('ugroup.status');
   Route::get('ugroup_search',[\App\Http\Controllers\UGroupController::class,'ugroupSearch'])->name('ugroup.search');

  ///Role section
  Route::resource('role', \App\Http\Controllers\RoleController::class);
  Route::post('role_status',[\App\Http\Controllers\RoleController::class,'roleStatus'])->name('role.status');
  Route::get('role_search',[\App\Http\Controllers\RoleController::class,'roleSearch'])->name('role.search');
  Route::get('role_function\{id}',[\App\Http\Controllers\RoleController::class,'roleFunction'])->name('role.function');
  Route::get('role_selectall\{id}',[\App\Http\Controllers\RoleController::class,'roleSelectall'])->name('role.selectall');
  
  Route::post('functionstatus',[\App\Http\Controllers\RoleController::class,'roleFucntionStatus'])->name('role.functionstatus');
  
    ///cfunction section
    Route::resource('cmdfunction', \App\Http\Controllers\CFunctionController::class);
    Route::post('cmdfunction_status',[\App\Http\Controllers\CFunctionController::class,'cmdfunctionStatus'])->name('cmdfunction.status');
    Route::get('cmdfunction_search',[\App\Http\Controllers\CFunctionController::class,'cmdfunctionSearch'])->name('cmdfunction.search');
   
    /// Setting  section
    Route::resource('setting', \App\Http\Controllers\SettingController::class);
       
    /////file upload/////////

    Route::post('avatar-upload', [\App\Http\Controllers\FilesController::class, 'avartarUpload' ])->name('upload.avatar');

    Route::post('product-upload', [\App\Http\Controllers\FilesController::class, 'productUpload' ])->name('upload.product');
    Route::post('upload-ckeditor', [\App\Http\Controllers\FilesController::class, 'ckeditorUpload' ])->name('upload.ckeditor');

   
});

// use App\Modules\Blog\Controllers\BlogController;
// use App\Modules\Blog\Controllers\BlogCategoryController;
// Route::group( ['prefix'=>'admin/'  , 'as' => 'admin.' ],function(){
   
//      ///BlogCategory section
//      Route::resource('blogcategory',  BlogCategoryController::class);
//      Route::post('blogcategory_status',[ BlogCategoryController::class,'blogcatStatus'])->name('blogcategory.status');
//      Route::get('blogcategory_search',[ BlogCategoryController::class,'blogcatSearch'])->name('blogcategory.search');
//      ///Blog section
//      Route::resource('blog', BlogController::class);
//      Route::post('blog_status',[ BlogController::class,'blogStatus'])->name('blog.status');
//      Route::get('blog_search',[ BlogController::class,'blogSearch'])->name('blog.search');
 
 
// });