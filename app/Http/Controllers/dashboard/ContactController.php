<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::paginate(10);
        return view('layouts.dashboard.contact.index', compact('contacts'));
    }
    public function create()
    {
        $contacts = Contact::all();
        return view('layouts.dashboard.contact.create', compact('contacts'));
    }
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phoneNumber = $request->input('phoneNumber');
        $contact->inquiry = $request->input('inquiry');
        $contact->reason = $request->input('reason');
        $contact->save();

        Mail::to('sadrul@neocongroup.com')->send(new ContactMail(
            $contact->name,
            $contact->email,
            $contact->phoneNumber,
            $contact->inquiry,
            $contact->reason,
        ));
        return redirect()->route('contact.index')->with('create', 'Contacts created successfully!');
    }
}