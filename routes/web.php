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

 
});


// Front
Route::view('/', 'front.pages.home')->name('home');

Route::get('/test', function(){
    SweetAlert::success('Hello', 'How are you ?');
    return redirect()->to('/');
});