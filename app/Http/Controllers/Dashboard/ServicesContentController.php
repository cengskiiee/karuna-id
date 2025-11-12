<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Events\UserActivity;
use Illuminate\Http\Request;
use App\Models\ServicesModel;
use App\Models\ServiceCategoryModel;
use Illuminate\Support\Facades\Storage;

class ServicesContentController extends Controller
{
    public function index(Request $request)
    {
        event(new UserActivity()); 
        $perPage = $request->get('per_page', 10);
        $sort = $request->get('sort', 'desc'); 
        $services = ServicesModel::with('category')->orderBy('created_at', $sort)->paginate($perPage);
        $categories = ServiceCategoryModel::all();
        return view('Dashboard.services_content', compact('services', 'categories'))->with('title', 'Services Content')->with('perPage', $perPage)->with('sort', $sort);
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_title' => 'required|max:355',
            'id_description' => 'required',
            'en_title' => 'required|max:355',
            'en_description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:5120',
            'service_category_id' => 'required|exists:tb_services_category,id',
        ]);

        $imagePath = $request->file('image')->store('servicesImg', 'public');

        ServicesModel::create([
            'id_title' => $request->input('id_title'),
            'id_description' => $request->input('id_description'),
            'en_title' => $request->input('en_title'),
            'en_description' => $request->input('en_description'),
            'image' => $imagePath,
            'service_category_id' => $request->input('service_category_id'),
        ]);

        return response()->json(['success' => 'Service created successfully']);
    }

    public function update(Request $request, $slug)
    {
        $service = ServicesModel::where('slug', $slug)->firstOrFail();

        $request->validate([
            'id_title' => 'required|max:355',
            'id_description' => 'required',
            'en_title' => 'required|max:355',
            'en_description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
            'service_category_id' => 'required|exists:tb_services_category,id',
        ]);

        $data = $request->only(['id_title', 'id_description', 'en_title', 'en_description', 'service_category_id']);

        if ($request->hasFile('image')) {
            if ($service->image) {
                Storage::disk('public')->delete($service->image);
            }
            $data['image'] = $request->file('image')->store('servicesImg', 'public');
        }

        $service->update($data);

        return response()->json(['success' => 'Service updated successfully']);
    }

    public function destroy($slug)
    {
        $service = ServicesModel::where('slug', $slug)->firstOrFail();


        if ($service->image) {
            Storage::disk('public')->delete($service->image);
        }

        $service->delete();

        return response()->json(['success' => 'Service deleted successfully']);
    }

    public function show($slug)
    {
        $service = ServicesModel::with('category')->where('slug', $slug)->firstOrFail();

        return response()->json($service);
    }
}