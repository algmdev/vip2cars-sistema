
<?php

use App\Http\Controllers\ModelVehicle\ModelVehicleController;
use Illuminate\Support\Facades\Route;

Route::controller(ModelVehicleController::class)->prefix('models')->name('models.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::delete('/', 'delete')->name('delete');
    Route::put('/{id}', 'update')->name('update');

    Route::prefix('partials')->name('partials.')->group(function () {
        Route::get('/models-table', 'modelTable')->name('models-table');
        Route::get('/modals/edit-model-modal', 'editModelModal')->name('edit-model-modal');
    });
});
