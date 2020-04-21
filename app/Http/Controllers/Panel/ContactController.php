<?php

namespace App\Http\Controllers\Panel;

use App\Contact;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $mails = Contact::orderBy('read')->paginate(30);

        return view('panel.contact.index', compact('mails'));
    }

    public function show(Contact $contact)
    {
        $contact->read = true;
        $contact->save();

        return view('panel.contact.show', compact('contact'));
    }

    public function destroy(Contact $contact)
    {
        if ($contact->filename) {
            $path = public_path('uploads/contact/' . $contact->filename);

            if (is_file($path)) {
                unlink($path);
            }
        }

        $contact->delete();

        return redirect()->route('panel.contact.index')->with('danger', 'Hat pozuldy');
    }
}
