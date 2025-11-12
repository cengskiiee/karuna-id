<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Events\UserActivity;
use Illuminate\Http\Request;
use App\Models\ProjectsModel;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;


class ProjectsContentController extends Controller
{
    public function index(Request $request)
    {
        event(new UserActivity());

        $perPage = $request->get('per_page', 10);

        $sort = $request->get('sort', 'desc');
 
        $projects = ProjectsModel::orderBy('created_at', $sort)->paginate($perPage)->through(function ($item) {
            $item->formatted_date = Carbon::parse($item->project_date)
                ->locale('id')
                ->isoFormat('D MMMM YYYY');
            return $item;
        });

        return view('Dashboard.projects_content', compact('projects'))->with('title', 'Projects Content')->with('perPage', $perPage);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_project_name' => 'required|max:355',
            'id_description' => 'required',
            'en_project_name' => 'required|max:355',
            'en_description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'location_address' => 'required|max:250',
            'project_date' => 'nullable|date',
            'client_company' => 'required|max:250',
        ]);

        $projectsDate = $request->input('project_date', date('Y-m-d'));
        $imagePath = $request->file('image')->store('projectsImg', 'public');

        ProjectsModel::create([
            'id_project_name' => $request->input('id_project_name'),
            'id_description' => $request->input('id_description'),
            'en_project_name' => $request->input('en_project_name'),
            'en_description' => $request->input('en_description'),
            'image' => $imagePath,
            'location_address' => $request->input('location_address'),
            'project_date' => $request->input('project_date'),
            'client_company' => $request->input('client_company'),
        ]);

        return response()->json(['success' => 'Project created successfully']);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $slug)
    {
        $project = ProjectsModel::where('slug', $slug)->firstOrFail();

        $request->validate([
            'id_project_name' => 'required|max:355',
            'id_description' => 'required',
            'en_project_name' => 'required|max:355',
            'en_description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'location_address' => 'required|max:250',
            'project_date' => 'nullable|date',
            'client_company' => 'required|max:250',
        ]);

        $projectsDate = $request->input('project_date', $project->project_date ?? date('Y-m-d'));

        $data = $request->only(['id_project_name', 'id_description', 'en_project_name', 'en_description', 'location_address', 'client_company']);
        $data['project_date'] = $projectsDate;

        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $data['image'] = $request->file('image')->store('projectsImg', 'public');
        }

        $project->update($data);

        return response()->json(['success' => 'Project updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($slug)
    {
        //
        $project = ProjectsModel::where('slug', $slug)->firstOrFail();

        
        //delete image file
        if($project->image) {
            Storage::disk('public')->delete($project->image);
        }

        $project->delete();

        return response()->json(['success' => 'Project deleted successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        //
        $project = ProjectsModel::where('slug', $slug)->firstOrFail();

        return response()->json($project);
    }
}
