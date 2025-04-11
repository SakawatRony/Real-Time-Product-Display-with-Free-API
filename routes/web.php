<?php

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

Route::get('/', [ProductController::class, 'products'])->name('product');
Route::get('/db-products', [ProductController::class, 'dbProducts'])->name('product.db');

Route::post('/store', [ProductController::class, 'productStore'])->name('product.store');

Route::get('/pusher', [ProductController::class, 'pusher']);
