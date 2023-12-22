<?php

use App\Http\Controllers\Auth\LoginRegisterController;
use Illuminate\Support\Facades\Route;

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


Route::controller(LoginRegisterController::class)->group(function () {

    Route::get('/', 'login')->name('login');
    Route::post('/login-action', 'loginAction')->name('login-action');
    Route::get('/register', 'register')->name('register');
    Route::post('/register-action', 'registerAction')->name('register-action');

    Route::get('/dashboard', 'dashboard')->name('dashboard');
    Route::get('/logout', 'logout')->name('logout');
});
