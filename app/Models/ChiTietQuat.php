<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietQuat extends Model
{
    use HasFactory;
    protected $table = 'ChiTietQuat';
    protected $primaryKey = 'MaCT';
    public $timestamps = false;
}
