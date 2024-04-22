<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiQuat extends Model
{
    use HasFactory;
    protected $table = 'LoaiQuat';
    protected $primaryKey = 'MaLoaiQuat';
    public $timestamps = false;
}
