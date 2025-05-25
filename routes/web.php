<?php
use App\Http\Controllers\Admin\AdminShiftController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSalesController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AdminEmailController;
use App\Http\Controllers\Admin\AdminDogController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JoinController;
use App\Http\Controllers\customer\CustomerLoginController;
use App\Http\Controllers\customer\TopController;
use App\Http\Controllers\customer\InquiryController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\customer\CustomerDogcontroller;
use App\Http\Controllers\customer\CustomerMenuController;
use App\Http\Controllers\customer\CustomerReservationController;
use App\Models\customer;

// Route::get('/', function () {
//     return view('welcome');
// });


// ユーザー側
Route::get('/customer/index', [TopController::class, 'index']);

// お問い合せフォーム
Route::get('/customer/inquiry/index', [InquiryController::class, 'index'])->name('inquiry');
Route::post('/customer/inquiry/index', [InquiryController::class, 'sendMail']);
Route::get('/customer/inquiry/complete', [InquiryController::class, 'complete'])->name('inquiry.complete');

// わんこ紹介
Route::get('customer/dogs/index', [CustomerDogcontroller::class, 'index']);

// メニュー
Route::get('customer/menus/index', [CustomerMenuController::class, 'index']);

// 予約
Route::get('/customer/reservations.thanks', [CustomerReservationController::class, 'index'])->name('customer.reservations.thanks');
Route::get('/customer/reservations/create', [CustomerReservationController::class, 'create'])->name('customer.reservations.create');
Route::post('/customer/reservations/store', [CustomerReservationController::class, 'store'])->name('customer.reservations.store');

// customer管理
Route::get('customer/login/create', [CustomerLoginController::class, 'create'])->name('customer.login.create');

Route::get('customer/blogs/index', fn()=> view('customer/blogs/index'));
Route::get('customer/blogs/detail', fn()=> view('customer/blogs/detail'));

// 管理者側
Route::get('/admin/index', [AdminController::class, 'index']);

// 会員登録画面


Route::get('admin/join/join_index', [JoinController::class, 'index']);
Route::post('admin/join/join_check', [JoinController::class, 'create']);
Route::get('admin/join/join_thanks', [JoinController::class, 'update']);

// ログイン
// Route::get('/admin/login/login', [LoginController::class, 'loginForm']);
// Route::post('/admin/login/login', [LoginController::class, 'login'])->name('login');

// ブログ
Route::get('/admin/blogs/index', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
Route::get('/admin/blogs/create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
Route::post('/admin/blogs/index', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
Route::get('/admin/blogs/{blog}', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
Route::put('/admin/blogs/{blog}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');
Route::delete('/admin/blogs/{blog}', [AdminBlogController::class, 'destroy'])->name('admin.blogs.destroy');

// 犬
Route::get('/admin/dogs/index', [AdminDogController::class, 'index'])->name('admin.dogs.index');
Route::get('/admin/dogs/create', [AdminDogController::class, 'create'])->name('admin.dogs.create');
Route::post('/admin/dogs/index', [AdminDogController::class, 'store'])->name('admin.dogs.store');
Route::get('/admin/dogs/{dog}', [AdminDogController::class, 'edit'])->name('admin.dogs.edit');
Route::put('/admin/dogs/{dog}', [AdminDogController::class, 'update'])->name('admin.dogs.update');
Route::delete('/admin/dogs/{dog}', [AdminDogController::class, 'destroy'])->name('admin.dogs.destroy');

// メール
Route::get('/admin/email/email_index', [AdminEmailController::class, 'index']);;
Route::get('/admin/email/email_create', [AdminEmailController::class, 'create']);
Route::get('/admin/email/email_update', [AdminEmailController::class, 'update']);

// メニュー
Route::get('/admin/menus/index', [AdminMenuController::class, 'index'])->name('admin.menus.index');
Route::get('/admin/menus/create', [AdminMenuController::class, 'create'])->name('admin.menus.create');
Route::post('/admin/menus/index', [AdminMenuController::class, 'store'])->name('admin.menus.store');
Route::get('/admin/menus/{menu}', [AdminMenuController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/{menu}', [AdminMenuController::class, 'update'])->name('admin.menus.update');
Route::delete('/admin/menus/{menu}', [AdminMenuController::class, 'destroy'])->name('admin.menus.destroy');

// 予約
Route::get('/admin/reservation/reservation_index', [AdminReservationController::class, 'index']);
Route::get('/admin/reservation/reservation_create', [AdminReservationController::class, 'create']);
Route::get('/admin/reservation/reservation_update', [AdminReservationController::class, 'update']);

// 売上
Route::get('/admin/sales/sales_index', [AdminSalesController::class, 'index']);
Route::get('/admin/sales/sales_create', [AdminSalesController::class, 'create']);
Route::get('/admin/sales/sales_update', [AdminSalesController::class, 'update']);

// 設定
Route::get('/admin/setting/setting_index', [AdminSettingController::class, 'index']);
Route::get('/admin/setting/setting_create', [AdminSettingController::class, 'create']);
Route::get('/admin/setting/setting_update', [AdminSettingController::class, 'update']);

// シフト
Route::get('/admin/shift/shift_index', [AdminShiftController::class, 'index']);
Route::get('/admin/shift/shift_create', [AdminShiftController::class, 'create']);
Route::get('/admin/shift/shift_update', [AdminShiftController::class, 'update']);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
