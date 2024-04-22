<?php

namespace App\Helper;

class Cart
{
    private $items = [];
    private $total_quanlity = 0;
    private $total_price = 0;

    public function __construct()
    {
        $this->items = session('cart') ? session('cart') : [];
    }
    //Phương thức lấy về danh sách sản phẩm trong giỏ
    public function getCart()
    {
        return $this->items;
    }

    //thêm mới sản phẩm vào giỏ hàng
    public function add($Quat, $quanlity = 1)
    {

        $item = [
            'MaQuat' => $Quat->MaQuat,
            'price' => $Quat->GiaKhuyenMai > 0 ? $Quat->GiaKhuyenMai : $Quat->Gia,
            'image' => $Quat->HinhAnhXe,
            'color' => $Quat->TenMauSac,
            'MaCTMauSac' => $Quat->MaCTMauSac,
            'name' => $Quat->TenQuat,
            'quant' => $quanlity
        ];

        $this->items[$Quat->MaQuat] = $item;
        session(['cart' => $this->items]);
    }

    //xoá sản phẩm khỏi giỏ hàng
    public function remove($MaQuat)
    {
        if (array_key_exists($MaQuat, $this->items)) {
            unset($this->items[$MaQuat]);
            session(['cart' => $this->items]);
        }
    }

    //Xoá hết sản phẩm khỏi giỏ hàng
    public function removeAll()
    {
        $this->items = [];
        session(['cart' => []]);
    }

    //Phương thức lấy tổng tiền
    public function getTotalPrice()
    {
        $total_price = 0;
        foreach ($this->items as $item) {
            $total_price += $item['price'] * $item['quant'];
        }

        return $total_price;
    }


    //Phương thức lấy tổng số lượng
    public function getTotalQuality()
    {
        $total_quanlity = 0;
        foreach ($this->items as $item) {
            $total_quanlity +=  $item['quant'];
        }

        return $total_quanlity;
    }

}
