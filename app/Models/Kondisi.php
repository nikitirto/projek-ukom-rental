<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kondisi extends Model
{
    use HasFactory;

    protected $table = 'tbl_kondisi';
    protected $primaryKey = 'id_kondisi';
    public $timestamps = false;

    protected $fillable = [
        'id_servis',
        'deskripsi'
    ];

}