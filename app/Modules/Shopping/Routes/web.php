<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Shopping\Controllers\CategoryController;
use App\Modules\Shopping\Controllers\BrandController;
use App\Modules\Shopping\Controllers\ProductController;
use App\Modules\Shopping\Controllers\OrderController;

Route::group(['prefix' => 'admin/', 'as' => 'admin.'], function () {


    Route::resource('category', CategoryController::class);
    Route::post('category_status',[CategoryController::class,'categoryStatus'])->name('category.status');
    Route::get('category_search',[CategoryController::class,'categorySearch'])->name('category.search');

    ///Brand section
    Route::resource('brand', BrandController::class);
    Route::post('brand_status',[BrandController::class,'brandStatus'])->name('brand.status');
    Route::get('brand_search',[BrandController::class,'brandSearch'])->name('brand.search');

    
    ///Product section
    Route::resource('product', ProductController::class);
    Route::post('product_status',[ProductController::class,'productStatus'])->name('product.status');
    Route::get('product_search',[ProductController::class,'productSearch'])->name('product.search');
    Route::get('product_sort',[ProductController::class,'productSort'])->name('product.sort');
    Route::get('product_jsearch',[ProductController::class,'productJsearch'])->name('product.jsearch');
    Route::get('product_stock_quantity',[ProductController::class,'productStock_quantity'])->name('product.stock_quantity');
    Route::get('product_jsearchwi',[ProductController::class,'productJsearchwi'])->name('product.jsearchwi');
    Route::get('product_groupprice',[ProductController::class,'productGPriceSearch'])->name('product.groupprice');
    Route::get('product_jsearchwo',[ProductController::class,'productJsearchwo'])->name('product.jsearchwo');
    Route::post('product_add',[ProductController::class,'productAdd'])->name('product.add');
    Route::get('product_jsearchwf',[ProductController::class,'productJsearchwf'])->name('product.jsearchwf');
    Route::get('product_jsearchic',[ProductController::class,'productJsearchic'])->name('product.jsearchic');
    Route::get('product_tsearch',[ProductController::class,'productTsearch'])->name('product.tsearch');
    Route::get('product_msearch',[ProductController::class,'productMsearch'])->name('product.msearch');
    Route::post('product_addm',[ProductController::class,'productAddm'])->name('product.addm');
    Route::get('product_jsearchms',[ProductController::class,'productJsearchms'])->name('product.jsearchms');
    Route::get('product_jsearchmtw',[ProductController::class,'productJsearchmtw'])->name('product.jsearchmtw');
    Route::get('product_jsearchptw',[ProductController::class,'productJsearchptw'])->name('product.jsearchptw');
    Route::get('product_price/{id}',[ProductController::class,'productPriceView'])->name('product.priceview');
    Route::post('product_price',[ProductController::class,'productPriceUpdate'])->name('product.priceupdate');
    Route::get('product_print',[ProductController::class,'productPrint'])->name('product.print');

    /// order section
    Route::resource('order', OrderController::class);
    Route::get('order_search',[OrderController::class,'orderSearch'])->name('order.search');
    Route::get('order_getProductList',[OrderController::class,'getProductList'])->name('order.getProductList');
    Route::get('order_out/{id}',[OrderController::class,'orderOut'])->name('order.out');
    Route::post('order_outupdate',[OrderController::class,'orderOutUpdate'])->name('order.outupdate');

});