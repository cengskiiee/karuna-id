<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Events\UserActivity;
use Illuminate\Http\Request;
use App\Models\ContactModel;



class ContactContentController extends Controller
{
    //
    public function index()
    {
        event(new UserActivity());
        $contact = ContactModel::first();
        return view('Dashboard.contact_content', compact('contact'))->with('title', 'Contact Content');

    }


   

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        // 
        $request->validate([
            'city' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'location_detail' => 'required|string',
            'email' => 'required|email|max:255',
            'contact_number' => 'required|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'youtube' => 'nullable|string|max:255',
        ]);

        $contact = ContactModel::first(); 
        $contact->update($request->all());
        return response()->json(['success' => 'Contact updated successfully']);
    }

   
}
