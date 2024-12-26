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
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->has('name') && $request->input('name') !== '') {
            $query->where('name', 'like', '%' . $request->input('name') . '%');
        }
    
        $products = $query->paginate(10); 
    
        return view('products.index', compact('products'));
        
        } 

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            // 'image' => 'required|mimes:jpeg,png,jpg,gif|max:2048',  
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string|in:available,unavailable',
            'category_id' => 'required|exists:categories,id',
        ]);

        // return $request->all();

       
        if ($request->hasFile('image')) {
            
            $imagePath = $request->file('image')->store('uploads', 'public');
        } else {
            $imagePath = null;  
        }

        Product::create([
            'name' => $validated['name'],
            'image' => $imagePath,
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'status' => $validated['status'],
            'category_id' => $validated['category_id'],
        ]);

        return redirect()->route('products.index')->with('success', 'Product Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        
        return view('products.show', compact('product'));  
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
       
        $categories = Category::all();

       
        return view('products.edit', compact('product', 'categories'));  
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
    
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048',  
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:1',
            'status' => 'required|string|in:available,unavailable',
            'category_id' => 'required|exists:categories,id',
        ]);

       
        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/' . $product->image); 
            }
            $imagePath = $request->file('image')->store('uploads', 'public'); 
        } else {
            $imagePath = $product->image; 
        }
    
        
        $product->update([
            'name' => $validated['name'],
            'image' => $imagePath,
            'description' => $validated['description'],
            'price' => $validated['price'],
            'quantity' => $validated['quantity'],
            'status' => $validated['status'],
            'category_id' => $validated['category_id'],
        ]);

        
        return redirect()->route('products.index')->with('success', 'Product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        
        if ($product->image) {
            Storage::delete('public/' . $product->image);
        }

       
        $product->delete();

        
        return redirect()->route('products.index')->with('success', 'Product Deleted Successfully');
    }
}
