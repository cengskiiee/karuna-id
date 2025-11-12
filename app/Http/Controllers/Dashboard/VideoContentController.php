<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Events\UserActivity;
use Illuminate\Http\Request;
use App\Models\VideoModel;
use Illuminate\Support\Facades\Storage;

class VideoContentController extends Controller
{
    public function index(Request $request)
    {
        event(new UserActivity());
        // $videos = VideoModel::all();
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort', 'desc'); 
        $videos = VideoModel::orderBy('created_at', $sort)->paginate($perPage);
        return view('Dashboard.video_content', compact('videos'))->with('title', 'Video Content')->with('perPage', $perPage)->with('sort', $sort);
    }

    /**
     * Store a newly created resource in storage.
     */ 
    public function store(Request $request)
    {
        $request->validate([
            'id_title' => 'required|max:355', 
            'en_title' => 'required|max:355', 
            'link_video' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $imagePath = $request->file('image')->store('videoBgImg', 'public');

        VideoModel::create([
            'id_title' => $request->input('id_title'),
            'en_title' => $request->input('en_title'),
            'link_video' => $request->input('link_video'),
            'image' => $imagePath,
        ]);

        return response()->json(['success' => 'Slider created successfully']);

    }


    
    /**
     * Remove the specified resource from storage.
     */
    public function update(Request $request, $slug)
    {
        $video = VideoModel::where('slug', $slug)->firstOrFail();


        $request->validate([
            'id_title' => 'required|max:355', 
            'en_title' => 'required|max:355', 
            'link_video' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = $request->only(['id_title', 'en_title', 'link_video']);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($video->image) {
                Storage::disk('public')->delete($video->image);
            } 
            // Store the new image
            $data['image'] = $request->file('image')->store('videoBgImg', 'public');
        }

        $video->update($data);

        return response()->json(['success' => 'Video updated successfully']);


    }



    /**
     * Remove the specified resource from storage.
     */ 
    public function destroy($slug)
    {

        $video = VideoModel::where('slug', $slug)->firstOrFail();


        if($video->image) {
            Storage::disk('public')->delete($video->image);
        }

        $video->delete();

        return response()->json(['success' => 'Video deleted successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $video = VideoModel::where('slug', $slug)->firstOrFail();


        return response()->json($video);

    }
}
