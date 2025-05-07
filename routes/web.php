<?php
use App\Http\Controllers\Admin\AdminShiftController;
use App\Http\Controllers\Admin\AdminSettingController;
use App\Http\Controllers\Admin\AdminSalesController;
use App\Http\Controllers\Admin\AdminReservationController;
use App\Http\Controllers\Admin\AdminMenuController;
use App\Http\Controllers\Admin\AdminMenulController;
use App\Http\Controllers\Admin\AdminEmailController;
use App\Http\Controllers\Admin\AdminDogController;
use App\Http\Controllers\Admin\AdminBlogController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\JoinController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\customer\TopController;
use App\Http\Controllers\customer\InquiryController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });


// ユーザー側
Route::get('/customer/index', [TopController::class, 'index']);

// お問い合せフォーム
Route::get('/customer/inquiry/index', [InquiryController::class, 'index'])->name('inquiry');
Route::post('/customer/inquiry/index', [InquiryController::class, 'sendMail']);
Route::get('/customer/inquiry/complete', [InquiryController::class, 'complete'])->name('inquiry.complete');

Route::get('customer/menu/index', fn()=> view('customer/menu/index'));
Route::get('customer/dog/index', fn()=> view('customer/dog/index'));
Route::get('customer/blogs/index', fn()=> view('customer/blogs/index'));
Route::get('customer/blogs/detail', fn()=> view('customer/blogs/detail'));
Route::get('/reservation', fn()=> view('customer/reservation'));


// 管理者側
Route::get('/admin/index', [AdminController::class, 'index']);

// 会員登録画面
Route::get('admin/join/join_index', [JoinController::class, 'index']);
Route::post('admin/join/join_check', [JoinController::class, 'create']);
Route::get('admin/join/join_thanks', [JoinController::class, 'update']);

// ログイン
Route::get('/admin/login/login', [LoginController::class, 'loginForm']);
Route::post('/admin/login/login', [LoginController::class, 'login'])->name('login');

// ブログ
Route::get('/admin/blog/blog_index', [AdminBlogController::class, 'index'])->name('admin.blogs.index');
Route::get('/admin/blog/blog_create', [AdminBlogController::class, 'create'])->name('admin.blogs.create');
Route::post('/admin/blog/blog_index', [AdminBlogController::class, 'store'])->name('admin.blogs.store');
Route::get('/admin/blog/{blog}', [AdminBlogController::class, 'edit'])->name('admin.blogs.edit');
Route::put('/admin/blog/{blog}', [AdminBlogController::class, 'update'])->name('admin.blogs.update');

// 犬
Route::get('/admin/dog/dog_index', [AdminDogController::class, 'index'])->name('admin.blogs.index');;
Route::get('/admin/dog/dog_create', [AdminDogController::class, 'create'])->name('admin.blogs.create');;
Route::get('/admin/dog/dog_update', [AdminDogController::class, 'update']);

// メール
Route::get('/admin/email/email_index', [AdminEmailController::class, 'index']);
Route::get('/admin/email/email_create', [AdminEmailController::class, 'create']);
Route::get('/admin/email/email_update', [AdminEmailController::class, 'update']);

// メニュー
Route::get('/admin/menu/manu_index', [AdminMenuController::class, 'index']);
Route::get('/admin/menu/manu_create', [AdminMenuController::class, 'create']);
Route::get('/admin/menu/manu_update', [AdminMenuController::class, 'update']);

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