<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietHDN extends Model
{
    use HasFactory;
    protected $table = 'ChiTietHDN';
    protected $primaryKey = 'MaChiTietHDN';
    public $timestamps = false;
}
