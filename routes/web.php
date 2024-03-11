<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

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
Route::prefix('category')->group(function () {
    Route::get('/index', [CategoryController::class, 'show'])->name('category.index');
    Route::get('/addCategory', [CategoryController::class, 'addCategory'])->name('category.create');
    Route::post('/storeCategory', [CategoryController::class, 'storeCategory'])->name('category.store');
    Route::get('/{category}/edit', [CategoryController::class, 'editCategory'])->name('category.edit');
    Route::put('/{category}/edit', [CategoryController::class, 'updateCategory'])->name('category.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])->name('category.destroy');
});

// MANAGE PRODUCT
Route::prefix('product')->group(function (){
    Route::get('/index', [ProductController::class,'index'])
        -> name('product.index');
    Route::get('/create', [ProductController::class, 'addProduct'])
        -> name('product.create');
    Route::post('/create', [ProductController::class, 'storeProduct'])
        -> name('product.store');
    Route::get('/{product}/edit', [ProductController::class,'edit'])
        ->name('product.edit');
    Route::put('/{product}/edit', [ProductController::class,'update'])
        ->name('product.update');
    Route::delete('/{product}', [ProductController::class, 'destroy'])
        -> name('product.delete');
});





