<?php

use App\Http\Controllers\Admin\Home\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/admin/home',[HomeController::class,'index'])->name('admin.home');