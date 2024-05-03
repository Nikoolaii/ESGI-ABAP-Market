<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\ProductsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


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
//        ->middleware('IsAdmin');

    Route::resource('products', ProductsController::class)
        ->name('index', 'admin.products.index');

    Route::prefix('orders')->group(function(){
        Route::get('/', [OrderController::class, 'index'])
            ->name('admin.orders.index');

        Route::get('/show/{id}', [OrderController::class, 'show'])
            ->name('admin.orders.show');

        Route::post('/delete/{id}', [OrderController::class, 'delete'])
            ->name('admin.orders.delete');
    });
});


Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::post('/products/show/{id}', [ProductController::class, 'show'])
    ->name('products.show');


Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');

Route::post('/contact/answer/{id}', [ContactController::class, 'show'])
    ->name('contact.show');


Route::get('/basket', [BasketController::class, 'getBasket'])
    ->name('basket');


Route::get('/profil', [UserController::class, 'index'])
    ->name('profil');

Route::get('/profil/update', [UserController::class, 'update'])
    ->name('profil.update');
