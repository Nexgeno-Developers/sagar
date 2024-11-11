<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Industry;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all(); // or paginate() if needed
        return view('backend.pages.products.index', compact('products'));
    }

    public function create()
    {
        $Industry = Industry::get();
        $categories = ProductCategory::pluck('title', 'id');
        return view('backend.pages.products.create', compact('categories','Industry'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:products',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
            'function_description' => 'nullable|string',
            'product_description' => 'nullable|string',
            'product_information' => 'nullable|string',
            'delivery_description' => 'nullable|string',
            'industry'  => 'required',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'product_category' => 'nullable|array',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $product = new Product;
        $slug = customSlug($request->input('slug'));
        if (Product::where('slug', $slug)->first() == null) {

            if ($request->hasFile('image')) {
                $image = $request->file('image')->store('assets/images', 'public');
            } else {
                $image = null;
            }

            $product->title = $request->title;
            $product->slug = $slug;
            $product->is_active = $request->is_active;
            $product->image = $image;
            $product->function_description = $request->function_description;
            $product->product_description = $request->product_description;
            $product->product_information = $request->product_information;
            $product->delivery_description = $request->delivery_description;
            $product->product_category_ids = $request->product_category;
            $product->industry = json_encode($request->industry);
            $product->meta_title = $request->meta_title;
            $product->meta_description = $request->meta_description;

            $product->save();

            return response()->json([
                'status' => true,
                'notification' => 'Product created successfully!',
            ]);
        }
        $response = [
            'status' => false,
            'notification' => 'Slug has been used already',
        ];

        return response()->json($response);
    }

    

    public function edit(Product $product, $id)
    {
        $Industry = Industry::get();
        $product = Product::findOrFail($id);  // Retrieve the product by ID
        $categories = ProductCategory::pluck('title', 'id');
        return view('backend.pages.products.edit', compact('product', 'categories','Industry'));
    }
    

    public function update(Request $request, $id)
{
    // Validate the input data
    $validator = Validator::make($request->all(), [
        'title' => 'required|string|max:255',
        'slug' => 'required|string|max:255',
        'image' => 'nullable|image|max:2048',
        'is_active' => 'required|boolean',
        'product_category' => 'nullable|array',
        'function_description' => 'nullable|string',
        'product_description' => 'nullable|string',
        'product_information' => 'nullable|string',
        'delivery_description' => 'nullable|string',
        'industry'  => 'required',
        'meta_title' => 'nullable|string|max:255',
        'meta_description' => 'nullable|string|max:255',
    ]);

    // Handle validation errors
    if ($validator->fails()) {
        return response()->json([
            'status' => false,
            'notification' => $validator->errors()->all()
        ], 200);
    }

    // Find the product by ID
    $product = Product::findOrFail($id);

    // Generate the slug using your customSlug function
    $slug = customSlug($request->input('slug'));

    // Check if the slug already exists for a different product
    $existingProduct = Product::where('slug', $slug)->where('id', '!=', $id)->first();

    if ($existingProduct) {
        return response()->json([
            'status' => false,
            'notification' => 'Slug has been used already by another product.',
        ], 200);
    }

    // Handle the image upload
    if ($request->hasFile('image')) {
        $image = $request->file('image')->store('assets/images', 'public');
    } else {
        $image = $request->input('existing_image');
    }

    // Update the product details
    $product->title = $request->title;
    $product->slug = $slug;
    $product->is_active = $request->is_active;
    $product->image = $image;
    $product->function_description = $request->function_description;
    $product->product_description = $request->product_description;
    $product->product_information = $request->product_information;
    $product->delivery_description = $request->delivery_description;
    $product->product_category_ids = $request->product_category;
    $product->industry = json_encode($request->industry);
    $product->meta_title = $request->meta_title;
    $product->meta_description = $request->meta_description;

    // Save the updated product
    $product->save();

    // Return success response
    return response()->json([
        'status' => true,
        'notification' => 'Product updated successfully!',
    ]);
}

    
    public function delete($id) {
        
        $product = Product::find($id);
        if (!$product) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $product->delete();

        $response = [
            'status' => true,
            'notification' => 'Product Deleted successfully!',
        ];

        return response()->json($response);
    }

}
