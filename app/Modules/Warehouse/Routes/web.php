
<?php

use Illuminate\Support\Facades\Route;
use App\Modules\Warehouse\Controllers\WarehouseController;

Route::group(['prefix' => 'admin/', 'as' => 'admin.'], function () {

    Route::resource('warehouse', WarehouseController::class);
    Route::post('warehouse_status',[WarehouseController::class,'warehouseStatus'])->name('warehouse.status');
    Route::get('warehouse_search',[WarehouseController::class,'warehouseSearch'])->name('warehouse.search');
});