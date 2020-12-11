<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

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

        

        Mail::to('dentistatonino@dentista.com')->send(new ContactReceived($contact));

        dd('Email Inviata!');

    }
}
