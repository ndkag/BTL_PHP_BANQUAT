<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CTMauSac extends Model
{
    use HasFactory;
    protected $table = 'CTMauSac';
    protected $primaryKey = 'MaCTMauSac';
    public $timestamps = false;
}
