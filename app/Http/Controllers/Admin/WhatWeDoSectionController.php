<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhatWeDoSection;

class WhatWeDoSectionController extends Controller
{
    public function index()
    {
        $whatWeDo = WhatWeDoSection::first();
        return view('admin.whatwedo.index', compact('whatWeDo'));
    }

    public function update(Request $request, $id)
    {
        $whatWeDo = WhatWeDoSection::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:5000',
            'is_active' => 'boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active', false);

        $whatWeDo->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'What We Do section updated successfully!'
        ]);
    }
}