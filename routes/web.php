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

Route::get('/', function () {
    return view('index');
})->name('index');

Route::resource('books', \App\Http\Controllers\BookController::class);

Route::prefix('login')->group(function () {
    Route::get('/', [\App\Http\Controllers\Auth\LoginController::class, 'index'])->name('login');
    Route::post('/manage', [\App\Http\Controllers\Auth\LoginController::class, 'login'])->name('login.manage');
    Route::get('/logout', [\App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');
});

Route::prefix('register')->group(function () {
    Route::get('/', [\App\Http\Controllers\Auth\RegisterController::class, 'index'])->name('register');
    Route::post('/manage', [\App\Http\Controllers\Auth\RegisterController::class, 'register'])->name('register.manage');
});

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {return view('dashboard.index');})->middleware('auth')->name('dashboard');
});
