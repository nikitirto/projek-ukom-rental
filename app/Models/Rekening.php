<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rekening extends Model
{
    use HasFactory;

    protected $table = 'tbl_rekening';
    protected $primaryKey = 'id_rek';
    public $timestamps = false;

    protected $fillable = [
        'nama_bank',
        'no_rek'
    ];
}