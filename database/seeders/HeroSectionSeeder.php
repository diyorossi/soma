<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HeroSection;

class HeroSectionSeeder extends Seeder
{
    public function run()
    {
        HeroSection::create([
            'title' => 'Transform Your Brand with AI-Powered Creativity',
            'subtitle' => 'We help brands grow with content that is fast, consistent, and unmistakably on-brand.',
            'cta_text' => 'Get Started',
            'cta_link' => '#contact',
            'background_image' => null,
            'is_active' => true,
        ]);
    }
}