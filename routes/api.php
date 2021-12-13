<?php

use App\Http\Controllers\AuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('register', [AuthController::class,'registerCustomer']);
Route::post('login', [AuthController::class,'loginCustomer']);


Route::middleware('auth:sanctum')->group(function () {
    Route::get('customer', [AuthController::class,'customer']);
    Route::get('logout', [AuthController::class,'logoutCustomer']);

});

