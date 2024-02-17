<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SewaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_sewa')->insert([
            'id_sewa' => 1,
            'id_customer' => 1,
            'id_mobil' => 1,
            'id_rek' => 1,
            'tgl_sewa' => '2022-12-01',
            'tgl_kembali' => '2022-12-10',
            'tgl_transaksi' => '2022-12-15'
        ]);
    }
}
