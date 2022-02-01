<?php

use App\Http\Controllers\Admin\CategoryController;
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
});
