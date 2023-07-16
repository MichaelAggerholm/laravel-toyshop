<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    // adminpanel

    // Display products table
    public function index()
    {
        return view('admin.pages.products.index');
    }

    // Create new product
    public function create()
    {
        return view('admin.pages.products.create');
    }

    // Store new product
    public function store(Request $request)
    {
        return 'store';
    }

    // Edit product
    public function edit($id)
    {
        return view('admin.pages.products.edit');
    }

    // Update product
    public function update(Request $request, $id)
    {
        return 'update';
    }

    // Delete product
    public function destroy($id)
    {
        return 'destroy';
    }
}
