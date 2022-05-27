<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\MenuController;

// User Models
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UMenuController;
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
Route::apiResource('kategori', CategoriesController::class);
Route::apiResource('admin-menu', MenuController::class);

// User routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('menu/{filter}', [UMenuController::class, 'index']);
