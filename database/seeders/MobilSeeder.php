<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('tbl_mobil')->insert([
        'id_mobil' => 1,
        'id_kondisi' => 1,
        'merek' => 'avanza',
        'biaya' => 'Rp. 12.000.000'
    ]);
}
}
