<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutSection;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class AboutSectionController extends Controller
{
    public function index()
    {
        $about = AboutSection::first();
        return view('admin.about.index', compact('about'));
    }

    public function update(Request $request, $id)
    {
        $about = AboutSection::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:5000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($about->image && Storage::disk('public')->exists($about->image)) {
                Storage::disk('public')->delete($about->image);
            }
            $path = $request->file('image')->store('about', 'public');
            $validated['image'] = $path;
        }

        $validated['is_active'] = $request->boolean('is_active', false);

        $about->update($validated);

        // Clear landing page cache
        Cache::forget('landing_page_data');

        return response()->json([
            'success' => true,
            'message' => 'About section updated successfully!'
        ]);
    }
}