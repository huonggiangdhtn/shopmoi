<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Banner\Controllers\BannerController;

Route::group(['prefix' => 'admin/', 'as' => 'admin.'], function () {
    Route::resource('banner', BannerController::class);
    Route::post('banner_status',[BannerController::class,'bannerStatus'])->name('banner.status');
    Route::get('banner_search',[BannerController::class,'bannerSearch'])->name('banner.search');
});