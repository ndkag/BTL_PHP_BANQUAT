<?php

namespace App\Http\Controllers;

use App\Helper\Cart;
use App\Models\HoaDonBan;
use App\Models\ChiTietHDB;
use App\Models\CTMauSac;
use App\Models\KhachHang;
use App\Models\Quat;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class Checkout extends Controller
{

    public function index()
    {
        return view('USER.checkout');
    }

    public function index_b()
    {
        if (session('buy')) {
            $buy = session('buy');
            return view('USER.checkout', ['c' => $buy]);
        } else {
            return redirect()->route('checkout.index');
        }
    }


    public function buy(Request $request)
    {
        Session::forget('buy');

        $quat =  Quat::join('CTMauSac', 'Quat.MaQuat', '=', 'CTMauSac.MaQuat')
            ->join('ChiTietQuat', 'Quat.MaQuat', '=', 'ChiTietQuat.MaQuat')
            ->select('Quat.*', 'CTMauSac.*', 'ChiTietQuat.*')
            ->where('Quat.MaQuat', $request->MaQuat)
            ->where('CTMauSac.TenMauSac', $request->color)
            ->first();

        $buy = [
            'MaQuat' => $quat->MaQuat,
            'price' => $quat->GiaKhuyenMai,
            'image' => $quat->HinhAnhXe,
            'color' => $quat->TenMauSac,
            'name' => $quat->TenQuat,
            'MaCTMauSac' => $quat->MaCTMauSac,
            'quant' => $request->quant
        ];

        // Lưu thông tin vào session
        $request->session()->put('buy', $buy);

        return redirect()->route('checkout.index-b');
    }


    public function save(Request $request)
    {
        // Tạo một đối tượng mới của HoaDonBan và lưu thông tin của hóa đơn bán vào cơ sở dữ liệu
        $hd = new HoaDonBan();
        $hd->MaKhachHang = $request->MaKhachHang;
        $hd->NgayBan = now(); // Lấy thời gian hiện tại
        $hd->TongTien = $request->TongTien;
        $hd->GhiChu = $request->GhiChu;
        $hd->save();

        // Lấy MaHDB sau khi đã lưu vào cơ sở dữ liệu
        $maHDB = $hd->MaHDB;

        // Lưu thông tin chi tiết hóa đơn bán (ChiTietHDB)
        foreach ($request->MaQuat as $key => $maQuat) {

            $ct = new ChiTietHDB();
            $ct->MaHDB = $maHDB;
            $ct->MaQuat = $request->MaQuat[$key];
            $ct->MaCTMauSac = $request->MaCTMauSac[$key];
            $ct->GiaBan = $request->GiaBan[$key];
            $ct->SoLuong = $request->SoLuong[$key];
            $ct->save();

            $ctmau = CTMauSac::find($request->MaCTMauSac[$key]);

            // Trừ đi số lượng màu sắc đã bán từ số lượng hiện có
            $soLuongConLai = $ctmau->SoLuong - $request->SoLuong[$key];

            // Cập nhật số lượng mới vào bảng CTMauSac
            $ctmau->SoLuong = $soLuongConLai;
            $ctmau->save();
        }

        $currentPath = $request->path();
        if ($currentPath == 'checkout/save' || $currentPath == 'checkoutnew/save') {
            Session::forget('cart');
        } elseif ($currentPath == 'checkoutb/save' || $currentPath == 'checkoutnewb/save') {
            Session::forget('buy');
        }

        $kh = KhachHang::find($request->MaKhachHang);
        $hd = HoaDonBan::where('MaHDB', $maHDB)->first();
        $ct =  ChiTietHDB::join('Quat', 'Quat.MaQuat', '=', 'ChiTietHDB.MaQuat')
            ->join('CTMauSac', 'CTMauSac.MaCTMauSac', '=', 'ChiTietHDB.MaCTMauSac')
            ->select('Quat.TenQuat', 'CTMauSac.TenMauSac', 'ChiTietHDB.*')
            ->where('ChiTietHDB.MaHDB', $maHDB)
            ->get();
        return view('USER.inhoadon', compact('kh', 'ct', 'hd'));
    }

    public function inhoadon()
    {
        $kh = KhachHang::find(11);
        $hd = HoaDonBan::where('MaHDB', 13)->first();
        $ct =  ChiTietHDB::join('Quat', 'Quat.MaQuat', '=', 'ChiTietHDB.MaQuat')
            ->join('CTMauSac', 'CTMauSac.MaCTMauSac', '=', 'ChiTietHDB.MaCTMauSac')
            ->select('Quat.TenQuat', 'CTMauSac.TenMauSac', 'ChiTietHDB.*')
            ->where('ChiTietHDB.MaHDB', 13)
            ->get();
        return View::make('USER.inhoadon', compact('kh', 'ct', 'hd'));
    }

    public function save_new(Request $request)
    {

        $kh = new KhachHang();
        $kh->MaTaiKhoan = $request->MaTaiKhoan;
        $kh->TenNguoiDung = $request->TenNguoiDung;
        $kh->Email = $request->Email;
        $kh->SDT = $request->SDT;
        $kh->GioiTinh = $request->GioiTinh;
        $kh->DiaChi = $request->DiaChi;
        $kh->AnhDaiDien =  $request->AnhDaiDien;
        $kh->save();


        if (!session('KhachHang')) {
            $request->session()->put('KhachHang', $kh);
        }


        // Tạo một đối tượng mới của HoaDonBan và lưu thông tin của hóa đơn bán vào cơ sở dữ liệu
        $hd = new HoaDonBan();
        $hd->MaKhachHang = $kh->MaKhachHang;
        $hd->NgayBan = now(); // Lấy thời gian hiện tại
        $hd->TongTien = $request->TongTien;
        $hd->GhiChu = $request->GhiChu;
        $hd->save();

        // Lấy MaHDB sau khi đã lưu vào cơ sở dữ liệu
        $maHDB = $hd->MaHDB;

        // Lưu thông tin chi tiết hóa đơn bán (ChiTietHDB)
        foreach ($request->MaQuat as $key => $maQuat) {

            $ct = new ChiTietHDB();
            $ct->MaHDB = $maHDB;
            $ct->MaQuat = $request->MaQuat[$key];
            $ct->MaCTMauSac = $request->MaCTMauSac[$key];
            $ct->GiaBan = $request->GiaBan[$key];
            $ct->SoLuong = $request->SoLuong[$key];
            $ct->save();

            $ctmau = CTMauSac::find($request->MaCTMauSac[$key]);

            // Trừ đi số lượng màu sắc đã bán từ số lượng hiện có
            $soLuongConLai = $ctmau->SoLuong - $request->SoLuong[$key];

            // Cập nhật số lượng mới vào bảng CTMauSac
            $ctmau->SoLuong = $soLuongConLai;
            $ctmau->save();
        }


        $currentPath = $request->path();
        if ($currentPath == 'checkout/save' || $currentPath == 'checkoutnew/save') {
            Session::forget('cart');
        } elseif ($currentPath == 'checkoutb/save' || $currentPath == 'checkoutnewb/save') {
            Session::forget('buy');
        }

        $kh = KhachHang::find($kh->MaKhachHang);
        $hd = HoaDonBan::where('MaHDB', $maHDB)->first();
        $ct =  ChiTietHDB::join('Quat', 'Quat.MaQuat', '=', 'ChiTietHDB.MaQuat')
            ->join('CTMauSac', 'CTMauSac.MaCTMauSac', '=', 'ChiTietHDB.MaCTMauSac')
            ->select('Quat.TenQuat', 'CTMauSac.TenMauSac', 'ChiTietHDB.*')
            ->where('ChiTietHDB.MaHDB', $maHDB)
            ->get();
        return view('USER.inhoadon', compact('kh', 'ct', 'hd'));
    }
}
