<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\CategoryWiseProductController;

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



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {

    Route::view('/dashboard', 'admin.pages.dashboard')->name('dashboard');
    
    Route::view('/category/add', 'admin.pages.category.create')->name('category.create');
    Route::view('/categories', 'admin.pages.category.list')->name('category.list');
    Route::view('/discounts', 'admin.pages.discount')->name('discount');
    Route::view('/coupons', 'admin.pages.coupon')->name('coupon');
    Route::view('/products/create', 'admin.pages.products.create')->name('products.create');
    Route::view('/products', 'admin.pages.products.list')->name('products.list');
    Route::view('/feature-box', 'admin.pages.feature-box')->name('feature-box');
    Route::view('/caurosel', 'admin.pages.caurosel')->name('caurosel');
    Route::view('/menus', 'admin.pages.menu')->name('menu');
    Route::view('/customers', 'admin.pages.customer')->name('customer');
    Route::view('/vats', 'admin.pages.vat')->name('vat');
    Route::view('/footer', 'admin.pages.footer')->name('footer');
    Route::view('/color', 'admin.pages.color')->name('color');
    Route::view('/header', 'admin.pages.header')->name('header');
    Route::view('/page', 'admin.pages.page')->name('page');
    Route::view('/setting', 'admin.pages.setting')->name('setting');
    Route::view('/subscriber', 'admin.pages.subscriber-list')->name('subscriber-list');


 
});


// Front
Route::view('/', 'front.pages.home')->name('home');
Route::view('/cart', 'front.pages.cart')->name('cart');
Route::view('/checkout', 'front.pages.checkout')->name('checkout');
Route::get('/category/{categoryId}/{categorySlug}', CategoryWiseProductController::class)->name('category-product');
Route::get('/{pageSlug}', CustomPageController::class)->name('custom-page');
Route::get('/product/{productId}/{productSlug}', SingleProductController::class)->name('single-product');

