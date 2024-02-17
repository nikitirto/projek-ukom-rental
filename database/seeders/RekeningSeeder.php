<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('tbl_rekening')->insert([
        'id_rek' => 1,
        'nama_bank' => 'BCA',
        'no_rek' => 123456
    ]);
}
}
