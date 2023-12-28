<?php

use App\Http\Controllers\Auth\LoginAPIController;
use App\Http\Controllers\Auth\LoginRegisterController;
use App\Http\Controllers\StudentAPIController;
use App\Http\Controllers\StudentController;
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
});

Route::middleware('auth:web')->group(function () {

    Route::controller(LoginRegisterController::class)->group(function () {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
        Route::get('/logout', 'logout')->name('logout');
    });
    Route::controller(StudentController::class)->group(function () {
        Route::get('/crud/list', 'index');
        Route::get('/crudListing', 'ListingData');
        Route::get('/crud/add', 'add');
        Route::post('/crud-add-action', 'addAction');
        Route::get('/crud/edit/{id}', 'edit');
        Route::post('/crud-edit-action/{id}', 'editAction');
        Route::post('/crud/updateStatus', 'updateStatus');
        Route::get('/crud-delete/{$id}', 'delete');
        Route::post('/crud/deleteAll', 'deleteAll');
    });
});


Route::controller(LoginAPIController::class)->group(function () {
    Route::get('/login-api', 'login')->name('login-api');
    Route::post('/login-action', 'loginAction')->name('login-action');
});

Route::controller(StudentAPIController::class)->group(function () {
    Route::get('/crud-api/list', 'index');
    Route::get('/crudAPIListing', 'ListingData');
    Route::get('/crud-api/add', 'add');
    Route::post('/crud-api-add-action', 'addAction');
    Route::get('/crud-api/edit/{id}', 'edit');
    Route::post('/crud-api-edit-action/{id}', 'editAction');
    Route::post('/crud-api/updateStatus', 'updateStatus');
    Route::get('/crud-api-delete/{$id}', 'delete');
    Route::post('/crud-api/deleteAll', 'deleteAll');
});
