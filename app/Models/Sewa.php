<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sewa extends Model
{
    use HasFactory;

    protected $table = 'tbl_sewa';
    protected $primaryKey = 'id_sewa';
    public $timestamps = false;

    protected $fillable = [
        'id_customer',
        'id_mobil',
        'id_rek',
        'tgl_sewa',
        'tgl_kembali',
        'tgl_transaksi'
    ];
}