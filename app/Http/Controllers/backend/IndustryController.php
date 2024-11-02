<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Industry;

class IndustryController extends Controller
{
    public function index()
    {
        $Industry = Industry::all(); // or paginate() if needed
        return view('backend.pages.industry.index', compact('Industry'));
    }

    public function create()
    {
        // return view('backend.pages.products.create');
        return view('backend.pages.industry.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $industry = new Industry;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets/images', 'public');
        } else {
            $image = null;
        }
                   
        $industry->title = $request->title;
        $industry->is_active = $request->is_active;
        $industry->image = $image;
        $industry->description = $request->description;

        $industry->save();

        $response = [
            'status' => true,
            'notification' => 'Industry created successfully!',
        ];

        return response()->json($response);

    }
    public function edit(request $request, $id)
    {
        $Industry = Industry::findOrFail($id);
        return view('backend.pages.industry.edit', compact('Industry'));
    }


    public function update(Request $request, $id)
    {
        // Validate incoming data
        $validator = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|max:2048',
            'is_active' => 'required|boolean',
            'description' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'notification' => $validator->errors()->all()
            ], 200);
        }

        $Industry = Industry::findOrFail($id);

        // Handle image upload or retain existing image
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('assets/images', 'public');
        } else {
            $image = $request->input('existing_image', $Industry->image);
        }

        // Update product category
        $Industry->title = $request->title;
        $Industry->is_active = $request->is_active;
        $Industry->image = $image;
        $Industry->description = $request->description;
        $Industry->save();

        return response()->json([
            'status' => true,
            'notification' => 'Industry updated successfully!',
        ]);
    }


    public function delete($id) {
        
        $category = Industry::find($id);
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
            'notification' => 'Industry Deleted successfully!',
        ];

        return response()->json($response);
    } 


}
