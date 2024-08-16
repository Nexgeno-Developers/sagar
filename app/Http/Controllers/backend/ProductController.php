<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // or paginate() if needed
        return view('backend.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::pluck('title', 'id');
        return view('backend.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
            'function_description' => 'nullable|string',
            'product_description' => 'nullable|string',
            'product_information' => 'nullable|string',
            'delivery_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'product_category' => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products');
        }

        $product = Product::create($data);
        $product->categories()->sync($request->product_category);

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::pluck('title', 'id');
        return view('backend.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products,slug,' . $product->id,
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
            'function_description' => 'nullable|string',
            'product_description' => 'nullable|string',
            'product_information' => 'nullable|string',
            'delivery_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'product_category' => 'nullable|array',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('products');
        }

        $product->update($data);
        $product->categories()->sync($request->product_category);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
    
        flash(__('Product deleted successfully'))->success();
        return redirect()->route('products.index');
    }
}
