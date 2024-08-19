<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (count(User::all()) >0) return;
        User::insert([
            'r_id' => 1,
            'full_name' => "Arslan Ahmad",
            'user_name' => "arslan",
            'email' => "admin@admin.com",
            'password' => Hash::make('123456789'),
            'designation' => "Admin",
            'status' => 0
        ]);
    }
}
