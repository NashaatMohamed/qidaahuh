<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\OfferController;

use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\SubbCategory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
Route::prefix("admin")->middleware(['auth','role:admin'])->group(function(){
    Route::get("/",[HomeController::class,'index']);
    Route::resource("category",CategoryController::class);
    Route::get("category/{id}/delete",[CategoryController::class,'destroy'])->name("category.delete");
    Route::resource("products",ProductController::class);
    Route::resource("order",OrderController::class);
    Route::get("order/{id}/delete",[OrderController::class,'destroy'])->name("order.delete");
    Route::post("order/{id}",[OrderController::class,'updateStatus'])->name("order.updateStatus") ;
    Route::get("proindex",[ProductController::class,'indexx'])->name("products.indexx");
    Route::get("products/{id}/delete",[ProductController::class,'destroy'])->name("products.delete");
    Route::resource("user",UserController::class);
    Route::resource("Anoncement",AnnouncementController::class);
    Route::delete("delAnoncement/{id}",[AnnouncementController::class,'delete'])->name("Anoncement.delete");
    Route::get("user/{id}/delete",[UserController::class,'destroy'])->name("user.delete");

    Route::get("/admin/profile",[UserController::class ,'indexx'])->name('admin.indexx');
    Route::put("/admin/profilee",[UserController::class ,'updateProfilee'])->name('admin.updateProfilee');


    Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
    Route::post("order/{id}",[OrderController::class,'updateStatus'])->name("order.updateStatus") ;
    Route::get("/Home",[HomeController::class,'HomeInfo'])->name("HomeStatstic.info");
    Route::get("/Home/Mony",[HomeController::class,'HomeMony'])->name("HomeMony.HomeMony");
    Route::get("recentOrder",[HomeController::class,'recentOrder'])->name("recent.order");

    Route::resource('sub_category',SubbCategory::class);
    Route::resource('offers',OfferController::class);
    Route::get("offerindex",[OfferController::class,'indexx'])->name("offer.indexx");
});

