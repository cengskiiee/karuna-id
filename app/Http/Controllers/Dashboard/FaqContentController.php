<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Events\UserActivity;
use Illuminate\Http\Request;
use App\Models\FaqModel;


class FaqContentController extends Controller
{
    public function index(Request $request)
    {
        // $Faq = Faq::all(); 
        // dd($Faq);
        event(new UserActivity());

        $perPage = $request->get('per_page', 10);
        
        $sort = $request->get('sort', 'desc');

        $faqs = FaqModel::orderBy('created_at', $sort)->paginate($perPage);

        return view('Dashboard.faq_content', compact('faqs'))->with('title', 'Faq Content')->with('perPage', $perPage)->with('sort', $sort);


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'en_faq_question' => 'required',
            'en_faq_answer' => 'required',
            'id_faq_question' => 'required',
            'id_faq_answer' => 'required',
        ]);

        FaqModel::create($request->all());

        return response()->json(['success' => 'Faq created successfully']);
    }

    /** 
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'en_faq_question' => 'required',
            'en_faq_answer' => 'required',
            'id_faq_question' => 'required',
            'id_faq_answer' => 'required',
        ]);

        $faq = FaqModel::findOrFail($id);
        $faq->update($request->all());

        return response()->json(['success' => 'Faq updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $faq = FaqModel::findOrFail($id);
        $faq->delete();
        return response()->json(['success' => 'Faq deleted successfully']);
    }

    public function show($id)
    {
        $faq = FaqModel::findOrFail($id);
        return response()->json($faq);
    }
}
