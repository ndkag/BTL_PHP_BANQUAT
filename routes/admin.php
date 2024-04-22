<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaiKhoanController;
use App\Http\Controllers\LoaiXeController;
use App\Http\Controllers\HangXeController;
use App\Http\Controllers\ModelXeController;
use App\Http\Controllers\ThongSoKyThuatXeController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhaCungCapController;
use App\Http\Controllers\PhuTungController;
use App\Http\Controllers\HoaDonBanXeController;
use App\Http\Controllers\ChiTietBanXeController;
use App\Http\Controllers\ChiTietBanPhuTungController;
use App\Http\Controllers\HoaDonNhapXeController;
use App\Http\Controllers\ChiTietNhapXeController;
use App\Http\Controllers\ChiTietNhapPhuTungController;
use App\Http\Controllers\ChiTietQuatController;
use App\Http\Controllers\CTMauSacController;
use App\Http\Controllers\Index_UserController;
use App\Http\Controllers\LoaiQuatController;
use App\Http\Controllers\QuatController;
use App\Models\CTMauSac;
use App\Models\LoaiQuat;
use Illuminate\Auth\Events\Login;

Route::get('/admin/index', function () {
    return view('ADMIN.index');
})->name('admin.index');
//bảng tài khoản
Route::get('/admin/user', [TaiKhoanController::class, 'index'])->name('ADMIN.TaiKhoan.index');

Route::get('/admin/user/{id}/del', [TaiKhoanController::class, 'destroy']);
Route::get('/admin/user/create', [TaiKhoanController::class, 'create']);
Route::get('/admin/user/{id}/edit', [TaiKhoanController::class, 'edit'])->name('taikhoan.edit');
Route::post('/admin/user/{id}/save', [TaiKhoanController::class, 'save'])->name('taikhoan.save');


//Bảng loại quạt
Route::get('/admin/loaiquat', [LoaiQuatController::class, 'index'])->name('ADMIN.loaiquat.index');
Route::get('/admin/loaiquat/{id}/edit', [LoaiQuatController::class, 'edit'])->name('loaiquat.edit');
Route::post('/admin/loaiquat/{id}/save', [LoaiQuatController::class, 'save'])->name('loaiquat.save');
Route::get('/admin/loaiquat/{id}/del', [LoaiQuatController::class, 'destroy']);
Route::get('/admin/loaiquat/create', [LoaiQuatController::class, 'create']);



//Quạt
Route::get('/admin/quat', [QuatController::class, 'index'])->name('ADMIN.Quat.index');
Route::get('/admin/quat/{id}/edit', [QuatController::class, 'edit'])->name('Quat.edit');
Route::get('/admin/quat/{id}/del', [QuatController::class, 'destroy']);
Route::get('/admin/quat/create', [QuatController::class, 'create']);
Route::post('/admin/quat/{id}/save', [QuatController::class, 'save'])->name('Quat.save');
Route::get('/admin/quat/detail/{id}', [QuatController::class, 'detail_ad'])->name('Quat.detail_ad');



//CTMauSac
Route::get('/admin/quat/{id}/edit_ctmausac', [CTMauSacController::class, 'edit'])->name('Quat.edit_ctmausac');

Route::get('/admin/quat/create_ctmausac_new', [CTMauSacController::class, 'create_new'])->name('Quat.create_new_ctmau');
Route::get('/admin/quat/create_ctmausac/{id}', [CTMauSacController::class, 'create'])->name('Quat.create_ctmau');

Route::post('/admin/quat/{id}/save_ctmausac_new', [CTMauSacController::class, 'save_new'])->name('Quat.save_ctmaunew');

Route::post('/admin/quat/{id}/save_ctmausac', [CTMauSacController::class, 'save'])->name('Quat.save_ctmau');
Route::get('/admin/quat/{id}/del_ctmau', [CTMauSacController::class, 'destroy'])->name('Quat.del_ctmau');


//ThonSoKyThuat
Route::get('/admin/quat/create_thongso', [ChiTietQuatController::class, 'create']);
Route::get('/admin/quat/{id}/edit_thongso', [ChiTietQuatController::class, 'edit'])->name('Quat.edit_thongso');
Route::post('/admin/quat/{id}/save_thongso', [ChiTietQuatController::class, 'save'])->name('Quat.save_thongso');
Route::get('/admin/quat/{id}/del_thongso', [ChiTietQuatController::class, 'destroy']);

// Login
Route::get('/admin/login', function () {
    return view('ADMIN.DangNhap');
});
Route::get('/admin/login/in', [TaiKhoanController::class, 'admin_login'])->name('admin.login');
Route::get('/admin/logout', [TaiKhoanController::class, 'admin_logout']);
