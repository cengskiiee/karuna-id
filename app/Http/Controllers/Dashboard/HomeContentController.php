<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Events\UserActivity;
use Illuminate\Http\Request;
use App\Models\HomeContentSliderModel;
use Illuminate\Support\Facades\Storage;

class HomeContentController extends Controller
{
    public function index()
    {
        event(new UserActivity());
        $sliders = HomeContentSliderModel::all();
        return view('Dashboard.home_content', compact('sliders'))->with('title', 'Home Content Slider');
 
    } 


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'id_title' => 'required|max:155',
            'id_description' => 'required|max:355',
            'en_title' => 'required|max:155',
            'en_description' => 'required|max:355',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        $imagePath = $request->file('image')->store('homeSlider', 'public');

        HomeContentSliderModel::create([
            'id_title' => $request->input('id_title'),
            'id_description' => $request->input('id_description'),
            'en_title' => $request->input('en_title'),
            'en_description' => $request->input('en_description'),
            'image' => $imagePath
        ]);

        return response()->json(['success' => 'Slider created successfully']);


    }


    /**
     * Update the specified resource in storage. 
     */
    public function update(Request $request,  $id)
    {
        $slider = HomeContentSliderModel::findOrFail($id);

        $request->validate([
            'id_title' => 'required|max:155',
            'id_description' => 'required|max:355',
            'en_title' => 'required|max:155',
            'en_description' => 'required|max:355',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120'
        ]);

        $data = $request->only([ 'id_title', 'id_description', 'en_title', 'en_description']);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($slider->image) {
                Storage::disk('public')->delete($slider->image);
            }
            // Store the new image
            $data['image'] = $request->file('image')->store('homeSlider', 'public');
        }

        $slider->update($data);

        return response()->json(['success' => 'Slider updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //
        $slider = HomeContentSliderModel::findOrFail($id);

        // Delete the image file
        if ($slider->image) {
            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return response()->json(['success' => 'Slider deleted successfully']);

    }

      /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        //
        $slider = HomeContentSliderModel::findOrFail($id);
        return response()->json($slider);
    }
    

}

