<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    public function run()
    {
        $services = [
            [
                'title' => 'Branding',
                'description' => "We give your products and services meaning by shaping how people perceive your brand—through voice, tone, content pillars, and visual consistency.",
                'icon' => 'fas fa-palette',
                'order' => 1,
            ],
            [
                'title' => 'Social Media Management',
                'description' => "Eye-catching visuals build awareness—but a structured content program wins attention consistently. AI accelerates production, and our experts curate the output so it stays high-quality and on-brand.",
                'icon' => 'fas fa-share-alt',
                'order' => 2,
            ],
            [
                'title' => 'Photography',
                'description' => "We transform your simple product photos into professional, brand-consistent visuals. With AI-powered enhancement and expert curation, we refine backgrounds, lighting, color, and composition to match your brand guidelines—so every product looks premium across every post.",
                'icon' => 'fas fa-camera',
                'order' => 3,
            ],
            [
                'title' => 'Videography',
                'description' => "We transform your simple product photos into professional commercial product videos. We craft strong hooks, clean motion, and clear messaging so your product looks premium, your brand looks credible, and your content drives action.",
                'icon' => 'fas fa-video',
                'order' => 4,
            ],
            [
                'title' => 'Reels & TikTok Management',
                'description' => "We support you from concept to execution such as storylines, copywriting, trend/audio recommendations, and content guidance.",
                'icon' => 'fas fa-mobile-alt',
                'order' => 5,
            ],
        ];

        foreach ($services as $service) {
            Service::create(array_merge($service, ['is_active' => true]));
        }
    }
}