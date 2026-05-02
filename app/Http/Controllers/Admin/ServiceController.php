<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('order', 'asc')->get();
        $serviceSection = \App\Models\ServiceSection::getActive();
        return view('admin.services.index', compact('services', 'serviceSection'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'icon' => 'nullable|string|max:100',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', false);

        $service = Service::create($validated);

        // Clear landing page cache
        \Illuminate\Support\Facades\Cache::forget('landing_page_data');

        return response()->json([
            'success' => true,
            'message' => 'Service created successfully!',
            'service' => $service
        ]);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:2000',
            'icon' => 'nullable|string|max:100',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', false);

        $service->update($validated);

        // Clear landing page cache
        \Illuminate\Support\Facades\Cache::forget('landing_page_data');

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully!',
            'service' => $service
        ]);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

        // Clear landing page cache
        \Illuminate\Support\Facades\Cache::forget('landing_page_data');

        return response()->json([
            'success' => true,
            'message' => 'Service deleted successfully!'
        ]);
    }

    public function show($id)
    {
        $service = Service::findOrFail($id);
        return response()->json([
            'success' => true,
            'service' => $service
        ]);
    }

    public function updateSection(Request $request)
    {
        $validated = $request->validate([
            'label' => 'required|string|max:255',
            'title' => 'required|string|max:255',
        ]);

        $section = \App\Models\ServiceSection::getActive();
        $section->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Service section header updated successfully!'
        ]);
    }
}