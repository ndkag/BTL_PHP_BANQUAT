<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'taikhoan';
    protected $primaryKey = 'MaTaiKhoan';
    public $timestamps = false;
}
