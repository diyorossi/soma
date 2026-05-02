<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactInfo;
use App\Models\SocialMedia;

class ContactInfoController extends Controller
{
    public function index()
    {
        $contact = ContactInfo::first();
        $socialLinks = SocialMedia::orderBy('order')->get();
        return view('admin.contact.index', compact('contact', 'socialLinks'));
    }

    public function update(Request $request, $id)
    {
        $contactInfo = ContactInfo::findOrFail($id);

        $validated = $request->validate([
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'address' => 'nullable|string|max:500',
        ]);

        $contactInfo->update($validated);

        // Clear landing page cache
        \Illuminate\Support\Facades\Cache::forget('landing_page_data');

        return response()->json([
            'success' => true,
            'message' => 'Contact information updated successfully!'
        ]);
    }
}