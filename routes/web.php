<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

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


Route::get('login', [LoginController::class, 'login'])->name('login');
Route::post('actionlogin', [LoginController::class, 'actionlogin'])->name('actionlogin');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/produk','HomeController@search');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');

Route::get('detail/{id}', [CartController::class, 'detail'])->name('detail');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');


Route::group(['middleware' => ['auth', 'user']], function () {
Route::post('addcart',[CartController::class, 'addcart'])->name('addcart');
Route::post('update',[CartController::class, 'update'])->name('update');
Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::post('actioncheckout', [CartController::class, 'checkout'])->name('checkout');
Route::get('checkout', [CartController::class, 'showCheckout'])->name('showCheckout');
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::put('profile/{id}', [ProfileController::class, 'update'])->name('updateProfile');
Route::put('updatePassword', [ProfileController::class, 'updatePassword'])->name('updatePsswd');

Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');
});

//REGISTER
Route::get('register', [RegisterController::class, 'register'])->name('register');
Route::post('register/action', [RegisterController::class, 'actionregister'])->name('actionregister');


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('/dashboard', \App\Http\Controllers\DashboardController::class);
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('dashboard/action', [DashboardController::class, 'actionstore'])->name('actionstore');
    Route::put('dashboard/{id}', [DashboardController::class, 'actionUpdate'])->name('actionUpdate');
    Route::delete('dashboard/{id}', [DashboardController::class, 'actionDelete'])->name('actionDelete');
    Route::post('dashboard/orderstatus', [DashboardController::class, 'updateStatus'])->name('updateStatus');

});


Route::get('actionlogout', [LoginController::class, 'actionlogout'])->name('actionlogout')->middleware('auth');