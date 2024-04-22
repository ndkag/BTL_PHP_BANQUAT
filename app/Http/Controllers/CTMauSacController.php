<?php

namespace App\Http\Controllers;

use App\Models\CTMauSac;
use App\Models\Quat;
use Illuminate\Http\Request;

class CTMauSacController extends Controller
{

    public function save(Request $res, $id)
    {
        if ($id == 0) {
            //create
            $ctmausac = new CTMauSac();
            $ctmausac->MaQuat = $res->MaQuat;
            $ctmausac->TenMauSac = $res->TenMauSac;
            $ctmausac->SoLuong = $res->SoLuong;
            $ctmausac->MaMau = $res->MaMau;
        } else {
            //upload 
            $ctmausac = CTMauSac::where('MaCTMauSac', $id)->first();
            $ctmausac->TenMauSac = $res->TenMauSac;
            $ctmausac->SoLuong = $res->SoLuong;
            $ctmausac->MaMau = $res->MaMau;
        }
        $ctmausac->save();
        return redirect()->route('Quat.detail_ad', $res->MaQuat);
    }

    public function save_new(Request $res)
    {
        $ctmausac = new CTMauSac();
        $ctmausac->MaQuat = $res->MaQuat;
        $ctmausac->TenMauSac = $res->TenMauSac;
        $ctmausac->SoLuong = $res->SoLuong;
        $ctmausac->MaMau = $res->MaMau;
        $ctmausac->save();
        return view('ADMIN.Quat.edit_thongso', ['ctmausac' => $ctmausac]);
    }

    public function create_new(Request $res)
    {
        $quat = $res->session()->get('quat');
        return view('ADMIN.Quat.edit_ctmau', ['quat' => $quat]);
    }
    public function create($id)
    {
        $quat = Quat::where('MaQuat', $id)->first();
        return view('ADMIN.Quat.edit_ctmau', ['quat' => $quat]);
    }


    public function index()
    {
        //
    }



    public function store(Request $request)
    {
        //
    }


    public function show(CTMauSac $CTMauSac)
    {
        //
    }

    public function edit($id)
    {

        $db = CTMauSac::where('MaCTMauSac', $id)->first();
        return view(
            'ADMIN.Quat.edit_ctmau',
            [
                'quat' => $db,
            ]
        );
    }


    public function update(Request $request, CTMauSac $CTMauSac)
    {
        //
    }


    public function destroy($id)
    {
        try {
            $ctMauSac = CTMauSac::where('MaCTMauSac', $id)->firstOrFail();
            $ctMauSac->delete();
            return redirect()->back()->with('success', 'Xóa thành công.');
        } catch (\Throwable $e) {
            return redirect()->back()->with('error', 'Không thể xóa bản ghi này. Vui lòng thử lại sau.');
        }
    }
}
