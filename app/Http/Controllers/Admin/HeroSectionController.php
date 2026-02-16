<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class HeroSectionController extends Controller
{
    public function index()
    {
        $hero = HeroSection::first();
        return view('admin.hero.index', compact('hero'));
    }

    public function update(Request $request, $id)
    {
        $hero = HeroSection::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:1000',
            'cta_text' => 'required|string|max:100',
            'cta_link' => 'required|string|max:255',
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('background_image')) {
            if ($hero->background_image && Storage::disk('public')->exists($hero->background_image)) {
                Storage::disk('public')->delete($hero->background_image);
            }
            $path = $request->file('background_image')->store('hero', 'public');
            $validated['background_image'] = $path;
        }

        $validated['is_active'] = $request->boolean('is_active', false);

        $hero->update($validated);

        // Clear landing page cache
        Cache::forget('landing_page_data');

        return response()->json([
            'success' => true,
            'message' => 'Hero section updated successfully!'
        ]);
    }
}