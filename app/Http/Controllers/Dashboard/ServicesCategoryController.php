<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Events\UserActivity;
use Illuminate\Http\Request;
use App\Models\ServiceCategoryModel;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Log;



class ServicesCategoryController extends Controller
{
    public function index(Request $request)
    { 
        // $ServiceCategoryModel = ServiceCategoryModel::all();
        // dd($ServiceCategoryModel);
        
        event(new UserActivity());
        // $perPage = $request->get('per_page', 5);

        $categories = ServiceCategoryModel::all();
        return view('Dashboard.services_category', compact('categories'))->with('title', 'Services Category');

    }

    public function store(Request $request) 
    {


        $request->validate([
            'en_service_category_title' => 'required|max:355',
            'en_description' => 'required',
            'id_service_category_title' => 'required|max:355',
            'id_description' => 'required',
        ]);

        ServiceCategoryModel::create($request->all());

        return response()->json(['success' => 'Service Category created successfully']);


    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'en_service_category_title' => 'required|max:355',
            'en_description' => 'required',
            'id_service_category_title' => 'required|max:355',
            'id_description' => 'required',
        ]);

        $category = ServiceCategoryModel::findOrFail($id);
        $category->update($request->all());

        return response()->json(['success' => 'Service Category updated successfully']);

    }

    public function destroy($id)
    {
        $category = ServiceCategoryModel::findOrFail($id);
        $category->delete();
        return response()->json(['success' => 'Category deleted successfully']);
    }

    public function show($id)
    {
        $category = ServiceCategoryModel::findOrFail($id);
        return response()->json($category);
    }
}
