<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Events\UserActivity;
use Illuminate\Http\Request;
use App\Models\ActivitiesModel;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;
 

class ActivitiesController extends Controller
{
    public function index(Request $request)
    {
        event(new UserActivity()); 
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort', 'desc'); 
        $activities = ActivitiesModel::orderBy('date', $sort)->paginate($perPage)->through(function ($item) {
            $item->formatted_date = Carbon::parse($item->date)
                ->locale('id')
                ->isoFormat('D MMMM YYYY');
            return $item;
        });
        return view('Dashboard.activities_content', compact('activities'))->with('title', 'Activities Content')->with('perPage', $perPage)->with('sort', $sort);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_title' => 'required|max:355',
            'id_description' => 'required',
            'en_title' => 'required|max:355',
            'en_description' => 'required',
            'date' => 'nullable|date',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $date = $request->input('date', date('Y-m-d'));
        $imagePath = $request->file('image')->store('activityImg', 'public');

        $activity = ActivitiesModel::create([
            'id_title' => $request->input('id_title'),
            'id_description' => $request->input('id_description'),
            'en_title' => $request->input('en_title'),
            'en_description' => $request->input('en_description'),
            'date' => $date,
            'image' => $imagePath,
        ]);

        return response()->json(['success' => 'Activities content created successfully', 'slug' => $activity->slug]);
    }

    public function update(Request $request, $slug)
    {
        $activities = ActivitiesModel::where('slug', $slug)->firstOrFail();

        $request->validate([
            'id_title' => 'required|max:355',
            'id_description' => 'required',
            'en_title' => 'required|max:355',
            'en_description' => 'required',
            'date' => 'nullable|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        $date = $request->input('date', date('Y-m-d'));
        $data = $request->only(['id_title', 'id_description', 'en_title', 'en_description']);
        $data['date'] = $date;

        if ($request->hasFile('image')) {
            if ($activities->image) {
                Storage::disk('public')->delete($activities->image);
            }
            $data['image'] = $request->file('image')->store('activityImg', 'public');
        }

        $activities->update($data);

        return response()->json(['success' => 'Activities content updated successfully', 'slug' => $activities->slug]);
    }

    public function destroy($slug)
    {
        $activities = ActivitiesModel::where('slug', $slug)->firstOrFail();

        if ($activities->image) {
            Storage::disk('public')->delete($activities->image);
        }

        $activities->delete();

        return response()->json(['success' => 'Activities content deleted successfully']);
    }

    public function show($slug)
    {
        $activities = ActivitiesModel::where('slug', $slug)->firstOrFail();
        return response()->json($activities);
    }
}