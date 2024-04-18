<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('home');
});

Auth::routes();
