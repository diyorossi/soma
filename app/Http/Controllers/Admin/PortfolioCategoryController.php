<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PortfolioCategory;
use App\Models\PortfolioWork;

class PortfolioCategoryController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:portfolio_categories',
        ]);

        $category = PortfolioCategory::create($validated);

        return response()->json([
            'success' => true,
            'message' => 'Category added successfully!',
            'category' => $category
        ]);
    }

    public function update(Request $request, $id)
    {
        $category = PortfolioCategory::findOrFail($id);
        $oldName = $category->name;

        $validated = $request->validate([
            'name' => 'required|string|max:100|unique:portfolio_categories,name,' . $id,
        ]);

        $category->update($validated);

        // Update all existing works that used this category string
        PortfolioWork::where('category', $oldName)->update(['category' => $category->name]);

        return response()->json([
            'success' => true,
            'message' => 'Category updated successfully!',
            'category' => $category
        ]);
    }

    public function destroy($id)
    {
        $category = PortfolioCategory::findOrFail($id);
        $name = $category->name;

        // Check if works are using this category
        $count = PortfolioWork::where('category', $name)->count();
        if ($count > 0) {
            // Optional: prevent deletion or move to Uncategorized. We'll move to Uncategorized.
            PortfolioWork::where('category', $name)->update(['category' => 'Uncategorized']);
        }

        $category->delete();

        return response()->json([
            'success' => true,
            'message' => 'Category deleted successfully! Related items moved to Uncategorized.'
        ]);
    }
}
