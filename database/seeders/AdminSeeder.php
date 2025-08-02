<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([

            'nama' => 'adminganteng',
            'nis' => '696969',
            'password' => Hash::make('sayaadmin'),
            'role' => 'admin',
            'nama_ibu' => 'jarko',
        ]);
    }
}
