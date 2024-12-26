<?php

namespace App\Http\Controllers;

use App\Models\Testing;
use Illuminate\Http\Request;

class TestingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
    $query = Testing::query();

    if ($request->has('name') && $request->input('name') !== '') {
        $query->where('name', 'like', '%' . $request->input('name') . '%');
    }

    $testings = $query->paginate(10); 

    return view('testings.index', compact('testings'));
    
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testings.create');  
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'status' => 'required|string|max:255',
        ]);
    
        Testing::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'role' => $request->input('role'),
            'status' => $request->input('status'),
        ]);
    
        return redirect('/testings')->with('success', 'Tester created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Testing $testing)
    {
        return view('testings.show', compact('testing'));  // Adjust based on your Blade view path
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testing $testing)
    {
        return view('testings.edit', compact('testing'));  // Adjust based on your Blade view path
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Testing $testing)
    {
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'required|string|max:255',
        'role' => 'required|string|max:255',
        'status' => 'required|string|max:255',
    ]);

    $testing->update([
        'name' => $validated['name'],
        'description' => $validated['description'],
        'role' => $validated['role'],
        'status' => $validated['status'],
    ]);

    return redirect()->route('testings.index')->with('success', 'Testing Updated Successfully');
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testing $testing)
    {
        $testing->delete();

        return redirect()->route('testings.index')->with('success', 'Testing Deleted Successfully');
    }
}
