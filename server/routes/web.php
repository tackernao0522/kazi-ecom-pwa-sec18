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
});
