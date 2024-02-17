<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
{
    DB::table('tbl_servis')->insert([
        'id_servis' => 1,
        'no_parts' => 123,
        'tgl_servis' => '2022-12-31',
        'id_parts' => 456,
        'no_parts_ganti' => 789
    ]);
}
}
