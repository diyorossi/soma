<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialMedia;

class SocialMediaController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7'
        ]);

        $social = SocialMedia::create([
            'platform' => $request->platform,
            'url' => $request->url,
            'icon' => $request->icon,
            'color' => $request->color ?? '#1a4d2e',
            'order' => SocialMedia::max('order') + 1
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Social media link added successfully!',
            'social' => $social
        ]);
    }

    public function show($id)
    {
        $social = SocialMedia::findOrFail($id);

        return response()->json([
            'success' => true,
            'social' => $social
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'platform' => 'required|string|max:255',
            'url' => 'required|url|max:255',
            'icon' => 'nullable|string|max:255',
            'color' => 'nullable|string|max:7'
        ]);

        $social = SocialMedia::findOrFail($id);
        $social->update([
            'platform' => $request->platform,
            'url' => $request->url,
            'icon' => $request->icon,
            'color' => $request->color ?? '#1a4d2e'
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Social media link updated successfully!',
            'social' => $social
        ]);
    }

    public function destroy($id)
    {
        $social = SocialMedia::findOrFail($id);
        $social->delete();

        return response()->json([
            'success' => true,
            'message' => 'Social media link deleted successfully!'
        ]);
    }
}
