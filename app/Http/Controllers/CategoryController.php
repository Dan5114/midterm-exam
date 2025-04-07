<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return redirect()->route('categories.index')
            ->with('success', 'Category created successfully.');
    }
    
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::all();
        return view('categories.index', compact('categories', 'category'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);
        
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        
        return redirect()->route('categories.index')
            ->with('success', 'Category updated successfully.');
    }
    
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        
        return redirect()->route('categories.index')
            ->with('success', 'Category deleted successfully.');
    }
}