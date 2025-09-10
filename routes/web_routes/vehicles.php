
<?php

use App\Http\Controllers\Vehicle\VehicleController;
use Illuminate\Support\Facades\Route;

Route::controller(VehicleController::class)->prefix('vehicles')->name('vehicles.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::delete('/', 'delete')->name('delete');
    Route::put('/{id}', 'update')->name('update');

    Route::prefix('partials')->name('partials.')->group(function () {
        Route::get('/vehicles-table', 'vehicleTable')->name('vehicles-table');
        Route::get('/modals/edit-vehicle-modal', 'editVehicleModal')->name('edit-vehicle-modal');
    });
});
