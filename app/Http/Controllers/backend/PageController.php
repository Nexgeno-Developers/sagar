<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Page;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\PostCategory;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('backend.website_settings.pages.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $page = new Page;
        $page->title = $request->title;
        if (Page::where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {
            $page->slug             = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            $page->type             = "custom_page";
            $page->content          = $request->content;
            $page->meta_title       = $request->meta_title;
            $page->meta_description = $request->meta_description;
            $page->keywords         = $request->keywords;
            $page->meta_image       = $request->meta_image;
            $page->save();

            $page_translation           = PageTranslation::firstOrNew(['lang' => env('DEFAULT_LANGUAGE'), 'page_id' => $page->id]);
            $page_translation->title    = $request->title;
            $page_translation->content = $request->content;
            $page_translation->save();

            flash(__('New page has been created successfully'))->success();
            return redirect()->route('website.pages');
        }

        flash(__('Slug has been used already'))->warning();
        return back();
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        //  $lang = $request->lang;
         $page_name = $request->page;
         $page = Page::where('slug', $id)->first();
         $products = Product::where('is_active', 1)->get();
         $product_categories = ProductCategory::where('is_active', 1)->get();
         $post_categories = PostCategory::get();
         if ($page != null) {
             if ($page_name == 'home') {
             return view('backend.website_settings.pages.home_page_edit', compact('page','products','post_categories','product_categories'));
             }
             elseif ($page->id == '8') {
             return view('backend.website_settings.pages.about_page_edit', compact('page','lang'));
             }
             elseif ($page->id == '9') {
             return view('backend.website_settings.pages.beginning_page_edit', compact('page','lang'));
             }
             elseif ($page->id == '10') {
             return view('backend.website_settings.pages.diversification_page_edit', compact('page','lang'));
             }
             elseif ($page->id == '11') {
             return view('backend.website_settings.pages.management_page_edit', compact('page','lang'));
             }
             elseif ($page->id == '12') {
             return view('backend.website_settings.pages.corevalue_page_edit', compact('page','lang'));
             }
             elseif ($page->id == '13') {
             return view('backend.website_settings.pages.milestone_page_edit', compact('page','lang'));
             }
             elseif ($page->id == '15') {
             return view('backend.website_settings.pages.ourquality_policies_page_edit', compact('page','lang'));
             }
             else{
             return view('backend.website_settings.pages.edit', compact('page','lang'));
             }
         }
         abort(404);
     }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);
        if (Page::where('id','!=', $id)->where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {
        if($page->type == 'custom_page'){
          $page->slug           = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
        }
        
        if($page->type == 'home_page'){
            $validator = Validator::make($request->all(), [
                'title' => 'required|string|max:255',
                'slug' => 'required',
                'is_active' => 'required|boolean',
                'product_ids' => 'required|array',
                'about_content' => 'required|string',
                'wwd_content.*' => 'required|string',
                'scp_text1' => 'required|string|max:255',
                'scp_text2' => 'required|string|max:255',
                'scp_text3' => 'required|string|max:255',
                'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'banner.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'wwd_image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'scp_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                'scp_pdf' => 'nullable|file|mimes:pdf|max:2048',
                // Add more validation rules as needed
               
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'status' => false,
                    'notification' => $validator->errors()->all()
                ], 200);
            }   

            if(!empty($request->input('slug'))){            
                $slug = customSlug($request->input('slug'));
            }

            // Initialize content array
            $content = [                
                'product_ids' => implode(',', $request->input('product_ids')),
                'about_content' => $request->input('about_content'),
                'wwd_content' => $request->input('wwd_content'),
                'scp_text' => $request->input('scp_text'),
                'scp_url' => $request->input('scp_url'),
            ];

            // Handle About Image Upload
            if ($request->hasFile('about_image')) {
                if ($page->content['about_image'] ?? false) {
                    Storage::delete($page->content['about_image']);
                }
                $content['about_image'] = $request->file('about_image')->store('assets/images', 'public');
            }else {
                // Retain the existing image
                $content['about_image'] = $request->input('existing_about_image') ?? $content['about_image'];
            }
            
            // Handle Banner Images
            $banners = [];
            foreach ($request->input('banner_text', []) as $key => $text) {
                // Check if a new file was uploaded for this banner
                if ($request->hasFile("banner.$key")) {
                    $path = $request->file("banner.$key")->store('assets/images', 'public');
                } else {
                    // Retain the existing image
                    $path = $request->input('existing_banner_image')[$key] ?? null;
                }
            
                $banners[] = [
                    'image' => $path,
                    'text' => $text,
                    'button' => $request->input('banner_button')[$key] ?? '',
                    'url' => $request->input('banner_url')[$key] ?? '',
                ];
            }            
            // Save banners array to the database or use it as needed
            $content['banner'] = $banners;            

            // Handle What We Do Section Images
            $wwd_images = [];
            foreach ($request->input('wwd_text', []) as $key => $text) {
                // Check if a new file was uploaded for this image
                if ($request->hasFile("wwd_image.$key")) {
                    $path = $request->file("wwd_image.$key")->store('assets/images', 'public');
                } else {
                    // Retain the existing image
                    $path = $request->input('existing_wwd_image')[$key] ?? null;
                }

                $wwd_images[] = [
                    'image' => $path,
                    'text' => $text,
                    'content' => $request->input('wwd_content')[$key] ?? '',
                ];
            }
            $content['wwd_image'] = $wwd_images;

            // Handle Supply Chain Partner Section
            $content['scp_content'] = $request->input('scp_content');

            // Handle Image 1
            if ($request->hasFile('scp_image1')) {
                if (!empty($content['scp_image1'])) {
                    Storage::delete($content['scp_image1']);
                }
                $content['scp_image1'] = $request->file('scp_image1')->store('assets/images', 'public');
            } else {
                $content['scp_image1'] = $request->input('existing_scp_image1') ?? $content['scp_image1'];
            }

            // Handle Image 2
            if ($request->hasFile('scp_image2')) {
                if (!empty($content['scp_image2'])) {
                    Storage::delete($content['scp_image2']);
                }
                $content['scp_image2'] = $request->file('scp_image2')->store('assets/images', 'public');
            } else {
                $content['scp_image2'] = $request->input('existing_scp_image2') ?? $content['scp_image2'];
            }

            // Handle Image 3
            if ($request->hasFile('scp_image3')) {
                if (!empty($content['scp_image3'])) {
                    Storage::delete($content['scp_image3']);
                }
                $content['scp_image3'] = $request->file('scp_image3')->store('assets/images', 'public');
            } else {
                $content['scp_image3'] = $request->input('existing_scp_image3') ?? $content['scp_image3'];
            }

            // Handle PDF 1
            if ($request->hasFile('scp_pdf1')) {
                if (!empty($content['scp_pdf1'])) {
                    Storage::delete($content['scp_pdf1']);
                }
                $content['scp_pdf1'] = $request->file('scp_pdf1')->store('assets/files', 'public');
            } else {
                $content['scp_pdf1'] = $request->input('existing_scp_pdf1') ?? $content['scp_pdf1'];
            }

            // Handle PDF 2
            if ($request->hasFile('scp_pdf2')) {
                if (!empty($content['scp_pdf2'])) {
                    Storage::delete($content['scp_pdf2']);
                }
                $content['scp_pdf2'] = $request->file('scp_pdf2')->store('assets/files', 'public');
            } else {
                $content['scp_pdf2'] = $request->input('existing_scp_pdf2') ?? $content['scp_pdf2'];
            }

            // Handle Text 1
            $content['scp_text1'] = $request->input('scp_text1');
            // Handle Text 2
            $content['scp_text2'] = $request->input('scp_text2');
            // Handle URL
            $content['scp_url'] = $request->input('scp_url');
            // Handle Text 3
            $content['scp_text3'] = $request->input('scp_text3');
            
            // Handle Code Of Conduct Section
            $cocs_description = $request->input('cocs_description') ?? $page->content['cocs_description'] ?? '';
            $content['cocs_description'] = $cocs_description;
        }
        if($page->id == '8'){
            $sections = [];
            if(isset($request->section_headings)){
            foreach ($request->section_headings as $key => $heading) {
                $sections[] = [
                    'heading' => $heading,
                    'description' => $request->section_description[$key] ?? null,
                    'subheading' => $request->section_subheadings[$key] ?? null,
                    'images' => $request->section_images[$key] ?? null,
                ];
            }
            }
            $content = json_encode($sections);
        }
        elseif($page->id == '9'){
            $sections = [];
            if(isset($request->section_description)){
            foreach ($request->section_description as $key => $heading) {
                $sections[] = [
                    'description' => $request->section_description[$key] ?? null,
                    'images' => $request->section_images[$key] ?? null,
                ];
            }
            }
            $content = json_encode($sections);
        }
        elseif($page->id == '10'){
            $sections = [];
            $sections2 = [];
            $sections['main_heading'] = $request->input('main_heading');
            $sections['main_subheading'] = $request->input('main_subheading');   
            if(isset($request->section_headings)){
            foreach ($request->section_headings as $key => $heading) {
                $sections2[] = [
                    'heading' => $heading,
                    'description' => $request->section_description[$key] ?? null,
                    'images' => $request->section_images[$key] ?? null,
                ];
            }
            }
            $sections['section2'] = $sections2 ;
            $content = json_encode($sections);
        }
        elseif($page->id == '11'){
            $sections = [];
            $sections2 = [];
            $sections['main_images'] = $request->input('main_image'); 
            if(isset($request->section_headings)){
            foreach ($request->section_headings as $key => $heading) {
                $sections2[] = [
                    'heading' => $heading,
                    'description' => $request->section_description[$key] ?? null,
                    'images' => $request->section_images[$key] ?? null,
                ];
            }
            }
            $sections['section2'] = $sections2 ;
            $content = json_encode($sections);
        }
        elseif($page->id == '12'){
            $sections = [];
            if(isset($request->section_description)){
            foreach ($request->section_description as $key => $heading) {
                $sections[] = [
                    'description' => $request->section_description[$key] ?? null,
                    'images' => $request->section_images[$key] ?? null,
                ];
            }
            }
            $content = json_encode($sections);
        }
        elseif($page->id == '13'){
            $sections = [];
            $sections2 = [];
            $sections['main_heading'] = $request->input('main_heading');  
            if(isset($request->section_description)){
            foreach ($request->section_description as $key => $heading) {
                $sections2[] = [
                    'description' => $request->section_description[$key] ?? null,
                    'images' => $request->section_images[$key] ?? null,
                ];
            }
            }
            $sections['section2'] = $sections2 ;
            $content = json_encode($sections);
        }
        elseif($page->id == '15'){
            $sections = [];
            if(isset($request->section_headings)){
            foreach ($request->section_headings as $key => $heading) {
                $sections[] = [
                    'heading' => $heading,
                    'images' => $request->section_images[$key] ?? null,
                ];
            }
            }
            $content = json_encode($sections);
        }
        elseif($page->type == 'custom_page'){
            $content = $request->content;
        }

            $page->title            = $request->title;
            $page->slug             = $slug;
            $page->is_active        = $request->is_active;
            $page->meta_title       = $request->meta_title;
            $page->meta_description = $request->meta_description;
            $page->content          = $content;
            $page->save();

            $response = [
                'status' => true,
                'notification' => 'Page updated successfully!',
            ];
    
            return response()->json($response);

            // Redirect back with success message
            // return redirect()->route('website.pages')->with('success', '');
        }

      flash(translate('Slug has been used already'))->warning();
      return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = Page::findOrFail($id);
        $page->page_translations()->delete();

        if(Page::destroy($id)){
            flash(translate('Page has been deleted successfully'))->success();
            return redirect()->back();
        }
        return back();
    }

    public function show_custom_page($slug){
        $page = Page::where('slug', $slug)->first();
        if($page != null){
            return view('frontend.custom_page', compact('page'));
        }
        abort(404);
    }
    public function mobile_custom_page($slug){
        $page = Page::where('slug', $slug)->first();
        if($page != null){
            return view('frontend.m_custom_page', compact('page'));
        }
        abort(404);
    }
}
