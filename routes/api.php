<?php

use App\Http\Controllers\API\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::controller(StudentController::class)->group(function () {
    Route::post('crud/listing', 'index');
    Route::post('crud/add', 'store');
    Route::get('crud/edit/{id}', 'show');
    Route::post('crud/update/{id}', 'update');
    Route::post('crud/update-status', 'updateStatus');
    Route::post('crud/deleteAll', 'deleteAll');
});
