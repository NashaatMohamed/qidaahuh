<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SubbCategory;
use App\Http\Controllers\Admin\OfferController;
use App\Http\Controllers\Admin\AnnouncementController;
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

Route::resource('subCat', SubbCategory::class);
Route::resource('offer', OfferController::class);
Route::resource('annoncement', AnnouncementController::class);
Route::get('Homedata',[HomeController::class,'Anoncment_product_data']);
Route::get("productData/{CategoryID}/SubCategory/{SubcategoryID}",[SubbCategory::class,'get_product_category_subcategory']);
Route::get('productDetails/{id}',[HomeController::class,'product_details']);

