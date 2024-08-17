<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $productCategories = ProductCategory::all(); // or paginate() if needed
        return view('backend.pages.products_category.index', compact('productCategories'));
    }

    public function create()
    {
        // return view('backend.pages.products.create');
        return view('backend.pages.products_category.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:product_categories',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $product_category = new ProductCategory;
        $slug = customSlug($request->input('slug'));
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets/images', 'public');
        } else {
            $image = null;
        }
        
        if (ProductCategory::where('slug', $slug)->first() == null) {
                        
            $product_category->title = $request->title;
            $product_category->slug = $slug;
            $product_category->is_active = $request->is_active;
            $product_category->image = $image;
            $product_category->description = $request->description;
            $product_category->meta_title = $request->meta_title;
            $product_category->meta_description = $request->meta_description;
    
            $product_category->save();

            $response = [
                'status' => true,
                'notification' => 'Product category created successfully!',
            ];
    
            return response()->json($response);
        }
        $response = [
            'status' => false,
            'notification' => 'Slug has been used already',
        ];

        return response()->json($response);

    }
    public function edit(request $request, $id)
    {
        $productCategory = productCategory::findOrFail($id);
        return view('backend.pages.products_category.edit', compact('productCategory'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:product_categories,slug,' . $id,
            'image' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
            'description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
        ]);
    
        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $ProductCategory = ProductCategory::findOrFail($id);
        $slug = customSlug($request->input('slug'));
        if (ProductCategory::where('slug', $slug)->first() == null) {

            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('assets/images', 'public');
            } else {
                $image = $request->input('existing_image');
            }
        
            $ProductCategory->title = $request->title;
            $ProductCategory->slug = $slug;
            $ProductCategory->is_active = $request->is_active;
            $ProductCategory->image = $image;
            $ProductCategory->description = $request->description;
            $ProductCategory->meta_title = $request->meta_title;
            $ProductCategory->meta_description = $request->meta_description;
        
            $ProductCategory->update();
        
            return response()->json([
                'status' => true,
                'notification' => 'Product Category updated successfully!',
            ]);
        }
        $response = [
            'status' => false,
            'notification' => 'Slug has been used already',
        ];

        return response()->json($response);
    }

    public function delete($id) {
        
        $category = ProductCategory::find($id);
        if (!$category) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $category->delete();

        $response = [
            'status' => true,
            'notification' => 'Category Deleted successfully!',
        ];

        return response()->json($response);
    } 


}
