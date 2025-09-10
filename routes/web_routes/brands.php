
<?php

use App\Http\Controllers\Brand\BrandController;
use Illuminate\Support\Facades\Route;

Route::controller(BrandController::class)->prefix('brands')->name('brands.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'store')->name('store');
    Route::delete('/', 'delete')->name('delete');
    Route::put('/{id}', 'update')->name('update');
    // Route::get('/{id}/edit', 'editBrandModal')->name('editBrandModal');

    Route::prefix('partials')->name('partials.')->group(function () {
        Route::get('/brands-table', 'brandTable')->name('brands-table');
        Route::get('/modals/edit-brand-modal', 'editBrandModal')->name('edit-brand-modal');
    });
});
