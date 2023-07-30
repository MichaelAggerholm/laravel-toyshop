<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    // Hjem
    public function home() {
        $products = Product::with('category', 'colors')->orderBy('created_at')->get();

        return view('pages.home', [
            'products' => $products
        ]);
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
