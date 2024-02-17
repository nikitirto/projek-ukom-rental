<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'tbl_mobil';
    protected $primaryKey = 'id_mobil';
    public $timestamps = false;

    protected $fillable = [
        'id_kondisi',
        'merek',
        'biaya'
    ];
}