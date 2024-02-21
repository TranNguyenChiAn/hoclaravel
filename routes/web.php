<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
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

Route::get('/lienhe', function () {
    return view('lienhe');
});


Route::get('/', [ProductController::class, 'view']) -> name('product.index');


Route::get('/cart', [ProductController::class, 'cart']);
Route::post('/cart/update', [ProductController::class, 'updateCart']);


Route::get('/order_manage', [OrderController::class, 'index']) -> name('admin.order');
Route::get('/category_manage', [CategoryController::class, 'show']) -> name('admin.category');
Route::get('/products_manage', [ProductController::class, 'index']) -> name('admin.product');
