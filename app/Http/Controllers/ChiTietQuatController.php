<?php

namespace App\Http\Controllers;

use App\Models\ChiTietQuat;
use Illuminate\Http\Request;

class ChiTietQuatController extends Controller
{

    public function index()
    {
        //
    }

    public function save(Request $res, $id)
    {
        if ($id == 0) {
            $thongso = new ChiTietQuat();
            $thongso->MaQuat = $res->MaQuat;
            $thongso->CongSuatQuat = $res->CongSuatQuat;
            $thongso->CheDoGio = $res->CheDoGio;
            $thongso->BangDieuKhien = $res->BangDieuKhien;
            $thongso->DuongKinhCanhQuat = $res->DuongKinhCanhQuat;
            $thongso->ChieuDaiDayDien = $res->ChieuDaiDayDien;
            $thongso->XuatXu = $res->XuatXu;
            $thongso->LoaiMotor = $res->LoaiMotor;

            $thongso->TienIch = $res->TienIch;
            $thongso->KichThuocKhoiLuong = $res->KichThuocKhoiLuong;
            $thongso->ThongTinKhac = $res->ThongTinKhac;
            $thongso->save();
            return redirect()->route('ADMIN.Quat.index');
        } else {
            //upload 
            $thongso = ChiTietQuat::where('MaCT', $id)->first();
            $thongso->CongSuatQuat = $res->CongSuatQuat;
            $thongso->CheDoGio = $res->CheDoGio;
            $thongso->BangDieuKhien = $res->BangDieuKhien;
            $thongso->DuongKinhCanhQuat = $res->DuongKinhCanhQuat;
            $thongso->ChieuDaiDayDien = $res->ChieuDaiDayDien;
            $thongso->XuatXu = $res->XuatXu;
            $thongso->LoaiMotor = $res->LoaiMotor;
            $thongso->TienIch = $res->TienIch;
            $thongso->KichThuocKhoiLuong = $res->KichThuocKhoiLuong;
            $thongso->ThongTinKhac = $res->ThongTinKhac;
            $thongso->save();
            return redirect()->route('Quat.detail_ad', $res->MaQuat);
        }
    }


    public function create()
    {
        return view('ADMIN.Quat.edit_thongso');
    }

    public function save_new(Request $res)
    {
    }

    public function store(Request $request)
    {
        //
    }

    public function show(ChiTietQuat $chiTietQuat)
    {
        //
    }


    public function edit($id)
    {
        $db = ChiTietQuat::where('MaCT', $id)->first();
        return view('ADMIN.Quat.edit_thongso', ['ctq' => $db]);
    }


    public function update(Request $request, ChiTietQuat $chiTietQuat)
    {
        //
    }


    public function destroy(ChiTietQuat $chiTietQuat)
    {
        //
    }
}
