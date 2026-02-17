<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AboutSection;

class AboutSectionSeeder extends Seeder
{
    public function run()
    {
        AboutSection::create([
            'title' => 'About Us',
            'content' => "We are the first creative branding agency AI based that built to help brands grow with content that's fast, consistent, and unmistakably on-brand. We combine an AI content engine with branding experts who understand your guidelines, so you achieve premium output without conventional agency overhead. Let's make your brand impossible to ignore.",
            'image' => null,
            'is_active' => true,
        ]);
    }
}