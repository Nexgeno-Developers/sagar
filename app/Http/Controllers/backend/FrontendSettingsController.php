<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\FrontendSetting;
use Illuminate\Http\Request;

class FrontendSettingsController extends Controller
{
    public function index()
    {
        $settings = FrontendSetting::all();
        return view('backend.pages.frontend_settings.index', compact('settings'));
    }

    public function create()
    {
        return view('backend.pages.frontend_settings.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'newsletter_pdf' => 'nullable|file|mimes:pdf',
            'contacts' => 'required|array',
            'social_media' => 'required|array',
        ]);

        $settings = new FrontendSetting();
        $settings->logo = $request->file('logo')->store('logos');
        $settings->meta_title = $request->meta_title;
        $settings->meta_description = $request->meta_description;

        if ($request->hasFile('newsletter_pdf')) {
            $settings->newsletter_pdf = $request->file('newsletter_pdf')->store('pdfs');
        }

        $settings->contacts = json_encode($request->contacts);
        $settings->social_media = json_encode($request->social_media);
        $settings->save();

        return redirect()->route('frontend-settings.index')->with('success', 'Settings created successfully.');
    }

    public function edit(FrontendSetting $frontendSetting)
    {
        return view('backend.pages.frontend_settings.edit', compact('frontendSetting'));
    }

    public function update(Request $request, FrontendSetting $frontendSetting)
    {
        $request->validate([
            'logo' => 'nullable|image',
            'meta_title' => 'required|string',
            'meta_description' => 'required|string',
            'newsletter_pdf' => 'nullable|file|mimes:pdf',
            'contacts' => 'required|array',
            'social_media' => 'required|array',
        ]);

        // Handle Image Upload
        if ($request->hasFile('logo')) {
            $frontendSetting->logo = $request->file('logo')->store('assets/images', 'public');
        } else {
            // Retain the existing image
            $frontendSetting->logo = $request->input('existing_logo') ?? $frontendSetting->logo;
        }

        $frontendSetting->meta_title = $request->meta_title;
        $frontendSetting->meta_description = $request->meta_description;


        // Handle PDF 
        if ($request->hasFile('newsletter_pdf')) {
            $frontendSetting->newsletter_pdf = $request->file('newsletter_pdf')->store('assets/files', 'public');
        } else {
            $frontendSetting->newsletter_pdf = $request->input('existing_newsletter_pdf') ?? $frontendSetting->newsletter_pdf;
        }

        $frontendSetting->contacts = json_encode($request->contacts);
        $frontendSetting->social_media = json_encode($request->social_media);
        $frontendSetting->save();

        return redirect()->route('frontend-settings.index')->with('success', 'Frontend Settings updated successfully.');
    }

    public function destroy(FrontendSetting $frontendSetting)
    {
        $frontendSetting->delete();
        return redirect()->route('frontend-settings.index')->with('success', 'Frontend Settings deleted successfully.');
    }
}