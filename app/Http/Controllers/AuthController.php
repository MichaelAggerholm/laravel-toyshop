<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Show login page
    public function showLogin()
    {
        return view('pages.login');
    }

    // Show register page
    public function showRegister()
    {
        return view('pages.register');
    }

    // Register user
    public function postRegister(Request $request) {
        $request->validate([
            'name' => 'required|min:3|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:255|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email, 
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return back()->with('success', 'You have successfully registered!');
    }

    // Login user
    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            return back()->with('success', 'You have successfully logged in!');
        }

        return back()
        ->withInput()
        ->withErrors([
            'email' => 'Invalid credentials!',
        ]);
    }

    // Reset password

    // Logout user
    public function logout()
    {
        Auth::logout();

        return back()->with('success', 'You have successfully logged out!');
    }
}
