<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('accounts')->insert([
            [
                'username' => 'admin5',
                'password' => Hash::make('password'),
                'email' => 'admin5@example.com',
                'is_active' => 1,
                'role_id' => 1,
            ],
            [
                'username' => 'user5',
                'password' => Hash::make('password'),
                'email' => 'user5@example.com',
                'is_active' => 1,
                'role_id' => 2,
            ],
            [
                'username' => 'admin1',
                'password' => Hash::make('password123'),
                'email' => 'admin1@example.com',
                'is_active' => 1,
                'role_id' => 1,
            ],
            [
                'username' => 'admin2',
                'password' => Hash::make('password123'),
                'email' => 'admin2@example.com',
                'is_active' => 0,
                'role_id' => 1,
            ],
            [
                'username' => 'staff1',
                'password' => Hash::make('password123'),
                'email' => 'staff1@example.com',
                'is_active' => 0,
                'role_id' => 2,
            ],
            [
                'username' => 'staff2',
                'password' => Hash::make('password123'),
                'email' => 'staff2@example.com',
                'is_active' => 1,
                'role_id' => 2,
            ],
            [
                'username' => 'customer1',
                'password' => Hash::make('password123'),
                'email' => 'customer1@example.com',
                'is_active' => 1,
                'role_id' => 3,
            ],
            [
                'username' => 'customer2',
                'password' => Hash::make('password123'),
                'email' => 'customer2@example.com',
                'is_active' => 0,
                'role_id' => 3,
            ],
            [
                'username' => 'customer3',
                'password' => Hash::make('password123'),
                'email' => 'customer3@example.com',
                'is_active' => 1,
                'role_id' => 3,
            ],
        ]);
    }
}
