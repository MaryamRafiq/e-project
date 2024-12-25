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
    public function index()
    {
        // Retrieve all reports from the database
        $reports = Report::with('testing')->with('user')->get();

        // Return the view with the list of reports
        return view('reports.index', compact('reports'));  // Adjust based on your Blade view path
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
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'status' => 'required|string|in:active,inactive',  // Example of status values
            'user_id' => 'required|exists:users,id',  // Validate that the user exists
            'testing_id' => 'required|exists:testings,id',  // Validate that the testing exists
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
            'status' => 'required|string|in:active,inactive',
            'user_id' => 'required|exists:users,id',
            'testing_id' => 'required|exists:testings,id',
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
