<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Hjem
    public function home() {
        return view('pages.home');
    }

    // Kurv
    public function cart() {
        return view('pages.cart');
    }
}
