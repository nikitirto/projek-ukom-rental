<?php

namespace Database\Seeders;
use App\Models\tbl_user;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AkunSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'username' => 'customer',
                'role' => 'customer',
                'password' => Hash::make('123')
            ],
            [
                'username' => 'admin',
                'role' => 'admin',
                'password' => Hash::make('123')
            ],
        ];

        // looping data dengan foreach
        foreach ($userData as $val) {
            tbl_user::create($val);
        }
    }
}
