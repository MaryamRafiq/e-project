<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
     */
    public function index()
    {
        $categories = Category::all(); // Retrieve all categories
        return view('categories.index', compact('categories')); // Return a view with the categories
    }

    /**
     * Store a newly created category in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Create the category with validated data
        Category::create($validated);

        // Redirect to the categories index with a success message
        return redirect()->route('categories.index')
            ->with('success', 'Category Created Successfully');
    }

    /**
     * Display the specified category.
     */
    public function show(Category $category)
    {
        return view('categories.show', compact('category')); // Display the specific category
    }

    /**
     * Show the form for editing the specified category.
     */
    public function edit(Category $category)
    {
        return view('categories.edit', compact('category')); // Show the edit form for the category
    }

    /**
     * Update the specified category in storage.
     */
    public function update(Request $request, Category $category)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
        ]);

        // Update the category with validated data
        $category->update($validated);

        // Redirect to the categories index with a success message
        return redirect()->route('categories.index')
            ->with('success', 'Category Updated Successfully');
    }

    /**
     * Remove the specified category from storage.
     */
    public function destroy(Category $category)
    {
        // Delete the category
        $category->delete();

        // Redirect to the categories index with a success message
        return redirect()->route('categories.index')
            ->with('success', 'Category Deleted Successfully');
    }
}
