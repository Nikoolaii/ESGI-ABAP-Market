<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AdminController;


Route::get('/', function () {
    return view('home');
});

Auth::routes();
