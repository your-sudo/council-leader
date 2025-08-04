<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Kandidat;
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

        User::create([

            'nama' => 'adminjawa',
            'nis' => '123456',
            'password' => null,
            'role' => 'user',
            'nama_ibu' => 'jarko',
        ]);

        Kandidat::create([
            'nama'=>'prabowo',
            'visi'=>'halowak',
            'misi'=>'halocik',
            'foto'=>'jawa.png',
            'calon_jabatan'=>'caksis'


        ]);

    }
}
