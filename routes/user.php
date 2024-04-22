<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\Checkout;
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

Route::get('/index', [Index_UserController::class, 'index'])->name('index');


//cart
Route::post('/add-cart', [CartController::class, 'add'])->name('cart.add');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::get('/remove-cart/{MaQuat}', [CartController::class, 'destroy'])->name('cart.destroy');
Route::get('/remove-all-cart', [CartController::class, 'removeAll'])->name('cart.removeAll');

Route::get('/detail/{id}', [QuatController::class, 'detail']);



//sign 
Route::post('/signup/save', [TaiKhoanController::class, 'signup'])->name('sign.save');
Route::post('/signin/in', [TaiKhoanController::class, 'signin'])->name('signin');
Route::get('/sign/out', [TaiKhoanController::class, 'signout'])->name('sign.out');



//Khách hàng
Route::get('/myaccount', [TaiKhoanController::class, 'myaccount'])->name('myaccount');

Route::post('/myaccount/save', [KhachHangController::class, 'save_kh'])->name('myaccount.save');


Route::get('/loaiquat/{id}', [LoaiQuatController::class, 'index_u'])->name('loaiquat.index');


Route::get('/checkout', [Checkout::class, 'index'])->name('checkout.index');
Route::get('/checkoutnew', [Checkout::class, 'index']);

Route::get('/checkout-b', [Checkout::class, 'index_b'])->name('checkout.index-b');
Route::get('/checkoutnew-b', [Checkout::class, 'index_b']);


Route::get('/inhoadon', [Checkout::class, 'inhoadon']);

Route::post('/buy', [Checkout::class, 'buy'])->name('buy');

Route::post('/checkoutb/save', [Checkout::class, 'save'])->name('checkoutb.save');
Route::post('/checkoutnewb/save', [Checkout::class, 'save_new'])->name('checkoutnewb.save');

Route::post('/checkout/save', [Checkout::class, 'save'])->name('checkout.save');
Route::post('/checkoutnew/save', [Checkout::class, 'save_new'])->name('checkoutnew.save');
