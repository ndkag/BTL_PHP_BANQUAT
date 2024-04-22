<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonNhap extends Model
{
    use HasFactory;
    protected $table = 'HoaDonNhap';
    protected $primaryKey = 'MaHDN';
    public $timestamps = false;
}
