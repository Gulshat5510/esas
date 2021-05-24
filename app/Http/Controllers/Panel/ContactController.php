<?php

namespace App\Http\Controllers\Panel;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $phone = Contact::whereSlug('phone')->first();
        $email = Contact::whereSlug('email')->first();
        $address = Contact::whereSlug('address')->first();
        $instagram = Contact::whereSlug('instagram')->first();
        $behance = Contact::whereSlug('behance')->first();

        return view('panel.contact.index', compact('phone','address','instagram','behance','email'));
    }

    public function edit(Contact $contact, Request $request)
    {
        $is_create = false;
        if($request->has('is_create')){
            $is_create = true;
        }
        return view('panel.contact.edit', compact('contact', 'is_create'));
    }

     public function update(Contact $contact, Request $request)
    {
        $request->validate([
            'data' => 'required_without:address',
            'address.*' => 'required_without:data'
        ]);
        
        if($contact->slug == 'address') {
            $contact->address = $request->get('address');
        } else {
            $contact->data = $request->get('data');
        }
        
        $contact->save();

        return redirect()->route('panel.contact.index')->with('success', 'Habarlaşmak maglumaty üýtgedildi');
    }

    public function destroy(Contact $contact)
    {
     if($contact->slug == 'address') {
            $contact->address = null;
        } else {
            $contact->data = null;
        }
        
        $contact->save();

        return redirect()->route('panel.contact.index')->with('danger', 'Habarlaşmak maglumaty pozuldy');
    }
}
