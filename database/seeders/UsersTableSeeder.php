<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!User::where('name', 'admin')->exists()) {
         User::create([
            'name' => 'admin',
            'password' => bcrypt('password'),
            'is_admin' => true,
            'phone' => '1234567890',
            'address' => 'this place',
            'fullname' => 'administrator',
        ]);
        }
    }
}
