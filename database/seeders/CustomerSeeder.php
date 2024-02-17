<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_customer')->insert([
            'id_customer' => 1,
            'id_user' => 1,
            'alamat_rumah' => '123 Main Street',
            'foto_ktp' => 'koa.png',
            'nama_lengkap' => 'John Doe',
            'kode_pos' => 12345,
            'nama_lengkap' => 'Jane Doe',
            'no_telp' => '0812112'
        ]);
    }
}
