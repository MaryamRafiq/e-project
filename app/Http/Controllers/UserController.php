<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Retrieve all users from the database
        $users = User::all();

        // Return the users to a view
        return view('users.index', compact('users'));  // Return users to the 'users.index' view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Return the view to create a new user
        return view('users.create');  // This view should contain a form for creating users
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user with the validated data
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Hash the password before storing
        ]);

        // Redirect to the user list with a success message
        return redirect()->route('users.index')->with('success', 'User Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        // Return the view to show the user's details
        return view('users.show', compact('user'));  // Show user details in 'users.show' view
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        // Return the view to edit the user's details
        return view('users.edit', compact('user'));  // This view should contain a form for editing users
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:8|confirmed', // Password is optional for updates
        ]);

        // Update the user's information
        $user->update([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $user->password,  // Only update password if provided
        ]);

        // Redirect to the user list with a success message
        return redirect()->route('users.index')->with('success', 'User Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Delete the user
        $user->delete();

        // Redirect to the user list with a success message
        return redirect()->route('users.index')->with('success', 'User Deleted Successfully');
    }
}
