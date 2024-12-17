<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Admin.pages.home.index');
});


require_once(__DIR__ . '/admin.php');
