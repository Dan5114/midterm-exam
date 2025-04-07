<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->get();
        $categories = Category::all();
        return view('items.index', compact('items', 'categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        Item::create([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);
        
        return redirect()->route('items.index')
            ->with('success', 'Item created successfully.');
    }
    
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $items = Item::with('category')->get();
        $categories = Category::all();
        return view('items.index', compact('items', 'item', 'categories'));
    }
    
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ]);
        
        $item = Item::findOrFail($id);
        $item->update([
            'name' => $request->name,
            'quantity' => $request->quantity,
            'price' => $request->price,
            'category_id' => $request->category_id,
        ]);
        
        return redirect()->route('items.index')
            ->with('success', 'Item updated successfully.');
    }
    
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        
        return redirect()->route('items.index')
            ->with('success', 'Item deleted successfully.');
    }
}