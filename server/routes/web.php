<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ProductCartController;
use App\Http\Controllers\Admin\ProductListController;
use App\Http\Controllers\Admin\ProductReviewController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\AdminController;
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
    return view('welcome');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('admin.index');
})->name('dashboard');

// Admin Logout Routes
Route::get('/logout', [AdminController::class, 'adminLogout'])->name('admin.logout');

Route::prefix('admin')->group(function () {
    Route::get('/user/profile', [AdminController::class, 'userProfile'])->name('user.profile');

    Route::post('/user/profile/store', [AdminController::class, 'userProfileStore'])->name('user.profile.store');

    Route::get('/change/password', [AdminController::class, 'changePassword'])->name('change.password');

    Route::post('/change/password/update', [AdminController::class, 'changePasswordUpdate'])->name('change.password.update');
});

Route::prefix('category')->group(function () {
    Route::get('/all', [CategoryController::class, 'getAllCategory'])->name('all.category');

    Route::get('/add', [CategoryController::class, 'addCategory'])->name('add.category');

    Route::post('/store', [CategoryController::class, 'storeCategory'])->name('category.store');

    Route::get('/edit/{id}', [CategoryController::class, 'editCategory'])->name('category.edit');

    Route::post('/update/{id}', [CategoryController::class, 'updateCategory'])->name('category.update');

    Route::get('/delete/{id}', [CategoryController::class, 'deleteCategory'])->name('category.delete');
});

Route::prefix('subcategory')->group(function () {
    Route::get('/all', [CategoryController::class, 'getAllSubCategory'])->name('all.subcategory');

    Route::get('/add', [CategoryController::class, 'addSubCategory'])->name('add.subcategory');

    Route::post('/store', [CategoryController::class, 'storeSubCategory'])->name('subcategory.store');

    Route::get('/edit/{id}', [CategoryController::class, 'editSubCategory'])->name('subcategory.edit');

    Route::post('/update/{id}', [CategoryController::class, 'updateSubCategory'])->name('subcategory.update');

    Route::get('/delete/{id}', [CategoryController::class, 'deleteSubCategory'])->name('subcategory.delete');
});

Route::prefix('slider')->group(function () {
    Route::get('/all', [SliderController::class, 'getAllSlider'])->name('all.slider');

    Route::get('/add', [SliderController::class, 'addSlider'])->name('add.slider');

    Route::post('/store', [SliderController::class, 'storeSlider'])->name('slider.store');

    Route::get('/edit/{id}', [SliderController::class, 'editSlider'])->name('slider.edit');

    Route::post('/update/{id}', [SliderController::class, 'updateSlider'])->name('slider.update');

    Route::get('/delete/{id}', [SliderController::class, 'deleteSlider'])->name('slider.delete');
});

Route::prefix('product')->group(function () {
    Route::get('/all', [ProductListController::class, 'getAllProduct'])->name('all.product');

    Route::get('/add', [ProductListController::class, 'addProduct'])->name('add.product');

    Route::post('/store', [ProductListController::class, 'storeProduct'])->name('product.store');

    Route::get('/edit/{id}', [ProductListController::class, 'editProduct'])->name('product.edit');

    Route::post('/update/{id}', [ProductListController::class, 'updateProduct'])->name('product.update');
});

Route::get('/all/message', [ContactController::class, 'getAllMessage'])->name('contact.message');

Route::get('/message/delete/{id}', [ContactController::class, 'deleteMessage'])->name('message.delete');

Route::get('/all/reviews', [ProductReviewController::class, 'getAllReviews'])->name('all.reviews');

Route::get('/getsite/info', [SiteInfoController::class, 'getSiteInfo'])->name('getsite.info');

Route::post('/update/siteinfo/{id}', [SiteInfoController::class, 'updateSiteInfo'])->name('update.siteinfo');

Route::prefix('order')->group(function () {
    Route::get('/pending', [ProductCartController::class, 'pendingOrder'])->name('pending.order');

    Route::get('/processing', [ProductCartController::class, 'processingOrder'])->name('processing.order');

    Route::get('/complete', [ProductCartController::class, 'completeOrder'])->name('complete.order');

    Route::get('/details/{id}', [ProductCartController::class, 'orderDetails'])->name('order.details');

    Route::get('/status/processing/{id}', [ProductCartController::class, 'pendingToProcessing'])->name('pending.processing');

    Route::get('/status/complete/{id}', [ProductCartController::class, 'processingToComplete'])->name('processing.complete');
});
