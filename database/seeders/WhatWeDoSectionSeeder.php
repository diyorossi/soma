<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WhatWeDoSection;

class WhatWeDoSectionSeeder extends Seeder
{
    public function run()
    {
        WhatWeDoSection::create([
            'title' => 'What We Do',
            'content' => "We'll do whatever it takes to get your brand the attention it deserves, not just reach but real relevance. We deliver a full spectrum of creative branding services with an AI-powered workflow to create deeper, stronger, and longer-lasting connections between your brand, your ideas, and your audience.",
            'is_active' => true,
        ]);
    }
}