
<?php

use App\Http\Controllers\Client\ClientController;
use Illuminate\Support\Facades\Route;

Route::controller(ClientController::class)->prefix('clients')->name('clients.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::delete('/', 'delete')->name('delete');
    Route::put('/{id}', 'update')->name('update');

    Route::prefix('partials')->name('partials.')->group(function () {
        Route::get('/clients-table', 'clientTable')->name('clients-table');
        Route::get('/modals/edit-client-modal', 'editClientModal')->name('edit-client-modal');
    });
});
