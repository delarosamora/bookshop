<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::resource('books', BookController::class)->only(['index', 'show']);

Route::prefix('login')->group(function () {
    Route::get('/', [LoginController::class, 'index'])->name('login');
    Route::post('/manage', [LoginController::class, 'login'])->name('login.manage');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::prefix('register')->group(function () {
    Route::get('/', [RegisterController::class, 'index'])->name('register');
    Route::post('/manage', [RegisterController::class, 'register'])->name('register.manage');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {return view('dashboard.index');})->middleware('auth')->name('dashboard');
});

Route::resource('adminbooks', BookAdminController::class)->middleware(\App\Http\Middleware\EnsureUserIsAdmin::class);

Route::resource('reserves', \App\Http\Controllers\ReserveController::class)->middleware('auth');
