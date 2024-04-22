<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quat extends Model
{
    use HasFactory;
    protected $table = 'Quat';
    protected $primaryKey = 'MaQuat';
    public $timestamps = false;
}
