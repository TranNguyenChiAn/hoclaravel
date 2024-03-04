<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StatisticController;
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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin', [AdminController::class, 'show']) -> name('admin');

Route::get('/', [ProductController::class,'index']) -> name('admin.product');

Route::get('/homepage', [StatisticController::class, 'showSalesDaily']) -> name('admin.saleDaily');

//ORDER
Route::get('/order_manage', [OrderController::class, 'index']) -> name('admin.order');

//CATEGORY
Route::get('/category_manage', [CategoryController::class, 'show']) -> name('admin.category');
Route::get('/addCategory', [CategoryController::class, 'addCategory']) -> name('admin.addCategory');
Route::post('/storeCategory', [CategoryController::class, 'storeCategory']) -> name('admin.storeCategory');
Route::get('/{category}/edit', [CategoryController::class, 'editCategory']) -> name('admin.editCategory');
Route::put('/{category}/edit', [CategoryController::class, 'updateCategory']) -> name('admin.updateCategory');
Route::delete('/{category}', [CategoryController::class, 'destroy']) -> name('admin.destroyCategory');


//PRODUCT
Route::get('/products_manage', [ProductController::class,'index']) -> name('admin.product');
Route::get('/addProduct', [ProductController::class, 'addProduct']) -> name('admin.addProduct');
Route::post('/storeProduct', [ProductController::class, 'storeProduct']) -> name('admin.storeProduct');
Route::get('/{product}/edit', [ProductController::class,'edit'])->name('admin.editProduct');
Route::put('/{product}/edit', [ProductController::class,'update'])->name('admin.updateProduct');
Route::delete('/{product}', [CategoryController::class, 'delete']) -> name('admin.deleteProduct');




