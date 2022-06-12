<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UsersController;

// User Models
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UMenuController;
use App\Http\Controllers\CartController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//   return view('welcome');
// });

// Admin routes
Route::group(
  [
    'middleware' => ['auth', 'admin'],
  ],
  function () {
    Route::apiResource('admin-menu', MenuController::class);
    Route::apiResource('admin-user', UsersController::class);
    Route::apiResource('admin-categories', CategoriesController::class);
  }
);
// User routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/auth', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('menu/{filter}', [UMenuController::class, 'index']);
Route::get('menu-detail/{id}', [UMenuController::class, 'detail']);

Route::get('cart', [CartController::class, 'index'])->name('cart');
Route::post('cart/add', [CartController::class, 'addToCart']);
Route::get('cart/remove/{id}', [CartController::class, 'removeFormCart']);
