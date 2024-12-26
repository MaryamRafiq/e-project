<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use App\Models\Testing;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       
        // Start a query for the Report model
    $query = Report::with('testing', 'user');

    // Check if the 'title' field is present in the request and is not empty
    if ($request->has('title') && $request->input('title') !== '') {
        $query->where('title', 'like', '%' . $request->input('title') . '%');
    }
    // Paginate the results
    $reports = $query->paginate(5);

    // Return the view with the reports data
    return view('reports.index', compact('reports'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Retrieve users and testings for dropdowns or selection in the form
        $users = User::all();
        $testings = Testing::all();

        // Return the view to create a new Report resource
        return view('reports.create', compact('users', 'testings'));  // Adjust based on your Blade view path
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required',
            'content' => 'required',
            'status' => 'required',  // Example of status values
            'user_id' => 'required',  // Validate that the user exists
            'testing_id' => 'required',  // Validate that the testing exists
        ]);

        // Create a new Report record using the validated data
        Report::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'user_id' => $validated['user_id'],
            'testing_id' => $validated['testing_id'],
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('reports.index')->with('success', 'Report Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Report $report)
    {
        // Return the view to show the details of a specific Report
        return view('reports.show', compact('report'));  // Adjust based on your Blade view path
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Report $report)
    {
        // Retrieve users and testings for dropdowns or selection in the form
        $users = User::all();
        $testings = Testing::all();

        // Return the view to edit an existing Report resource
        return view('reports.edit', compact('report', 'users', 'testings'));  // Adjust based on your Blade view path
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Report $report)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string',
            'user_id' => 'required',
            'testing_id' => 'required',
        ]);

        // Update the existing Report record
        $report->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'status' => $validated['status'],
            'user_id' => $validated['user_id'],
            'testing_id' => $validated['testing_id'],
        ]);

        // Redirect back to the index page with a success message
        return redirect()->route('reports.index')->with('success', 'Report Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Report $report)
    {
        // Delete the specified Report resource
        $report->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('reports.index')->with('success', 'Report Deleted Successfully');
    }
}
