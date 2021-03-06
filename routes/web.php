<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/session', [HomeController::class, 'session']);
Route::patch('/update-cart', [HomeController::class, 'updateCart'])->name('updateCart');
Route::patch('/update-discount', [HomeController::class, 'updateDiscount'])->name('updateDiscount');
Route::patch('/update-amount', [HomeController::class, 'updateAmount'])->name('updateAmount');
Route::post('/save-changes', [HomeController::class, 'saveChanges'])->name('saveChanges');
Route::get('/add-to-cart/{id}', [HomeController::class, 'addToCart'])->name('addToCart');