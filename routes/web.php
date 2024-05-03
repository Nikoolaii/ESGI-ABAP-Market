<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
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
        ->name('index', 'admin.products.index')
        ->name('create', 'admin.products.create')
        ->name('store', 'admin.products.store')
        ->name('show', 'admin.products.show')
        ->name('edit', 'admin.products.edit')
        ->name('update', 'admin.products.update')
        ->name('destroy', 'admin.products.destroy');
    Route::resource('orders', OrdersController::class)
        ->name('index', 'admin.orders.index')
        ->name('create', 'admin.orders.create')
        ->name('store', 'admin.orders.store')
        ->name('show', 'admin.orders.show')
        ->name('edit', 'admin.orders.edit')
        ->name('update', 'admin.orders.update')
        ->name('destroy', 'admin.orders.destroy');
    Route::resource('categories', CategoriesController::class)
        ->name('index', 'admin.categories.index')
        ->name('create', 'admin.categories.create')
        ->name('store', 'admin.categories.store')
        ->name('show', 'admin.categories.show')
        ->name('edit', 'admin.categories.edit')
        ->name('update', 'admin.categories.update')
        ->name('destroy', 'admin.categories.destroy');
});


Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::post('/products/show/{id}', [ProductController::class, 'show'])
    ->name('products.show');


Route::get('/contact', [ContactController::class, 'index'])
    ->name('contact');

Route::post('/contact/answer/{id}', [ContactController::class, 'show'])
    ->name('contact.show');

Route::get('/profil', [UserController::class, 'index'])
    ->name('profil');

Route::get('/profil/update', [UserController::class, 'update'])
    ->name('profil.update');
