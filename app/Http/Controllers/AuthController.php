<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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

    // Login user

    // Reset password
}
