<?php

use Illuminate\Support\Facades\Route;


require_once('admin.php');
require_once('user.php');

Route::get('/contact', function () {
    return view('USER.contact');
});

Route::get('/carts', function () {
    return view('USER.cart');
});
Route::get('/product', function () {
    return view('USER.product');
});
Route::get('/detail', function () {
    return view('USER.pro-detail');
});
Route::get('/detail', function () {
    return view('USER.pro-detail');
});
Route::get('/blog', function () {
    return view('USER.blog');
});

Route::get('/signin', function () {
    return view('USER.signin');
});
Route::get('/signup', function () {
    return view('USER.signup');
});


Route::get('/admin/edit', function () {
    return view('ADMIN.TaiKhoan.edit');
});

Route::get('/admin/file', function () {
    return view('ADMIN.file');
});

