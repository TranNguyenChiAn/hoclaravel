<?php /** @noinspection PhpMultipleClassDeclarationsInspection */

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ClientController;
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

Route::get('/', [CustomerController::class,'index']) -> name('home');

// -----------------ADMIN------------------

//ORDER MANAGER
Route::prefix('/order')->group(function () {
    Route::get('/index', [OrderController::class, 'index'])
    -> name('order.index');
});
//MANAGE ACCOUNT ADMIN
Route::get('/admin', [AdminController::class, 'show']) -> name('admin');

//CATEGORY MANAGER
Route::prefix('category')->group(function () {
    Route::get('/index', [CategoryController::class, 'show'])
        ->name('category.index');
    Route::get('/addCategory', [CategoryController::class, 'addCategory'])
        ->name('category.create');
    Route::post('/storeCategory', [CategoryController::class, 'storeCategory'])
        ->name('category.store');
    Route::get('/{category}/edit', [CategoryController::class, 'editCategory'])
        ->name('category.edit');
    Route::put('/{category}/edit', [CategoryController::class, 'updateCategory'])
        ->name('category.update');
    Route::delete('/{category}', [CategoryController::class, 'destroy'])
        ->name('category.destroy');
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


//CUSTOMER MANAGER
Route::prefix('/customer_manage')->group(function () {
    Route::get('/index', [CustomerController::class, 'index'])
        -> name('customer_manage.index');
});

//---------- END ADMIN ----------


//---------- CUSTOMER -----------
Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
Route::post('/register', [CustomerController::class, 'registerProcess'])->name('customer.registerProcess');

Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
Route::post('/login', [CustomerController::class, 'loginProcess'])->name('customer.loginProcess');

Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
Route::get('/forgot_password', [CustomerController::class, 'forgotPassword'])->name('customer.forgotPassword');

Route::prefix('customer')->group(function (){
    Route::get('/index', [CustomerController::class, 'showProduct'])
        -> name('index');
    Route::get('/profile', [CustomerController::class, 'profile'])->name('profile');
    Route::put('/profile', [CustomerController::class, 'updateProfile'])->name('profile.update');

    Route::get('/product/{id}', [CustomerController::class, 'productDetail'])->name('product.detail');

    Route::get('/orders_history', [CustomerController::class, 'showOrderHistory'])->name('ordersHistory');
    Route::get('/order_{id}/detail',[OrderController::class,'orderDetail'])->name('orderDetail');

    Route::get('/change_password', [CustomerController::class, 'editPassword'])->name('pwd.edit');
    Route::put('/change_password', [CustomerController::class, 'updatePassword'])->name('pwd.update');

    Route::get('/cart', [ProductController::class, 'showCart'])->name('product.cart');
    Route::get('/addToCart/{id}', [ProductController::class, 'addToCart'])->name('product.addToCart');
    Route::get('/updateCart/{id}', [ProductController::class, 'updateCart'])->name('product.updateCart');
    Route::get('/deleteFromCart/{id}', [ProductController::class, 'deleteFromCart'])->name('product.deleteFromCart');
    Route::get('/deleteAllFromCart', [ProductController::class, 'deleteAllFromCart'])->name('product.deleteAllFromCart');

    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'checkoutProcess'])->name('checkoutProcess');
});

//---------- END CUSTOMER -----------




