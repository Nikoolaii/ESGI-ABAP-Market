<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ContactController;
use Illuminate\Support\Facades\Auth;


// Route::prefix('home')->group(function () {
//     Route::get('/', [HomeController::class, 'index'])
//         ->name('home');
// });

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])
        ->name('admin.index');
});

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::post('/products/show/{id}', [ProductController::class, 'show'])
    ->name('products.show');


Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');

Route::post('/contact/answer/{id}', [ContactController::class, 'show'])
    ->name('contact.show');
