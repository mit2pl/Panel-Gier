<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group whic h
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/panel', [App\Http\Controllers\PanelConstroller::class, 'mainpage'])->name('panel')->middleware('auth');


// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'login']);
//Wallet route
Route::group(['middleware' => 'auth', 'prefix' => 'wallet'], function() {
    Route::get('/', [App\Http\Controllers\WalletController::class, 'showwallet'])->name('wallet');
        Route::get('/history', [App\Http\Controllers\WalletController::class, 'showwallethistory'])->name('showwallethistory');
        Route::get('/paypal', [App\Http\Controllers\WalletController::class, 'showwalletpaypal'])->name('showwalletpaypal');
        Route::post('/paypal', [App\Http\Controllers\WalletController::class, 'addmonybypaypal'])->name('addmonybypaypal');
        Route::get('/paypal/confirmed', [App\Http\Controllers\WalletController::class, 'confirmedwalletpaypal'])->name('confirmedwalletpaypal');
        Route::get('/paypal/canceled', [App\Http\Controllers\WalletController::class, 'canceledwalletpaypal'])->name('canceledwalletpaypal');
});
//account settings 
Route::group(['middleware' => 'auth', 'prefix' => 'accountsetting'], function() {
    Route::get('/', [App\Http\Controllers\AccountsettingsController::class, 'showsettings'])->name('accountsettings');
});