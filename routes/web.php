<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::get('/', function () {
        return redirect()->route('login');
    });

    require __DIR__ . '/web_routes/auth.php';

    Route::middleware('auth')->prefix('app')->name('app.')->group(function () {
        require __DIR__ . '/web_routes/home.php';
        require __DIR__ . '/web_routes/brands.php';
        require __DIR__ . '/web_routes/clients.php';
        require __DIR__ . '/web_routes/models.php';
        require __DIR__ . '/web_routes/vehicles.php';
    });
});
