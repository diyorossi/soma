<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ContactInfo;

class ContactInfoSeeder extends Seeder
{
    public function run()
    {
        ContactInfo::create([
            'email' => 'hello@agency.com',
            'phone' => '+1 234 567 890',
            'address' => '123 Creative Street, Design City, DC 12345',
            'facebook_link' => 'https://facebook.com',
            'instagram_link' => 'https://instagram.com',
            'twitter_link' => 'https://twitter.com',
            'linkedin_link' => 'https://linkedin.com',
            'tiktok_link' => 'https://tiktok.com',
        ]);
    }
}