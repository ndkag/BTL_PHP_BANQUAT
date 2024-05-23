<?php

namespace App\Http\Controllers;

use App\Models\NhanVien;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

class NhanVienController extends Controller
{


    public function index(Request $request)
    {
        $search = $request->search;

        // Lọc dữ liệu theo từ khóa tìm kiếm nếu có
        $query = NhanVien::query();
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('MaNhanVien', 'like', '%' . $search . '%')
                    ->orWhere('TenNhanVien', 'like', '%' . $search . '%')
                    ->orWhere('SDT', 'like', '%' . $search . '%')
                    ->orWhere('Email', 'like', '%' . $search . '%');
            });
        }

        // Phân trang cho kết quả
        $db = $query->paginate(10);
        return view('ADMIN.NhanVien.index', ['kh' => $db,  'search' => $search]);
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
            $kh = new NhanVien();
        } else {
            $kh = NhanVien::where('MaNhanVien', $id)->first();
        }
        $kh->MaTaiKhoan = $request->MaTaiKhoan;
        $kh->TenNhanVien = $request->TenNhanVien;
        $kh->GioiTinh = $request->GioiTinh;
        $kh->ChucVu = $request->ChucVu;
        $kh->SDT = $request->SDT;
        $kh->DiaChi = $request->DiaChi;
        $kh->Luong = $request->Luong;

        // Kiểm tra xem người dùng đã chọn ảnh mới chưa
        if ($file_name !== null) {
            $kh->AnhDaiDien = $file_name;
        }
        $kh->save();
        return redirect()->route('ADMIN.nhanvien.index');
    }

    public function create()
    {
        $tk = TaiKhoan::all();
        return view('ADMIN.NhanVien.edit', ['tk' => $tk]);
    }

    public function edit($id)
    {
        $tk = TaiKhoan::all();
        $db = NhanVien::where('MaNhanVien', $id)->first();
        return view('ADMIN.NhanVien.edit', ['kh' => $db, 'tk' => $tk]);
    }
    public function destroy($id)
    {
        NhanVien::where('MaNhanVien', $id)->first()->delete();
        return redirect()->route('ADMIN.nhanvien.index');
    }
}
