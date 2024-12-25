<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Show the registration form.
     */
    public function showRegisterForm()
    {
        return view('auth.register');  // Adjust this to your register view
    }

    /**
     * Show the login form.
     */
    public function showLoginForm()
    {
        return view('auth.login');  // Adjust this to your login view
    }

    /**
     * Handle user registration.
     */
    public function register(Request $request)
    {
        // Validate the incoming registration request
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required|string|confirmed|min:8',
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Create a new user record
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),  // Hash the password
        ]);

        // Log the user in after registration
        Auth::login($user);

        // Redirect to the home page or any other page after successful registration
        return redirect()->route('home')->with('success', 'Registration successful!');
    }

    /**
     * Handle user login.
     */
    public function login(Request $request)
    {
        // Validate the login request
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // If validation fails, return errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Attempt to log the user in with the provided credentials
        if (Auth::attempt($request->only('email', 'password'))) {
            // Redirect to home or any other page after successful login
            return redirect()->route('home')->with('success', 'Login successful!');
        }

        // If login attempt fails
        return redirect()->back()->with('error', 'Invalid credentials');
    }

    /**
     * Handle user logout.
     */
    public function logout()
    {
        // Log the user out
        Auth::logout();

        // Redirect to the login page or homepage after logout
        return redirect()->route('login')->with('success', 'Logout successful!');
    }
}
