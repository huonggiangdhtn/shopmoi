<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Comment\Controllers\CommentController;

Route::group(['prefix' => 'admin/', 'as' => 'admin.'], function () {
    Route::resource('comment', CommentController::class);
    Route::post('comment_status',[CommentController::class,'commentStatus'])->name('comment.status');
    Route::get('comment_search',[CommentController::class,'commentSearch'])->name('comment.search');
      
});