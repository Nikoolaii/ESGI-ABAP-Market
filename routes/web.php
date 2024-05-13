<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\faqAnswerController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\IsAdminMiddleware;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Auth::routes();
Route::middleware(['auth', isAdminMiddleware::class])->prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])
        ->name('admin.index');

    Route::resource('products', ProductsController::class)
        ->name('index', 'admin.products.index')
        ->name('create', 'admin.products.create')
        ->name('store', 'admin.products.store')
        ->name('show', 'admin.products.show')
        ->name('edit', 'admin.products.edit')
        ->name('update', 'admin.products.update')
        ->name('destroy', 'admin.products.destroy');
    Route::resource('categories', CategoryController::class);
    Route::resource('discounts', DiscountController::class);

    Route::resource('orders', OrderController::class)
        ->name('show', 'admin.orders.show');
});

Route::get('/orders/{id}', [OrderController::class, 'show'])
    ->name('orders.show');

Route::get('/products', [ProductController::class, 'index'])
    ->name('products.index');

Route::get('/products/show/{id}', [ProductController::class, 'show'])
    ->name('products.show');

Route::get('/profil', [UserController::class, 'index'])
    ->name('profil.index');

Route::put('/profil/update/{id}', [UserController::class, 'update'])
    ->name('profil.update');

Route::resource('contact', ContactController::class);
Route::get('/faqAnswer/create/{id}', [faqAnswerController::class, 'create'])
    ->name('faqAnswer.create');

Route::resource('faqAnswer', faqAnswerController::class)
    ->except(['create']);

Route::get('basket', [BasketController::class, 'index'])
    ->name('basket')
    ->middleware('auth');

Route::post('basket/add/', [BasketController::class, 'addElementToBasket'])
    ->name('basket.store')
    ->middleware('auth');

Route::post('basket/checkout', [BasketController::class, 'checkout'])
    ->name('basket.checkout')
    ->middleware('auth');

Route::put('basket/update/{id}', [BasketController::class, 'update'])
    ->name('basket.update')
    ->middleware('auth');

Route::delete('basket/remove/{id}', [BasketController::class, 'destroy'])
    ->name('basket.destroy')
    ->middleware('auth');

Route::post('basket/promo', [BasketController::class, 'addPromo'])
    ->name('basket.promo')
    ->middleware('auth');

Route::delete('basket/promo', [BasketController::class, 'removePromo'])
    ->name('basket.promo.remove')
    ->middleware('auth');
