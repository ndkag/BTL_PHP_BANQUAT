<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;

class Index_AdminController extends Controller
{
    public function index()
    {

        $tk1 = DB::select("
        SELECT
        (SELECT COUNT(*) FROM HoaDonBan) AS TongDonHang,
        (SELECT SUM(TongTien) FROM HoaDonBan) AS TongDoanhThu,
        (SELECT COUNT(*) FROM KhachHang) AS TongKhachHang,
        (SELECT SUM(SoLuong) FROM ChiTietHDB) AS TongSanPhamDaBan;
    ");
        $tk1 = json_decode(json_encode($tk1), true); // Chuyển đổi kết quả từ object sang mảng

        // Thực hiện câu truy vấn
        $tk2 = DB::select("
            SELECT q.MaQuat,q.TenQuat, COUNT(*) AS SoLuongBan
            FROM HoaDonBan h
            JOIN ChiTietHDB ct ON h.MaHDB = ct.MaHDB
            JOIN Quat q ON ct.MaQuat = q.MaQuat
            GROUP BY q.MaQuat, q.TenQuat
            ORDER BY SoLuongBan DESC
            LIMIT 5
        ");
        return view('ADMIN.index', ['tk' => json_encode($tk2), 'tktong' => $tk1]);
    }
}
