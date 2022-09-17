<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\NewPasswordController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {


});
Route::post('/register', [AuthController::class, 'Register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('change/password',  [NewPasswordController::class, 'forgotPassword']);
Route::post('forgot/check-code', [NewPasswordController::class, 'checkCode']);
Route::post('reset/password', [NewPasswordController::class, 'reset']);


Route::group(['middleware' => 'auth:api'], function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/edit/user', [AuthController::class, 'updateProfile']);
    Route::post('user/{id}/delete', [AuthController::class, 'destroy']);
    Route::get('show/user/{id}', [AuthController::class, 'details']);
    Route::get('show/category/{id}', [CategoryController::class, 'show']);
    Route::get('product', [ProductController::class, 'index']);
    Route::post('favourite/product', [HomeController::class, 'favourite']);
});
