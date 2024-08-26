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
        return view('backend.website_settings.pages.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $page = new Page;
        $page->title = $request->title;
        if (Page::where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {
            $page->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            $page->type = "custom_page";
            $page->content = $request->content;
            $page->meta_title = $request->meta_title;
            $page->meta_description = $request->meta_description;
            $page->save();

            $response = [
                'status' => true,
                'notification' => 'Page Created successfully!',
            ];

            return response()->json($response);
        }
        $response = [
            'status' => false,
            'notification' => 'Slug has been used already',
        ];

        return response()->json($response);

        // Flash warning message using session
        // session()->flash('warning', __('Slug has been used already'));
        // return back();
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
                return view('backend.website_settings.pages.home_page_edit', compact('page', 'products', 'post_categories', 'product_categories'));
            } elseif ($page->type == 'about_us') {
                return view('backend.website_settings.pages.about_page_edit', compact('page', 'products', 'post_categories', 'product_categories'));
            } elseif ($page->type == 'partner_with_us') {
                return view('backend.website_settings.pages.partner_with_us_page_edit', compact('page', 'products', 'post_categories', 'product_categories'));
            } else {
                return view('backend.website_settings.pages.edit', compact('page'));
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
        if (Page::where('id', '!=', $id)->where('slug', preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug)))->first() == null) {
            if ($page->type == 'custom_page') {
                $page->slug = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $request->slug));
            }

            if ($page->type == 'home_page') {
                $validator = Validator::make($request->all(), [
                    'title' => 'required|max:155',
                    'slug' => 'required',
                    'is_active' => 'required|boolean',
                    'banner.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'banner_text' => 'required|max:155',
                    'banner_button' => 'required|max:155',
                    'banner_url' => 'required|max:155',
                    'product_ids' => 'required|array',
                    'product_ids.*' => 'exists:products,id',
                    'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'about_content' => 'required',
                    'product_category_id' => 'required|array',
                    'product_category_id.*' => 'exists:product_categories,id',
                    'wwd_image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'wwd_content.*' => 'required',
                    'wwd_text.*' => 'required',
                    'activities_text.*' => 'required',
                    'activities_url.*' => 'required',
                    'scp_url' => 'required',
                    'scp_text1' => 'required|max:155',
                    'scp_text2' => 'required|max:155',
                    'scp_text3' => 'required|max:155',
                    'scp_image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'scp_image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'scp_image3' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'scp_pdf1' => 'nullable|file|mimes:pdf|max:2048',
                    'scp_pdf2' => 'nullable|file|mimes:pdf|max:2048',
                    'cocs_description' => 'required',
                    'meta_title' => 'required|max:255',
                    'meta_description' => 'required|max:255',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'notification' => $validator->errors()->all()
                    ], 200);
                }

                if (!empty($request->input('slug'))) {
                    $slug = customSlug($request->input('slug'));
                }

                // Initialize content array
                $content = [
                    'product_ids' => implode(',', $request->input('product_ids')),
                    'product_category_id' => implode(',', $request->input('product_category_id')),
                    // 'post_category_id' => implode(',', $request->input('post_category_id')),
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
                } else {
                    // Retain the existing image
                    $content['about_image'] = $request->input('existing_about_image') ?? $content['about_image'];
                }


                // Handle Banner Images
                $banners = [];
                $banner_texts = $request->input('banner_text', []);
                $banner_buttons = $request->input('banner_button', []);
                $banner_urls = $request->input('banner_url', []);
                $existing_banner_images = $request->input('existing_banner_image', []);

                foreach ($banner_texts as $key => $text) {
                    // Check if a new file was uploaded for this banner
                    if ($request->hasFile("banner.$key")) {
                        $path = $request->file("banner.$key")->store('assets/images', 'public');
                    } else {
                        // Retain the existing image
                        $path = $existing_banner_images[$key] ?? null;
                    }

                    // Add to the banners array if either the image path or text is present
                    if (!empty($path) || !empty($text)) {
                        $banners[] = [
                            'image' => $path,
                            'text' => $text,
                            'button' => $banner_buttons[$key] ?? '',
                            'url' => $banner_urls[$key] ?? '',
                        ];
                    }
                }

                // Save banners array to the database or use it as needed
                $content['banner'] = array_filter($banners, function ($banner) {
                    return !empty(array_filter($banner));
                });

                // Handle Activities
                $activities = [];
                $activities_texts = $request->input('activities_text', []);
                $activities_urls = $request->input('activities_url', []);

                foreach ($activities_texts as $key => $text) {
                    $url = $activities_urls[$key] ?? null;

                    // Add to the activities array if either the text or URL is present
                    if (!empty($text) || !empty($url)) {
                        $activities[] = [
                            'url' => $url,
                            'text' => $text,
                        ];
                    }
                }

                // Save activities array to the database or use it as needed
                $content['activities'] = array_filter($activities, function ($activity) {
                    return !empty(array_filter($activity));
                });


                // Handle What We Do Section Images
                $wwd_images = [];
                $wwd_texts = $request->input('wwd_text', []);
                $wwd_contents = $request->input('wwd_content', []);
                $existing_images = $request->input('existing_wwd_image', []);

                foreach ($wwd_texts as $key => $text) {
                    // Check if a new file was uploaded for this image
                    if ($request->hasFile("wwd_image.$key")) {
                        $path = $request->file("wwd_image.$key")->store('assets/images', 'public');
                    } else {
                        // Retain the existing image
                        $path = $existing_images[$key] ?? null;
                    }

                    // Only add to the array if there is either an image or text
                    if (!empty($path) || !empty($text)) {
                        $wwd_images[] = [
                            'image' => $path,
                            'text' => $text,
                            'content' => $wwd_contents[$key] ?? '',
                        ];
                    }
                }

                // Remove empty entries
                $wwd_images = array_filter($wwd_images, function ($wwd) {
                    return !empty(array_filter($wwd));
                });

                // Store in content array
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

                // Handle PDF 2
                if ($request->hasFile('cocs_pdf')) {
                    if (!empty($content['cocs_pdf'])) {
                        Storage::delete($content['cocs_pdf']);
                    }
                    $content['cocs_pdf'] = $request->file('cocs_pdf')->store('assets/files', 'public');
                } else {
                    $content['cocs_pdf'] = $request->input('existing_cocs_pdf') ?? $content['cocs_pdf'];
                }

            }
            if ($page->type == 'about_us') {
                $validator = Validator::make($request->all(), [
                    'title' => 'required|max:155',
                    'slug' => 'required',
                    'is_active' => 'required|boolean',
                    'about_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'core_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'policy_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'about_content' => 'required',
                    'core_content' => 'required',
                    'policy_content' => 'required',
                    'about2_content1' => 'required',
                    'about2_content2' => 'required',
                    'mnv_description1' => 'required',
                    'mnv_description2' => 'required',
                    'team_image.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'mnv_image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'mnv_image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'about2_image1' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'about2_image2' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
                    'meta_title' => 'required|max:255',
                    'meta_description' => 'required|max:255',

                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'notification' => $validator->errors()->all()
                    ], 200);
                }

                if (!empty($request->input('slug'))) {
                    $slug = customSlug($request->input('slug'));
                }

                // Initialize content array
                $content = [
                    'about_content' => $request->input('about_content'),
                    'core_content' => $request->input('core_content'),
                    'policy_content' => $request->input('policy_content'),
                    'about2_content1' => $request->input('about2_content1'),
                    'about2_content2' => $request->input('about2_content2'),
                    'mnv_description1' => $request->input('mnv_description1'),
                    'mnv_description2' => $request->input('mnv_description2'),
                ];

                // Handle About Image Upload
                if ($request->hasFile('about_image')) {
                    if ($page->content['about_image'] ?? false) {
                        Storage::delete($page->content['about_image']);
                    }
                    $content['about_image'] = $request->file('about_image')->store('assets/images', 'public');
                } else {
                    // Retain the existing image
                    $content['about_image'] = $request->input('existing_about_image') ?? $content['about_image'];
                }

                // Handle Core Image Upload
                if ($request->hasFile('core_image')) {
                    if ($page->content['core_image'] ?? false) {
                        Storage::delete($page->content['core_image']);
                    }
                    $content['core_image'] = $request->file('core_image')->store('assets/images', 'public');
                } else {
                    // Retain the existing image
                    $content['core_image'] = $request->input('existing_core_image') ?? $content['core_image'];
                }

                // Handle Policy Image Upload
                if ($request->hasFile('policy_image')) {
                    if ($page->content['policy_image'] ?? false) {
                        Storage::delete($page->content['policy_image']);
                    }
                    $content['policy_image'] = $request->file('policy_image')->store('assets/images', 'public');
                } else {
                    // Retain the existing image
                    $content['policy_image'] = $request->input('existing_policy_image') ?? $content['policy_image'];
                }

                // Handle Mission and vision Upload
                if ($request->hasFile('mnv_image1')) {
                    if ($page->content['mnv_image1'] ?? false) {
                        Storage::delete($page->content['mnv_image1']);
                    }
                    $content['mnv_image1'] = $request->file('mnv_image1')->store('assets/images', 'public');
                } else {
                    // Retain the existing image
                    $content['mnv_image1'] = $request->input('existing_mnv_image1') ?? $content['mnv_image1'];
                }
                if ($request->hasFile('mnv_image2')) {
                    if ($page->content['mnv_image2'] ?? false) {
                        Storage::delete($page->content['mnv_image2']);
                    }
                    $content['mnv_image2'] = $request->file('mnv_image2')->store('assets/images', 'public');
                } else {
                    // Retain the existing image
                    $content['mnv_image2'] = $request->input('existing_mnv_image2') ?? $content['mnv_image2'];
                }
                if ($request->hasFile('mnv_bg_image1')) {
                    if ($page->content['mnv_bg_image1'] ?? false) {
                        Storage::delete($page->content['mnv_bg_image1']);
                    }
                    $content['mnv_bg_image1'] = $request->file('mnv_bg_image1')->store('assets/images', 'public');
                } else {
                    // Retain the existing image
                    $content['mnv_bg_image1'] = $request->input('existing_mnv_bg_image1') ?? $content['mnv_bg_image1'];
                }
                if ($request->hasFile('mnv_bg_image2')) {
                    if ($page->content['mnv_bg_image2'] ?? false) {
                        Storage::delete($page->content['mnv_bg_image2']);
                    }
                    $content['mnv_bg_image2'] = $request->file('mnv_bg_image2')->store('assets/images', 'public');
                } else {
                    // Retain the existing image
                    $content['mnv_bg_image2'] = $request->input('existing_mnv_bg_image2') ?? $content['mnv_bg_image2'];
                }


                // Handle Team Section
                $teams = [];
                foreach ($request->input('team_name', []) as $key => $text) {
                    // Check if a new file was uploaded for this team
                    if ($request->hasFile("team_image.$key")) {
                        $path = $request->file("team_image.$key")->store('assets/images', 'public');
                    } else {
                        // Retain the existing image
                        $path = $request->input('existing_team_image')[$key] ?? null;
                    }

                    $teams[] = [
                        'image' => $path,
                        'name' => $text,
                        'description' => $request->input('team_description')[$key] ?? '',
                    ];
                }
                // Save teams array to the database or use it as needed
                $content['team'] = $teams;



                // Handle About2 section Image 1
                if ($request->hasFile('about2_image1')) {
                    if (!empty($content['about2_image1'])) {
                        Storage::delete($content['about2_image1']);
                    }
                    $content['about2_image1'] = $request->file('about2_image1')->store('assets/images', 'public');
                } else {
                    $content['about2_image1'] = $request->input('existing_about2_image1') ?? $content['about2_image1'];
                }

                // Handle About2 section Image 2
                if ($request->hasFile('about2_image2')) {
                    if (!empty($content['about2_image2'])) {
                        Storage::delete($content['about2_image2']);
                    }
                    $content['about2_image2'] = $request->file('about2_image2')->store('assets/images', 'public');
                } else {
                    $content['about2_image2'] = $request->input('existing_about2_image2') ?? $content['about2_image2'];
                }


            } elseif ($page->type == 'partner_with_us') {
                $validator = Validator::make($request->all(), [
                    'title' => 'required|max:155',
                    'slug' => 'required',
                    'is_active' => 'required|boolean',
                    'about_content' => 'required',
                    'question' => 'required|max:255',
                    'answer' => 'required',
                    'meta_title' => 'required|max:255',
                    'meta_description' => 'required|max:255',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'notification' => $validator->errors()->all()
                    ], 200);
                }

                if (!empty($request->input('slug'))) {
                    $slug = customSlug($request->input('slug'));
                }

                // Initialize content array
                $content = [
                    'about_content' => $request->input('about_content'),
                ];

                // Handle FAQ's Section
                $faqs = [];
                foreach ($request->input('question', []) as $key => $question) {
                    $faqs[] = [
                        'question' => $question,
                        'answer' => $request->input('answer', [])[$key] ?? '', // Use 'answer' instead of 'team_description'
                    ];
                }
                // Save faqs array to the database or use it as needed
                $content['faqs'] = $faqs;

            } elseif ($page->type == 'custom_page') {
                $validator = Validator::make($request->all(), [
                    'title' => 'required|max:155',
                    'slug' => 'required',
                    'is_active' => 'required|boolean',
                    'content' => 'required',
                    'meta_title' => 'required|max:255',
                    'meta_description' => 'required|max:255',
                ]);

                if ($validator->fails()) {
                    return response()->json([
                        'status' => false,
                        'notification' => $validator->errors()->all()
                    ], 200);
                }

                if (!empty($request->input('slug'))) {
                    $slug = customSlug($request->input('slug'));
                }

                $content = $request->content;
            }

            $page->title = $request->title;
            $page->slug = $slug;
            $page->is_active = $request->is_active;
            $page->meta_title = $request->meta_title;
            $page->meta_description = $request->meta_description;
            $page->content = $content;
            $page->save();

            $response = [
                'status' => true,
                'notification' => 'Page updated successfully!',
            ];

            return response()->json($response);

            // Redirect back with success message
            // return redirect()->route('website.pages')->with('success', '');
        }
        $response = [
            'status' => false,
            'notification' => 'Slug has been used already',
        ];

        return response()->json($response);

        //   flash(__('Slug has been used already'))->warning();
        //   return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        if (!$page) {
            $response = [
                'status' => false,
                'notification' => 'Record not found.!',
            ];
            return response()->json($response);
        }
        $page->delete();

        $response = [
            'status' => true,
            'notification' => 'Page Deleted successfully!',
        ];

        return response()->json($response);
    }

    public function show_custom_page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if ($page != null) {
            return view('frontend.custom_page', compact('page'));
        }
        abort(404);
    }
    public function mobile_custom_page($slug)
    {
        $page = Page::where('slug', $slug)->first();
        if ($page != null) {
            return view('frontend.m_custom_page', compact('page'));
        }
        abort(404);
    }
}
