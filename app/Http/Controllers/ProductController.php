<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
public function index(Request $request)
{
    $query = Product::where('is_delete', 0);

    // lọc theo keyword
    if ($request->keyword) {
        $query->where('name', 'like', '%' . $request->keyword . '%');
    }

    // lọc theo category
    if ($request->category_id) {
        $query->where('category_id', $request->category_id);
    }

    $products = $query->get();
    $categories = Category::all();

    return view('product.index', compact('products', 'categories'));
}

public function create()
{
    $categories = Category::where('is_delete', 0)->get();
    return view('product.create', compact('categories'));
}

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|min:0',
        'sale_price' => 'nullable|numeric|min:0|lte:price',
        'stock' => 'required|integer|min:0',
        'category_id' => 'nullable|exists:categories,id'
    ]);

    $data = $request->only([
        'category_id', 'name', 'price', 'sale_price',
        'stock', 'description', 'is_active'
    ]);

    $data['is_delete'] = 0;

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    Product::create($data);

    return redirect()->route('product.index');
}

public function edit($id)
{
    $product = Product::findOrFail($id);
    $categories = Category::where('is_delete', 0)->get();

    return view('product.edit', compact('product', 'categories'));
}

public function update(Request $request, $id)
{
    $product = Product::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|min:0',
        'sale_price' => 'nullable|numeric|min:0|lte:price',
        'stock' => 'required|integer|min:0',
        'category_id' => 'nullable|exists:categories,id'
    ]);

    $data = $request->only([
        'category_id', 'name', 'price', 'sale_price',
        'stock', 'description', 'is_active'
    ]);

    if ($request->hasFile('image')) {
        $data['image'] = $request->file('image')->store('products', 'public');
    }

    $product->update($data);

    return redirect()->route('product.index');
}

public function destroy($id)
{
    $product = Product::findOrFail($id);
    $product->is_delete = 1;
    $product->save();

    return redirect()->route('product.index');
}
}
