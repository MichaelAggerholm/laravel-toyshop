<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function post($id) {
        // We can attach the product to the wishlist like this, because we have a relationship between the User and Product models
        Auth::user()->wishlist()->attach($id);
        return back();
    }

    public function remove($id) {
        Auth::user()->wishlist()->detach($id);
        return back();
    }
}
