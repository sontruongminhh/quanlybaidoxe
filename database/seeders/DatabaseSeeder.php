<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'Email' => 'admin@gmail.com',
            'Password' => Hash::make('12345678'),
            'Admin' => User::ROLE['ADMIN']
        ]);

        DB::table('users')->insert([
            'Email' => 'bacsi@gmail.com',
            'Password' => Hash::make('12345678'),
            'Admin' => User::ROLE['DOCTOR']
        ]);
    }
}
