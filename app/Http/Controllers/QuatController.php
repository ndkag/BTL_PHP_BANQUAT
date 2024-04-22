<?php

namespace App\Http\Controllers;

use App\Models\Quat;
use App\Models\LoaiQuat;
use App\Models\CTMauSac;
use App\Models\ChiTietQuat;
use Illuminate\Http\Request;

class QuatController extends Controller
{
    

    public function index(Request $request)
    {
        $search = $request->input('search');

        // Lọc dữ liệu theo từ khóa tìm kiếm nếu có
        $query = Quat::query();
        if ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('TenQuat', 'like', '%' . $search . '%')
                    ->orWhere('MaQuat', 'like', '%' . $search . '%')
                    ->orWhere('MaLoaiQuat', 'like', '%' . $search . '%');
            });
        }
        // Phân trang cho kết quả

        $db = $query->paginate(10);
        return view('ADMIN.Quat.index', ['quat' => $db, 'search' => $search]);
    }
    public function detail($id)
    {
        $db = Quat::where('MaQuat', $id)->first();
        $ctq = ChiTietQuat::where('MaQuat', $id)->first();
        $ct = CTMauSac::where('MaQuat', $id)->get();
        return view(
            'USER.pro-detail',
            [
                'p' => $db,
                'ct' => $ct,
                'ctq' => $ctq,

            ]
        );
    }

    public function detail_ad($id)
    {
        $db = Quat::where('MaQuat', $id)->first();
        $ctq = ChiTietQuat::where('MaQuat', $id)->first();
        $ct = CTMauSac::where('MaQuat', $id)->get();
        return view(
            'ADMIN.Quat.detail',
            [
                'p' => $db,
                'ct' => $ct,
                'ctq' => $ctq,

            ]
        );
    }

    public function create()
    {
        $lq = LoaiQuat::all();

        return view('ADMIN.Quat.edit', ['lq' => $lq]);
    }


    public function save(Request $res, $id)
    {

        if ($id == 0) {
            //create
            $quat = new Quat();
            $quat->TenQuat = $res->TenQuat;
            $quat->MaLoaiQuat = $res->MaLoaiQuat;
            $quat->NamSanXuat = $res->NamSanXuat;
            $quat->HinhAnhXe = $res->HinhAnhXe;
            $quat->DSHinhAnhXe = $res->DSHinhAnhXe;
            $quat->Gia = $res->Gia;
            $quat->GiaKhuyenMai = $res->GiaKhuyenMai;
            $quat->MoTa = $res->MoTa;
            $quat->save();

            $res->session()->put('quat', $quat);

            return redirect()->route('Quat.create_new_ctmau');
        } else {
            //upload 
            $quat = Quat::where('MaQuat', $id)->first();
            $quat->TenQuat = $res->TenQuat;
            $quat->MaLoaiQuat = $res->MaLoaiQuat;
            $quat->NamSanXuat = $res->NamSanXuat;

            $quat->HinhAnhXe = $res->HinhAnhXe;
            $quat->DSHinhAnhXe = $res->DSHinhAnhXe;
            $quat->Gia = $res->Gia;
            $quat->GiaKhuyenMai = $res->GiaKhuyenMai;
            $quat->MoTa = $res->MoTa;
            $quat->save();
            return redirect()->route('Quat.detail_ad', $id);
        }
    }



    public function store(Request $request)
    {
    }

    public function show(Quat $Quat)
    {
        //
    }


    public function edit($id)
    {
        $db = Quat::where('MaQuat', $id)->first();
        $lq = LoaiQuat::all();
        return view(
            'ADMIN.Quat.edit',
            [
                'quat' => $db,
                'lq' => $lq
            ]
        );
    }


    public function update(Request $request, Quat $Quat)
    {
    }

    public function destroy($id)
    {
        $ctMauSacs = CTMauSac::where('MaQuat', $id)->get();
        foreach ($ctMauSacs as $ctMauSac) {
            $ctMauSac->delete();
        }

        $chiTietQuat = ChiTietQuat::where('MaQuat', $id)->first();
        if ($chiTietQuat) {
            $chiTietQuat->delete();
        }
        $quat = Quat::where('MaQuat', $id)->first();
        if ($quat) {
            $quat->delete();
        }

        return redirect()->back();
    }
}
