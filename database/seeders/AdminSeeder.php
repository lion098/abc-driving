<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::create([
            'name' => 'Admin User',
            'email' => 'admin@email.com',
            'password' => Hash::make('Password#123'),
            'phone' => '9874563211',
            'address' => 'Location A',
            'type' => 'Admin',
            'fb_url' => 'https://www.facebook.com/',
            'insta_url' => 'https://www.instagram.com/',
            'twitter_url' => 'https://twitter.com/i/flow/login'
        ]);
    }
}
