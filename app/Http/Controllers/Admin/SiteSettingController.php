<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Cache;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::getSettings();
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $settings = SiteSetting::getSettings();

        $validated = $request->validate([
            'site_name' => 'required|string|max:100',
        ]);

        $settings->update($validated);

        // Clear view caches if they depend on site name later, 
        // though we'll fetch them dynamically or use Cache::remember
        Cache::forget('site_settings_name');

        return response()->json([
            'success' => true,
            'message' => 'Site settings updated successfully!'
        ]);
    }
}
