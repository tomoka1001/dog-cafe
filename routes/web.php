<?php
use App\Http\Controllers\Admin\AdminStaffController;
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
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EmailImportController;

use App\Http\Controllers\customer\CustomerEmailController;
use App\Http\Controllers\customer\CustomerDogcontroller;
use App\Http\Controllers\customer\CustomerMenuController;
use App\Http\Controllers\customer\CustomerReservationController;
use App\Http\Controllers\customer\CustomerBlogController;
use App\Models\customer;

// Route::get('/', function () {
//     return view('welcome');
// });


// ユーザー側
Route::get('/customer/index', [TopController::class, 'index']);

// お問い合せフォーム
Route::get('/customer/emails/create', [CustomerEmailController::class, 'create'])->name('customer.emails.create');
Route::post('/customer/emails/store', [CustomerEmailController::class, 'store'])->name('customer.emails.store');
Route::get('/customer/emails/complete', [CustomerEmailController::class, 'complete'])->name('emails.complete');


// わんこ紹介
Route::get('customer/dogs/index', [CustomerDogcontroller::class, 'index']);

// ブログ
Route::get('customer/blogs/index', [CustomerBlogcontroller::class, 'index']);

// メニュー
Route::get('customer/menus/index', [CustomerMenuController::class, 'index']);

// 予約
Route::get('/customer/reservations/thanks', [CustomerReservationController::class, 'index'])->name('customer.reservations.thanks');
Route::get('/customer/reservations/create', [CustomerReservationController::class, 'create'])->name('customer.reservations.create');
Route::post('/customer/reservations/store', [CustomerReservationController::class, 'store'])->name('customer.reservations.store');
Route::get('/reservations/status', [CustomerReservationController::class, 'status'])->name('customer.reservations.status');


// customer管理
Route::get('customer/login/create', [CustomerLoginController::class, 'create'])->name('customer.login.create');

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
Route::get('/admin/email/index', [AdminEmailController::class, 'index'])->name('admin.emails.index'); // ← name 修正
Route::get('/admin/email/show/{email}', [AdminEmailController::class, 'show'])->name('admin.emails.show'); // ← {email} を追加


// メニュー
Route::get('/admin/menus/index', [AdminMenuController::class, 'index'])->name('admin.menus.index');
Route::get('/admin/menus/create', [AdminMenuController::class, 'create'])->name('admin.menus.create');
Route::post('/admin/menus/index', [AdminMenuController::class, 'store'])->name('admin.menus.store');
Route::get('/admin/menus/{menu}', [AdminMenuController::class, 'edit'])->name('admin.menus.edit');
Route::put('/admin/menus/{menu}', [AdminMenuController::class, 'update'])->name('admin.menus.update');
Route::delete('/admin/menus/{menu}', [AdminMenuController::class, 'destroy'])->name('admin.menus.destroy');

// 予約
Route::get('/admin/reservations/index', [AdminReservationController::class, 'index'])->name('admin.reservations.index');
Route::get('/admin/reservations/{reservation}', [AdminReservationController::class, 'show'])->name('admin.reservations.show');

// スタッフ
Route::get('/admin/staffs/index', [AdminStaffController::class, 'index'])->name('admin.staffs.index');
Route::get('/admin/staffs/create', [AdminStaffController::class, 'create'])->name('admin.staffs.create');
Route::post('/admin/staffs/store', [AdminStaffController::class, 'store'])->name('admin.staffs.store');
Route::get('/admin/staffs/{staff}/edit', [AdminStaffController::class, 'edit'])->name('admin.staffs.edit');
Route::put('/admin/staffs/{staff}', [AdminStaffController::class, 'update'])->name('admin.staffs.update');
Route::delete('/admin/staffs/{staff}', [AdminStaffController::class, 'destroy'])->name('admin.staffs.destroy');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
