<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KondisiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tbl_kondisi')->insert([
            'id_kondisi' => 1,
            'id_servis' => 1,
            'deskripsi' => 'AMAN'
        ]);
    }
}
