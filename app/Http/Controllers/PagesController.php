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

    // Wish-list
    public function wishlist() {
        return view('pages.wishlist');
    }

    // Account
    public function account() {
        return view('pages.account');
    }
}
