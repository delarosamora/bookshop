<?php

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ReserveController;
use App\Http\Middleware\EnsureUserIsAdmin;
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

Route::get('/', [IndexController::class, 'index'])->name('index');

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


Route::get('dashboard', function () {return view('dashboard.index');})->middleware('auth')->name('dashboard');

Route::resource('adminbooks', BookAdminController::class)->middleware(EnsureUserIsAdmin::class);

Route::resource('reserves', ReserveController::class)->middleware('auth');

Route::get('myreserves', [ReserveController::class, 'indexUser'])->middleware('auth')->name('myreserves');
