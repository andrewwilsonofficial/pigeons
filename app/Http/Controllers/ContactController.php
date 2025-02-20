<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('contacts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'nullable',
            'street' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'country' => 'nullable',
            'postal_code' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'website' => 'nullable',
            'relationship' => 'nullable',
            'notes' => 'nullable',
        ]);

        Contact::create($request->all());

        return redirect()->route('contacts')->with('success', __('Contact created successfully.'));
    }

    public function edit(Contact $contact)
    {
        return view('contacts.edit', compact('contact'));
    }

    public function update(Request $request, Contact $contact)
    {
        $request->validate([
            'first_name' => 'required',
            'middle_name' => 'nullable',
            'last_name' => 'nullable',
            'street' => 'nullable',
            'city' => 'nullable',
            'state' => 'nullable',
            'country' => 'nullable',
            'postal_code' => 'nullable',
            'phone' => 'nullable',
            'email' => 'nullable|email',
            'website' => 'nullable',
            'relationship' => 'nullable',
            'notes' => 'nullable',
        ]);

        $contact->update($request->all());

        return redirect()->route('contacts')->with('success', __('Contact updated successfully.'));
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();

        return redirect()->route('contacts')->with('success', __('Contact deleted successfully.'));
    }
}
