<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'address' => '123 Street, New York, USA',
            'timing' => 'Mon - Fri : 09.00 AM - 09.00 PM',
            'contact' => '+012 345 6789',
            'email' => 'info@example.com',
            'google_map' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3533.0983263743674!2d85.32828877519357!3d27.683355726549667!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39eb19acf9643d87%3A0x9a28e549b2e189b3!2sCode%20Logic%20Technologies%20Pvt.Ltd.!5e0!3m2!1sen!2snp!4v1685000692013!5m2!1sen!2snp',
            'fb_url' => 'https://www.facebook.com/',
            'insta_url' => 'https://www.instagram.com/',
            'youtube_url' => 'https://www.youtube.com/'
        ]);
    }
}
