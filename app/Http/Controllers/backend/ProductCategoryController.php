<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productCategories = ProductCategory::all(); // or paginate() if needed
        return view('backend.product-categories.index', compact('productCategories'));
    }

    public function create()
    {
        return view('backend.product_categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:product_categories',
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product_categories');
        }

        ProductCategory::create($data);

        return redirect()->route('product-categories.index')->with('success', 'Product category created successfully.');
    }

    public function edit(ProductCategory $productCategory)
    {
        return view('backend.product_categories.edit', compact('productCategory'));
    }

    public function update(Request $request, ProductCategory $productCategory)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:product_categories,slug,' . $productCategory->id,
            'image' => 'nullable|image|max:2048',
            'status' => 'required|boolean',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('product_categories');
        }

        $productCategory->update($data);

        return redirect()->route('product-categories.index')->with('success', 'Product category updated successfully.');
    }

    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);
        $category->delete();
    
        $response = [
            'status' => true,
            'notification' => 'Category deleted successfully!',
        ];

        return response()->json($response);

        // flash(__('Category deleted successfully'))->success();
        // return redirect()->route('product-categories.index');
    }
}
