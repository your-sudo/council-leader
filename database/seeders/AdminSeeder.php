<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        users::create([
            'name' => 'adminganteng',
            'NIS' => '696969',
            'password' => hash::make('sayaadmin'),
            'role' => 'admin',
        ]);
    }
}
