<?php
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminStaffController;
use App\Http\Controllers\Admin\AdminDogController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AdminEmailController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\AuthController;

use App\Http\Controllers\customer\TopController;
use App\Http\Controllers\customer\CustomerDogcontroller;
use App\Http\Controllers\customer\CustomerBlogController;
use App\Http\Controllers\customer\CustomerMenuController;
use App\Http\Controllers\customer\CustomerEmailController;
use App\Http\Controllers\customer\CustomerReservationController;

use Illuminate\Support\Facades\Route;

// ユーザー側
Route::get('/customer/index', [TopController::class, 'index']);

// わんこ紹介
Route::get('/customer/dogs/index', [CustomerDogcontroller::class, 'index']);

// ブログ
Route::get('/customer/blogs/index', [CustomerBlogcontroller::class, 'index']);

// メニュー
Route::get('/customer/menus/index', [CustomerMenuController::class, 'index']);

// お問い合せフォーム
Route::get('/customer/emails/create', [CustomerEmailController::class, 'create'])->name('customer.emails.create');
Route::post('/customer/emails/store', [CustomerEmailController::class, 'store'])->name('customer.emails.store');
Route::get('/customer/emails/complete', [CustomerEmailController::class, 'complete'])->name('customer.emails.complete');

// 予約
Route::get('/customer/reservations/thanks', [CustomerReservationController::class, 'index'])->name('customer.reservations.thanks');
Route::get('/customer/reservations/create', [CustomerReservationController::class, 'create'])->name('customer.reservations.create');
Route::post('/customer/reservations/store', [CustomerReservationController::class, 'store'])->name('customer.reservations.store');
Route::get('/reservations/status', [CustomerReservationController::class, 'status'])->name('customer.reservations.status');


// 管理者側
Route::get('/admin/layouts/admin', [AdminController::class, 'index']);

// ユーザー管理
Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
Route::post('/admin/users/store', [UserController::class, 'store'])->name('admin.users.store');

// ログイン
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('admin.logout');

// スタッフ
Route::get('/admin/staffs/index', [AdminStaffController::class, 'index'])->name('admin.staffs.index')->middleware('auth');
Route::get('/admin/staffs/create', [AdminStaffController::class, 'create'])->name('admin.staffs.create')->middleware('auth');
Route::post('/admin/staffs/store', [AdminStaffController::class, 'store'])->name('admin.staffs.store')->middleware('auth');
Route::get('/admin/staffs/{staff}', [AdminStaffController::class, 'edit'])->name('admin.staffs.edit');
Route::put('/admin/staffs/{staff}', [AdminStaffController::class, 'update'])->name('admin.staffs.update');
Route::delete('/admin/staffs/{staff}', [AdminStaffController::class, 'destroy'])->name('admin.staffs.destroy');

// 犬
Route::get('/admin/dogs/index', [AdminDogController::class, 'index'])->name('admin.dogs.index')->middleware('auth');
Route::get('/admin/dogs/create', [AdminDogController::class, 'create'])->name('admin.dogs.create')->middleware('auth');
Route::post('/admin/dogs/index', [AdminDogController::class, 'store'])->name('admin.dogs.store')->middleware('auth');
Route::get('/admin/dogs/{dog}', [AdminDogController::class, 'edit'])->name('admin.dogs.edit');
Route::put('/admin/dogs/{dog}', [AdminDogController::class, 'update'])->name('admin.dogs.update');
Route::delete('/admin/dogs/{dog}', [AdminDogController::class, 'destroy'])->name('admin.dogs.destroy');

// ブログ
Route::get('/admin/blogs/index', [AdminBlogController::class, 'index'])->name('admin.blogs.index')->middleware('auth');
Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create')->middleware('auth');
Route::post('/admin/blogs/index', [AdminBlogController::class, 'store'])->name('admin.blogs.store')->middleware('auth');
Route::get('/admin/blogs/{blog}', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
Route::put('/admin/blogs/{blog}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
Route::delete('/admin/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');

// メニュー
Route::get('/admin/menus/index', [AdminMenuController::class, 'index'])->name('admin.menus.index')->middleware('auth');
Route::get('/admin/menus/create', [AdminMenuController::class, 'create'])->name('admin.menus.create')->middleware('auth');
Route::post('/admin/menus/index', [AdminMenuController::class, 'store'])->name('admin.menus.store')->middleware('auth');
Route::get('/admin/menus/{menu}', [AdminMenuController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/{menu}', [AdminMenuController::class, 'update'])->name('admin.menus.update');
Route::delete('/admin/menus/{menu}', [AdminMenuController::class, 'destroy'])->name('admin.menus.destroy');

// メール
Route::get('/admin/email/index', [AdminEmailController::class, 'index'])->name('admin.emails.index')->middleware('auth');
Route::get('/admin/email/show/{email}', [AdminEmailController::class, 'show'])->name('admin.emails.show')->middleware('auth');

// 予約
Route::get('/admin/reservations/index', [AdminReservationController::class, 'index'])->name('admin.reservations.index')->middleware('auth');
Route::get('/admin/reservations/{reservation}', [AdminReservationController::class, 'show'])->name('admin.reservations.show')->middleware('auth');

