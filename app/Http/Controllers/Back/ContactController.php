<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $contacts = Contact::paginate(10);

        return view('back.contact.index', compact('contacts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|max_digits:30',
            'address' => 'required|string',
            'subject' => 'required|string',
            'message' => 'required'
        ]);

        Contact::create($validated);

        flash('Message Sent Successfully.')->success();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();

        flash('Contact Removed.')->success();

        return redirect()->route('cms.contacts.index');
    }
}
