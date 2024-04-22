<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\Cart;
use App\Models\Quat;
use App\Models\CTMauSac;
use App\Models\ChiTietQuat;

class CartController extends Controller
{
    public function index()
    {
        return view('USER.cart');
    }

    public function add(Request $request, Cart $cart)
    {


        $quat =  Quat::join('CTMauSac', 'Quat.MaQuat', '=', 'CTMauSac.MaQuat')
            ->join('ChiTietQuat', 'Quat.MaQuat', '=', 'ChiTietQuat.MaQuat')
            ->select('Quat.*', 'CTMauSac.*', 'ChiTietQuat.*')
            ->where('Quat.MaQuat', $request->MaQuat)
            ->where('CTMauSac.TenMauSac', $request->color)
            ->first();


        $quant = $request->quant;
        $cart->add($quat, $quant);
        return redirect()->back();
    }





    public function destroy($MaQuat, Cart $cart)
    {
        $cart->remove($MaQuat);
        return redirect()->back();
    }

    public function removeAll(Cart $cart)
    {
        $cart->removeAll();
        return redirect()->back();
    }
}
