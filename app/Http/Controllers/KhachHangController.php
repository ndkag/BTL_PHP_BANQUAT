<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use Illuminate\Http\Request;

class KhachHangController extends Controller
{

    public function save_kh(Request $request)
    {
        if ($request->has('image_upload')) {
            $file = $request->image_upload;
            $file_name = $file->getClientoriginalName();
            $file->move(public_path('uploads'), $file_name);
        }


        $kh = new KhachHang();
        $kh->MaTaiKhoan = $request->MaTaiKhoan;
        $kh->TenNguoiDung = $request->TenNguoiDung;
        $kh->Email = $request->Email;
        $kh->SDT = $request->SDT;
        $kh->GioiTinh = $request->GioiTinh;
        $kh->DiaChi = $request->DiaChi;
        $kh->AnhDaiDien = $file_name;
        $kh->save();
        $db = KhachHang::where('MaTaiKhoan', $kh->MaTaiKhoan)->first();
        $request->session()->put('KhachHang', $db);
        return redirect()->back();
    }
}
