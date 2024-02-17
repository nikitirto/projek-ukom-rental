<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servis extends Model
{
    use HasFactory;

    protected $table = 'tbl_servis';
    protected $primaryKey = 'id_servis';
    public $timestamps = false;

    protected $fillable = [
        'no_parts',
        'tgl_servis',
        'id_parts',
        'no_parts_ganti'
    ];
}