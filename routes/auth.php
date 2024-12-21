<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'storeRegister')->name('register');
    Route::get('login', 'login')->name('login');
    Route::post('login', 'storeLogin')->name('login');
    Route::post('logout', 'logout')->name('auth.logout');
});
