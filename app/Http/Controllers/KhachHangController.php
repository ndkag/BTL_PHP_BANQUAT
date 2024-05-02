<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\TaiKhoan;
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

    public function index(Request $request)
    {
        $search = $request->search;

        // Lọc dữ liệu theo từ khóa tìm kiếm nếu có
        $query = KhachHang::query();
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('TenNguoiDung', 'like', '%' . $search . '%')
                    ->orWhere('MaTaiKhoan', 'like', '%' . $search . '%')
                    ->orWhere('SDT', 'like', '%' . $search . '%')
                    ->orWhere('Email', 'like', '%' . $search . '%');
            });
        }

        // Phân trang cho kết quả
        $db = $query->paginate(10);
        return view('ADMIN.KhachHang.index', ['kh' => $db,  'search' => $search]);
    }

    public function create()
    {
        $tk = TaiKhoan::all();

        return view('ADMIN.KhachHang.edit', ['tk' => $tk]);
    }

    public function save(Request $request, $id)
    {
        $file_name = null;

        if ($request->has('image_upload')) {
            $file = $request->image_upload;
            $file_name = $file->getClientOriginalName();
            $file->move(public_path('uploads'), $file_name);
        }

        if ($id == 0) {
            $kh = new KhachHang();
        } else {
            $kh = KhachHang::where('MaKhachHang', $id)->first();
        }

        $kh->MaTaiKhoan = $request->MaTaiKhoan;
        $kh->TenNguoiDung = $request->TenNguoiDung;
        $kh->Email = $request->Email;
        $kh->SDT = $request->SDT;
        $kh->GioiTinh = $request->GioiTinh;
        $kh->DiaChi = $request->DiaChi;

        // Kiểm tra xem người dùng đã chọn ảnh mới chưa
        if ($file_name !== null) {
            $kh->AnhDaiDien = $file_name;
        }

        $kh->save();
        return redirect()->route('ADMIN.khachhang.index');
    }

    public function edit($id)
    {
        $tk = TaiKhoan::all();
        $db = KhachHang::where('MaKhachHang', $id)->first();
        return view('ADMIN.KhachHang.edit', ['kh' => $db, 'tk' => $tk]);
    }

    public function destroy($id)
    {
        KhachHang::where('MaKhachHang', $id)->first()->delete();
        return redirect()->route('ADMIN.khachhang.index');
    }
}
