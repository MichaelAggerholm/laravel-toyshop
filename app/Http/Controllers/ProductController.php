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
        $products = Product::with('category', 'colors')->orderBy('created_at', 'desc')->get();

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
        $request->validate([
            'title' => 'required|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'colors' => 'required|array',
            'image' => 'required|image|mimes:jpg,jpeg,png,gif,svg|max:2048',
        ]);

        // For at sikre et unikt navn til billeder som uploades.
        $image_name = 'product_images/' . time() . '-' . rand(0, 9999) . '.' . $request->image->extension();
        $request->image->storeAs('public', $image_name);

        // Gem produkt
        $product = Product::create([
            'title' => $request->title,
            'price' => $request->price, // TODO: Skal muligvis ganges med 100 for at virke med betalingsopsætning. (Stripe)
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $image_name,
        ]);

        // Tilføj farver til produkt
        $product->colors()->attach($request->colors);

        return redirect()->route('adminpanel.products')->with('success', 'Produktet blev oprettet!');
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
        Product::findOrFail($id)->delete();

        return back()->with('success', 'Produktet blev slettet!');
    }
}
