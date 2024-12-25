<?php

namespace App\Http\Controllers;

use App\Models\Testing;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all Testing records from the database
        $testings = Testing::all();

        // Return the view with the list of testings
        return view('testings.index', compact('testings'));  // Adjust based on your Blade view path
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new Testing resource
        return view('testings.create');  // Adjust based on your Blade view path
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        // Create a new Testing record using the validated data
        Testing::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'role' => $validated['role'],
            'status' => $validated['status'],
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('testings.index')->with('success', 'Testing Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testing $testing)
    {
        // Return the view to show the details of a specific Testing
        return view('testings.show', compact('testing'));  // Adjust based on your Blade view path
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testing $testing)
    {
        // Return the view to edit an existing Testing resource
        return view('testings.edit', compact('testing'));  // Adjust based on your Blade view path
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testing $testing)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'role' => 'required|string',
            'status' => 'required|string',
        ]);

        // Update the existing Testing record with validated data
        $testing->update([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'role' => $validated['role'],
            'status' => $validated['status'],
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('testings.index')->with('success', 'Testing Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testing $testing)
    {
        // Delete the specified Testing resource
        $testing->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('testings.index')->with('success', 'Testing Deleted Successfully');
    }
}
