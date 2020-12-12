<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Mail\ContactReceived;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactUs() {
        return view('contacts');
    }

    public function contactSave(Request $request) {
        $contact = new Contact();
        $contact->name = $request->input('name');
        $contact->email = $request->input('email');
        $contact->phone = $request->input('phone');
        $contact->description = $request->input('description');
        
        $contact->save();


        Mail::to('admin@presto.it')->send(new ContactReceived($contact));

        return redirect()->back()->with('message', 'Email inviata con successo!');

    }
}
