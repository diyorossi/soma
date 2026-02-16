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
        return view('admin.services.index', compact('services'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'icon' => 'required|string|max:100',
            'order' => 'nullable|integer|min:0',
        ]);

        $validated['order'] = $validated['order'] ?? 0;

        $service = Service::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Service created successfully!',
            'data' => $service
        ]);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:2000',
            'icon' => 'required|string|max:100',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'boolean',
        ]);

        $validated['order'] = $validated['order'] ?? 0;
        $validated['is_active'] = $request->boolean('is_active', false);

        $service->update($validated);

        return response()->json([
            'success' => true,
            'message' => 'Service updated successfully!',
            'data' => $service
        ]);
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();

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
}