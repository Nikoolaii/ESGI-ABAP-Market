<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'index'])
        ->name('admin.index');
});

// Route::get('/articles', [ArticlesController::class, 'index'])
//     ->name('articles.index');

Route::get('/contact', function () {
    return view('contact');
})
    ->name('contact');
