<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioWork;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Cache;

class PortfolioWorkController extends Controller
{
    public function index()
    {
        $works = PortfolioWork::orderBy('order', 'asc')->get();
        $categories = PortfolioWork::distinct()->pluck('category');
        return view('admin.portfolio.index', compact('works', 'categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:100',
            'client_name' => 'nullable|string|max:255',
            'project_link' => 'nullable|url|max:500',
            'order' => 'nullable|integer|min:0',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('portfolio', 'public');
            $validated['image'] = $path;
        }

        $validated['order'] = $validated['order'] ?? 0;

        $work = PortfolioWork::create($validated);

        // Clear landing page cache
        Cache::forget('landing_page_data');

        return response()->json([
            'success' => true,
            'message' => 'Portfolio work added successfully!',
            'data' => $work
        ]);
    }

    public function update(Request $request, $id)
    {
        $work = PortfolioWork::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category' => 'required|string|max:100',
            'client_name' => 'nullable|string|max:255',
            'project_link' => 'nullable|url|max:500',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        if ($request->hasFile('image')) {
            if ($work->image && Storage::disk('public')->exists($work->image)) {
                Storage::disk('public')->delete($work->image);
            }
            $path = $request->file('image')->store('portfolio', 'public');
            $validated['image'] = $path;
        }

        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', false);

        $work->update($validated);

        // Clear landing page cache
        Cache::forget('landing_page_data');

        return response()->json([
            'success' => true,
            'message' => 'Portfolio work updated successfully!',
            'data' => $work
        ]);
    }

    public function destroy($id)
    {
        $work = PortfolioWork::findOrFail($id);
        
        if ($work->image && Storage::disk('public')->exists($work->image)) {
            Storage::disk('public')->delete($work->image);
        }
        
        $work->delete();

        // Clear landing page cache
        Cache::forget('landing_page_data');

        return response()->json([
            'success' => true,
            'message' => 'Portfolio work deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $work = PortfolioWork::findOrFail($id);
        return response()->json([
            'success' => true,
            'work' => $work
        ]);
    }
}