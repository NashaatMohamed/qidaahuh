<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CartController;
use App\Http\Controllers\Admin\OrderController;
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
    Route::get('user/{id}/delete', [AuthController::class, 'destroy']);
    Route::get('show/user/{id}', [AuthController::class, 'details']);
    Route::get('show/category/{id}', [CategoryController::class, 'show']);
    Route::post('favourite/product', [HomeController::class, 'favourite']);
    Route::get('favourite/show/{id}', [HomeController::class, 'show']);
    Route::get('/favourite/{id}/delete', [HomeController::class, 'destroy']);
Route::get('/favourite/delete/all', [HomeController::class, 'delete']);

    Route::apiResource('orders', 'OrderController')->except(['update', 'destroy','store']);
    Route::apiResource('carts', 'CartController')->except(['update', 'index']);
// Route::post('/carts/{cart}/checkout', 'CartController@checkout');
Route::post('/carts/{id}', [CartController::class, 'addProducts']);
Route::post('/carts/{id}/checkout', [CartController::class, 'checkout']);
Route::get('/show/carts/{id}', [CartController::class, 'show']);
Route::get('/carts/{id}/delete', [CartController::class, 'destroy']);
Route::get('/carts/delete/all', [CartController::class, 'delete']);



});
Route::get("search/{title}",[ProductController::class,'searchproduct']);
Route::get('product', [ProductController::class, 'index']);

// Route::post('/carts', [CartController::class, 'store']);


