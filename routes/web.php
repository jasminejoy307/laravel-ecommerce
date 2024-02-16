<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\{LoginController, ProductListController,OrderListController};
use App\Http\Controllers\Admin\{UserController, BrandController, AddressController, ProductController, CategoryController};


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

Route::get('/', function () {
    return view('register');
});
Route::POST('/register', [LoginController::class, 'register'])->name('register');
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::POST('/sigin', [LoginController::class, 'form_login'])->name('form.login');

Route::group(['namespace' => '', 'middleware' => 'admin'], function () { // admin
    Route::resource('/product', ProductController::class);
    Route::resource('/category', CategoryController::class);
    Route::resource('/brand', BrandController::class); // ->middleware('auth') - for single purpose
    Route::resource('/address', AddressController::class);
    Route::resource('/user', UserController::class);
    Route::POST('/logout', [UserController::class, 'logout'])->name('logout');
});

Route::group(['namespace' => '', 'middleware' => 'customer'], function () { // customer
    Route::get('/profile', [ProfileController::class, 'index'])->name('user.profile');
});



Route::get('/list-all', [ProductListController::class, 'product_list'])->name('product_list');
Route::post('/addtocart', [ProductListController::class, 'addtocart'])->name('addtocart');
Route::get('/checkout', [ProductListController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [ProductListController::class, 'checkoutaction'])->name('checkout');
Route::resource('/orders', OrderListController::class);