<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
})
->name('home');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])
        ->name('admin.index');
});

Route::get('/products', [ProductController::class, 'index'])
    ->name('products');

Route::get('/contact', function () {
    return view('contact');
})
    ->name('contact');


