<?php

use Illuminate\Support\Facades\Route;
use App\Services\SweetAlertToast;
// use App\Services\SweetAlert;
use App\Facades\SweetAlert;

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
    
    Route::view('/categories', 'admin.pages.category')->name('category.create');
    Route::view('/discounts', 'admin.pages.discount')->name('discount');
    Route::view('/coupons', 'admin.pages.coupon')->name('discount');
    Route::view('/products', 'admin.pages.product')->name('product');
    Route::view('/products/create', 'admin.pages.create-product')->name('product.create');
    Route::view('/feature-box', 'admin.pages.feature-box')->name('product');
    Route::view('/caurosel', 'admin.pages.caurosel')->name('caurosel');
    Route::view('/banner', 'admin.pages.banner')->name('banner');
    Route::view('/menus', 'admin.pages.menu')->name('menu');

 
});


// Front
Route::view('/', 'front.pages.home')->name('home');
Route::view('/cart', 'front.pages.cart')->name('cart');
Route::view('/checkout', 'front.pages.checkout')->name('checkout');
Route::view('/category/{slug}', 'front.pages.category')->name('category');
Route::view('/product/{slug}', 'front.pages.single-product')->name('singleProduct');


Route::get('/test', function(){
    SweetAlert::success('Hello', 'How are you ?');
    return redirect()->to('/');
});