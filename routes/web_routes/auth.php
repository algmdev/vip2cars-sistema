
<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix('auth')->name('auth.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::post('/', 'login')->name('login');
});
