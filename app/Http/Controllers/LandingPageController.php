<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroSection;
use App\Models\AboutSection;
use App\Models\WhatWeDoSection;
use App\Models\Service;
use App\Models\PortfolioWork;
use App\Models\ContactInfo;
use App\Models\ContactMessage;
use Illuminate\Support\Facades\Cache;

class LandingPageController extends Controller
{
    public function index()
    {
        // Cache landing page data for 1 hour to reduce database queries
        $cacheKey = 'landing_page_data';
        $cacheDuration = 3600; // 1 hour in seconds
        
        $data = Cache::remember($cacheKey, $cacheDuration, function() {
            return [
                'hero' => HeroSection::getActive(),
                'about' => AboutSection::getActive(),
                'whatWeDo' => WhatWeDoSection::getActive(),
                'services' => Service::getActiveOrdered(),
                'portfolioWorks' => PortfolioWork::getActiveOrdered(),
                'categories' => PortfolioWork::getCategories(),
                'contactInfo' => ContactInfo::getFirst(),
            ];
        });
        
        return view('landing.index', $data);
    }

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        ContactMessage::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Thank you for your message! We will get back to you soon.'
        ]);
    }
}