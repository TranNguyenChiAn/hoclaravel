<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
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
Route::get('/admin', [AdminController::class, 'show']) -> name('admin');

Route::get('/', [OrderController::class, 'index']) -> name('admin.order');

Route::get('/order_manage', [OrderController::class, 'index']) -> name('admin.order');

Route::get('/category_manage', [CategoryController::class, 'show']) -> name('admin.category');

Route::get('/products_manage', [ProductController::class, 'index']) -> name('admin.product');

Route::get('/addProduct', [ProductController::class, 'addProduct'],[CategoryController::class,'show']) -> name('admin.addProduct');
Route::post('/storeProduct', [ProductController::class, 'storeProduct']) -> name('admin.storeProduct');
