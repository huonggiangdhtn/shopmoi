<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Tag\Controllers\TagController;

Route::group(['prefix' => 'admin/', 'as' => 'admin.'], function () {
    Route::resource('tag', TagController::class);
    Route::post('tag_status', [TagController::class, 'tagStatus'])->name('tag.status');
    Route::get('tag_search', [TagController::class, 'tagSearch'])->name('tag.search');

    
});