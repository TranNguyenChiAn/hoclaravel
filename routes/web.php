<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\MailController;
use App\Http\Middleware\CheckLoginCustomer;

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

// MANAGE ORDER ADMIN
Route::prefix('/order')->group(function () {
    Route::get('/index', [OrderController::class, 'index'])
    -> name('order.index');
    Route::get('/editOrder/{id}', [OrderController::class, 'editOrder'])
        -> name('order.edit');
    Route::put('/order_{order}/edit', [OrderController::class, 'updateOrder'])
    ->name('order.update');

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
Route::prefix('customer') ->group(function () {
    Route::get('/login', [CustomerController::class, 'login'])->name('customer.login');
    Route::post('/login', [CustomerController::class, 'loginProcess'])->name('customer.loginProcess');

    Route::get('/register', [CustomerController::class, 'register'])->name('customer.register');
    Route::post('/register', [CustomerController::class, 'registerProcess'])
        ->name('customer.registerProcess');

    Route::get('/best_seller',[ProductController::class, 'bestSeller'])-> name('customer.bestSeller');
    Route::get('/new',[ProductController::class, 'new'])-> name('customer.new');
    Route::get('/filter/{id}',[ProductController::class, 'filter'])-> name('customer.filter');
//Route::match (['get', 'post'], '/register', [CustomerController::class, 'register']) -> name('register');

    Route::get('/index', [CustomerController::class, 'showProduct'])
        -> name('index');

    Route::get('/product/{id}', [CustomerController::class, 'productDetail'])
        ->name('product.detail');
});

Route::middleware(CheckLoginCustomer::class)->group(function (){
    Route::get('/profile', [CustomerController::class, 'profile'])->name('profile');
    Route::put('/profile', [CustomerController::class, 'updateProfile'])->name('profile.update');

    Route::get('/orders_history', [CustomerController::class, 'showOrderHistory'])
        ->name('ordersHistory');
    Route::get('/order_{id}/detail',[OrderController::class,'orderDetail'])->name('orderDetail');

    Route::get('/change_password', [ForgotPasswordController::class, 'editPassword'])->name('pwd.edit');
    Route::put('/change_password', [ResetPasswordController::class, 'updatePassword'])->name('pwd.update');

    Route::get('/cart', [ProductController::class, 'showCart'])->name('product.cart');
    Route::get('/addToCart/{id}', [ProductController::class, 'addToCart'])
        ->name('product.addToCart');
    Route::get('/updateCart/{id}', [ProductController::class, 'updateCart'])
        ->name('product.updateCart');
    Route::get('/deleteFromCart/{id}', [ProductController::class, 'deleteFromCart'])
        ->name('product.deleteFromCart');
    Route::get('/deleteAllFromCart', [ProductController::class, 'deleteAllFromCart'])
        ->name('product.deleteAllFromCart');

    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkoutProcess', [OrderController::class, 'checkoutProcess'])->name('checkoutProcess');
    Route::get('/payment', [OrderController::class, 'payment'])->name('payment.index');
    Route::put('/payment/process', [OrderController::class, 'paymentProcess'])->name('payment.process');

    Route::get('/contact', [CustomerController::class, 'contact']) ->name('contact');

    Route::get('/logout', [CustomerController::class, 'logout'])->name('customer.logout');
    Route::get('/forgot_password', [CustomerController::class, 'forgotPassword'])
        ->name('customer.forgotPassword');
});

//---------- END CUSTOMER -----------





