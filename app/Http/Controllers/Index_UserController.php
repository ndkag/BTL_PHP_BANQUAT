<?php

namespace App\Http\Controllers;

use App\Models\Quat;
use App\Models\LoaiQuat;

use Illuminate\Http\Request;

class Index_UserController extends Controller
{


    public function index()
    {
        
        $db = Quat::all();
        $hotitem = Quat::paginate(8);
        $dbloai = LoaiQuat::paginate(5);

        $quatloai = Quat::join('LoaiQuat', 'Quat.MaLoaiQuat', '=', 'LoaiQuat.MaLoaiQuat')
            ->select('Quat.*', 'LoaiQuat.TenLoaiQuat')
            ->take(2)
            ->get();
    
        return view('USER.index', [
            'pro' => $db,
            'loai' => $dbloai,
            'hot' => $hotitem,
            'quatvaloai' => $quatloai
        ]);
    }



    public function hotitem(Request $req)
    {
        $maloai = $req->MaLoaiQuat;
        $db = Quat::where('MaLoaiQuat', $maloai)->take(10)->get();
    }
}
