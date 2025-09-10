<?php

use Illuminate\Support\Facades\Route;

Route::middleware('web')->group(function () {
    Route::get('/', function () {
        return redirect()->route('auth.index');
    });

    require __DIR__ . '/web_routes/auth.php';
});
