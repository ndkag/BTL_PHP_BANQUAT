<?php

namespace App\Http\Controllers;

use App\Helper\Cart;
use App\Models\LoaiQuat;
use App\Models\Quat;
use Illuminate\Http\Request;

class LoaiQuatController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');

        // Lọc dữ liệu theo từ khóa tìm kiếm nếu có
        $query = LoaiQuat::query();
        if ($search) {
            $query->where('TenLoaiQuat', 'like', '%' . $search . '%');
        }
        // Phân trang cho kết quả

        $db = $query->paginate(10);
        return view('ADMIN.LoaiQuat.index', ['lq' => $db, 'search' => $search]);
    }


    public function index_u(Request $request, $id)
    {
        $query = Quat::where('MaLoaiQuat', $id);

        if ($request->filled('timkiem')) {
            $search = $request->input('timkiem');
            $query->where(function ($query) use ($search) {
                $query->where('TenQuat', 'like', '%' . $search . '%');
            });
        }
        if ($request->filled('giatu')) {
            $query->where('gia', '>=', $request->input('giatu'));
        }

        if ($request->filled('giaden')) {
            $query->where('gia', '<=', $request->input('giaden'));
        }

        $db = $query->paginate(10);

        return view('USER.listProduct', [
            'hot' => $db,
            'timkiem' => $request->input('timkiem'),
            'giatu' => $request->input('giatu'),
            'giaden' => $request->input('giaden'),
        ]);
    }


    public function create()
    {
        return view('ADMIN.LoaiQuat.edit');
    }


    public function save(Request $req, $id)
    {
        if ($id == 0) {
            //create
            $lq = new LoaiQuat();
        } else {

            $lq = LoaiQuat::where('MaLoaiQuat', $id)->first();
        }
        $lq->TenLoaiQuat = $req->TenLoaiQuat;
        $lq->save();
        return redirect()->back();
    }



    public function store(Request $request)
    {
        //
    }


    public function show(LoaiQuat $loaiQuat)
    {
        //
    }


    public function edit($id)
    {
        $db = LoaiQuat::where('MaLoaiQuat', $id)->first();
        return view('ADMIN.LoaiQuat.edit', ['lq' => $db]);
    }



    public function update(Request $request, LoaiQuat $loaiQuat)
    {
        //
    }


    public function destroy($id)
    {
        LoaiQuat::where('MaLoaiQuat', $id)->first()->delete();
        return redirect()->back();
    }
}
