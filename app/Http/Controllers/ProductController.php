<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Display products table
    public function index() {
        $products = Product::all();

        return view('admin.pages.products.index', ['products' => $products]);
    }

    // Create new product
    public function create() {
        $categories = Category::all();
        $colors = Color::all();

        return view('admin.pages.products.create', ['categories' => $categories, 'colors' => $colors]);
    }

    // Store new product
    public function store(Request $request) {
        return 'store';
    }

    // Edit product
    public function edit($id) {
        return view('admin.pages.products.edit');
    }

    // Update product
    public function update(Request $request, $id) {
        return 'update';
    }

    // Delete product
    public function destroy($id) {
        return 'destroy';
    }
}
