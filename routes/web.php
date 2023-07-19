<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PagesController::class, 'home'])->name('home');
Route::get('/cart', [PagesController::class, 'cart'])->name('cart');

// Auth
Route::get('/login', [AuthController::class, 'showLogin'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'postLogin'])->name('login')->middleware('guest');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register')->middleware('guest');
Route::post('/register', [AuthController::class, 'postRegister'])->name('register')->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

// Adminpanel routes
Route::group(['prefix' => '/adminpanel', 'middleware' => 'admin'], function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('adminpanel');

    // Products routes
    Route::group(['prefix' => 'products'], function() {
        Route::get('/', [ProductController::class, 'index'])->name('adminpanel.products');
        Route::get('/create', [ProductController::class, 'create'])->name('adminpanel.create');
        Route::post('/create', [ProductController::class, 'store'])->name('adminpanel.store');
    });

    // Products routes
    Route::group(['prefix' => 'categories'], function() {
        Route::get('/', [CategoryController::class, 'index'])->name('adminpanel.categories');
    });
});
