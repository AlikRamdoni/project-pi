<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@reliq.com',
            'password' => bcrypt('admin#1234'),
            'userType' => 'admin',
        ]);

        User::create([
            'name' => 'Alik',
            'email' => 'alik34201@gmail.com',
            'password' => bcrypt('12345678'),
            'userType' => 'user',
        ]);
    }
}
