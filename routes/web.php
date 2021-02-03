<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();
Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/panel', [App\Http\Controllers\PanelConstroller::class, 'mainpage'])->name('panel')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::get('/wallet', [App\Http\Controllers\WalletController::class, 'showwallet'])->name('wallet')->middleware('auth');
Route::get('/wallet/history', [App\Http\Controllers\WalletController::class, 'showwallethistory'])->name('showwallethistory')->middleware('auth');
