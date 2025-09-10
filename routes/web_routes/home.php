
<?php

use App\Http\Controllers\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->prefix('home')->name('home.')->group(function () {
    Route::get('/', 'index')->name('index');
});
