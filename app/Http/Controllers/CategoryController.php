<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // index
    public function index(){
        $categories = Category::all();
        return view('admin.pages.categories.index', ['categories' => $categories]);
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|unique:categories|max:255'
        ]);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return redirect()->back()->with('success', 'Category created successfully');
    }

    public function destroy($id) {
        Category::findOrFail($id)->delete();

        return back()->with('success', 'Category deleted successfully');
    }
}
