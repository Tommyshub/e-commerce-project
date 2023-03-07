<?php

use TCG\Voyager\Facades\Voyager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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

// View home
Route::get('/', [HomeController::class, 'index']);

// Profile resource
Route::resource('profile', ProfileController::class)->middleware(['auth', 'verified']);

// Product resource
Route::resource('products', ProductController::class)->middleware(['auth', 'verified']);

require __DIR__ . '/auth.php';

// Admin routes
Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
