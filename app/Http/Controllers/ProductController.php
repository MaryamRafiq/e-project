<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all Product records from the database
        $products = Product::all();

        // Return the view with the list of products
        return view('products.index', compact('products'));  // Adjust based on your Blade view path
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve all categories to populate the category dropdown in the form
        $categories = Category::all();

        // Return the view to create a new Product resource
        return view('products.create', compact('categories'));  // Adjust based on your Blade view path
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',  // Validate image upload
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string|in:available,unavailable',
            'category_id' => 'required|exists:categories,id',  // Validate that the category exists
        ]);

        // Handle file upload for the image
        if ($request->hasFile('image')) {
            // Store the image in the 'public/uploads' directory
            $imagePath = $request->file('image')->store('uploads', 'public');
        } else {
            $imagePath = null;  // Default image or set a placeholder if required
        }

        // Create a new Product record using the validated data
        Product::create([
            'name' => $validated['name'],
            'image' => $imagePath,
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'status' => $validated['status'],
            'category_id' => $validated['category_id'],
        ]);

        // Redirect back to the product list page with a success message
        return redirect()->route('products.index')->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        // Return the view to show the details of a specific Product
        return view('products.show', compact('product'));  // Adjust based on your Blade view path
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        // Retrieve all categories to populate the category dropdown in the form
        $categories = Category::all();

        // Return the view to edit an existing Product resource
        return view('products.edit', compact('product', 'categories'));  // Adjust based on your Blade view path
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',  // Image is now optional for update
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string|in:available,unavailable',
            'category_id' => 'required|exists:categories,id',
        ]);

        // Handle file upload for the image (if a new image is provided)
        if ($request->hasFile('image')) {
            // Store the new image in the 'public/uploads' directory
            $imagePath = $request->file('image')->store('uploads', 'public');
        } else {
            // If no new image is uploaded, use the existing image
            $imagePath = $product->image;
        }

        // Update the existing Product record with validated data
        $product->update([
            'name' => $validated['name'],
            'image' => $imagePath,
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'status' => $validated['status'],
            'category_id' => $validated['category_id'],
        ]);

        // Redirect back to the product list page with a success message
        return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        // Delete the image from storage if it exists
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

        // Delete the specified Product resource
        $product->delete();

        // Redirect back to the product list page with a success message
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}
