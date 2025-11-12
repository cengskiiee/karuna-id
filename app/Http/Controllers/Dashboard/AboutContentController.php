<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Events\UserActivity;
use Illuminate\Http\Request;
use App\Models\AboutUsModel;
use App\Models\WhyUsModel;
use App\Models\HowItWorkModel;
use App\Models\YearExperiencesModel;
use Illuminate\Support\Facades\Storage;


class AboutContentController extends Controller
{
    public function index()
    {
        event(new UserActivity());
        $about_us = AboutUsModel::first();
        $why_us = WhyUsModel::first();
        $how_work = HowItWorkModel::first();
        $year_exp = YearExperiencesModel::first();
        return view('Dashboard.about_content', compact('about_us', 'why_us', 'how_work', 'year_exp'))->with('title', 'About Content');
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function updateAboutUs(Request $request)
    {
        $request->validate([
            'id_title' => 'required|max:355',
            'id_description' => 'required',
            'en_title' => 'required|max:355',
            'en_description' => 'required',
            'link_video' => 'required|max:355',
            'image_1' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'image_2' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'image_bg' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $about_us = AboutUsModel::first();

        $data = $request->only([
            'id_title',
            'id_description',
            'en_title',
            'en_description',
            'link_video',
        ]);

        // Handle image_1 upload
        if ($request->hasFile('image_1')) {
            if ($about_us->image_1) {
                Storage::disk('public')->delete($about_us->image_1);
            }
            $data['image_1'] = $request->file('image_1')->store('aboutContent', 'public');
        }

        // Handle image_2 upload
        if ($request->hasFile('image_2')) {
            if ($about_us->image_2) {
                Storage::disk('public')->delete($about_us->image_2);
            }
            $data['image_2'] = $request->file('image_2')->store('aboutContent', 'public');
        }

        // Handle image_bg upload
        if ($request->hasFile('image_bg')) {
            if ($about_us->image_bg) {
                Storage::disk('public')->delete($about_us->image_bg);
            }
            $data['image_bg'] = $request->file('image_bg')->store('aboutContent', 'public');
        }

        $about_us->update($data);

        return response()->json(['success' => 'About Us updated successfully']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateWhyUs(Request $request)
    {
        $request->validate([
            'id_title' => 'required|max:355',
            'id_description' => 'required',
            'en_title' => 'required|max:355',
            'en_description' => 'required',
            'image_why_1' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'image_why_2' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $why_us = WhyUsModel::first();

        $data = $request->only([
            'id_title',
            'id_description',
            'en_title',
            'en_description',
        ]);

        // Handle image_1 upload
        if ($request->hasFile('image_why_1')) {
            if ($why_us->image_why_1) {
                Storage::disk('public')->delete($why_us->image_why_1);
            }
            $data['image_why_1'] = $request->file('image_why_1')->store('whyUsContent', 'public');
        }

        // Handle image_2 upload
        if ($request->hasFile('image_why_2')) {
            if ($why_us->image_why_2) {
                Storage::disk('public')->delete($why_us->image_why_2);
            }
            $data['image_why_2'] = $request->file('image_why_2')->store('whyUsContent', 'public');
        }


        $why_us->update($data);

        return response()->json(['success' => 'Why Choose Us updated successfully']);
    }

    public function updateHowItWork(Request $request)
{
    $request->validate([
        'id_title' => 'required|max:355',
        'id_description' => 'required',
        'en_title' => 'required|max:355',
        'en_description' => 'required',
    ]);

    $how_work = HowItWorkModel::first();

    $data = $request->only([
        'id_title',
        'id_description',
        'en_title',
        'en_description',
    ]);

    $how_work->update($data);

    return response()->json(['success' => 'How It Works updated successfully']);
}

public function updateYearExperiences(Request $request)
{
    $request->validate([
        'years_experience' => 'required|integer',
        'projects_completed' => 'required|integer',
        'satisfied_client' => 'required|integer',
        'total_rating' => 'required|numeric|between:0,5',
    ]);

    $year_exp = YearExperiencesModel::first();

    $data = $request->only([
        'years_experience',
        'projects_completed',
        'satisfied_client',
        'total_rating',
    ]);

    $year_exp->update($data);

    return response()->json(['success' => 'Year Experiences updated successfully']);
}

}
