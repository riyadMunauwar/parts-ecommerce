<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomPageController;
use App\Http\Controllers\SingleProductController;
use App\Http\Controllers\CategoryWiseProductController;
use App\Http\Controllers\LocalizationController;
use App\Http\Controllers\ParentCategoryController;
use App\Http\Controllers\SearchResultController;




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
    'verified',
    'role:admin|manager|editor',
])->prefix('admin')->group(function () {

    Route::view('/dashboard', 'admin.pages.dashboard')->name('dashboard');
    
    Route::view('/orders', 'admin.pages.orders.list')->name('orders.list');
    Route::view('/orders/new', 'admin.pages.orders.new-order-list')->name('orders.new-list');
    Route::get('/orders/{order}/show', \App\Http\Controllers\Admin\OrderDetailController::class)->name('orders.show');
    Route::get('/orders/{order}/invoice', \App\Http\Controllers\Admin\GenerateInvoiceController::class)->name('orders.invoice');
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
    Route::view('/contact-form-list', 'admin.pages.contact-form-list')->name('contact-form-list');
    Route::view('/admins', 'admin.pages.admins-list')->name('admins.list');
    Route::view('/solcial-links', 'admin.pages.social-links')->name('social-link');
    Route::view('/user/profile', 'admin.pages.user-profile')->name('admin-user-profile');

});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->prefix('user')->group(function () {

    Route::get('/invoice/{orderId}', \App\Http\Controllers\Admin\InvoiceController::class)->name('invoice');
    Route::view('/orders/detail/{orderId}', 'front.pages.user.user-order-detail')->name('user-order-detail');
    Route::view('/profile', 'front.pages.user.profile')->name('user-profile');
    Route::view('/dashboard', 'front.pages.user.dashboard')->name('user-dashboard');
    Route::view('/security', 'front.pages.user.security')->name('user-security');
    Route::view('/orders', 'front.pages.user.user-order-list')->name('user-order-list');
    
});



// Front
Route::view('/', 'front.pages.home')->name('home');
Route::get('/results', SearchResultController::class)->name('search');
Route::view('/cart', 'front.pages.cart')->name('cart');
Route::view('/order-confirm', 'front.pages.order-confirm')->name('order-confirm');
Route::view('/checkout', 'front.pages.checkout')->name('checkout');
Route::view('/contact', 'front.pages.contact-us')->name('contact-us');
Route::view('/track-order', 'front.pages.track-order')->name('track-order');
Route::view('/register-wholesaler', 'front.pages.register-wholesaler')->name('register-wholesaler');
Route::get('categories/all', ParentCategoryController::class)->name('parent-category');
Route::get('/categories/{categoryId}/{categorySlug}', CategoryWiseProductController::class)->name('category-product');
Route::get('/products/{productId}/{productSlug}', SingleProductController::class)->name('single-product');
Route::get('/locale/{language}', LocalizationController::class)->name('locale');
Route::get('/{pageSlug}', CustomPageController::class)->name('custom-page');


