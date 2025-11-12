<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Events\UserActivity;
use App\Models\ProfileTeamModel;
use Illuminate\Support\Facades\Storage;

class ProfileTeamController extends Controller
{
    //
    public function index()
    {
        event(new UserActivity());

        $profiles = ProfileTeamModel::all();

        return view('Dashboard.profile_team', compact('profiles'))->with('title','Profile Team');
    }

     
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'email' => 'required|email|max:255',
            'linkedin' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $imagePath = $request->file('image')->store('profileTeamImg', 'public');

        ProfileTeamModel::create([
            'name' => $request->input('name'),
            'position' => $request->input('position'),
            'email' => $request->input('email'),
            'linkedin' => $request->input('linkedin'),
            'image' => $imagePath,
        ]);

        return response()->json(['success' => 'Profile created successfully']);

    }


    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
        $profile = ProfileTeamModel::findOrFail($id); 

        $request->validate([
            'name' => 'required|max:255',
            'position' => 'required|max:255',
            'email' => 'required|email|max:255',
            'linkedin' => 'required|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $data = $request->only(['name', 'position', 'email', 'linkedin' ]);

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($profile->image) {
                Storage::disk('public')->delete($profile->image);
            } 
            // Store the new image
            $data['image'] = $request->file('image')->store('profileTeamImg', 'public');
        }

        $profile->update($data);

        return response()->json(['success' => 'Profile updated successfully']);

    }

    /**
     * Remove the specified resource from storage. 
     */
    public function destroy($id)
    {
        $profile = ProfileTeamModel::findOrFail($id);

        if($profile->image) {
            Storage::disk('public')->delete($profile->image);
        }

        $profile->delete();

        return response()->json(['success' => 'Profile deleted successfully']);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $profile = ProfileTeamModel::findOrFail($id);
        return response()->json($profile);


    }
}
