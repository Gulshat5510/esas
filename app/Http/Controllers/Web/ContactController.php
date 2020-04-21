<?php

namespace App\Http\Controllers\Web;

use App\Contact;
use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index()
    {
        return view('web.contact');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
           'name' => 'required',
           'phone' => 'required',
           'email' => 'required|email',
           'file' => 'max:5120',
           'msg' => 'required',
        ]);

        $data['link'] = false;

        if ($request->hasFile('file')) {
            $filename = Str::random() . '.' . $data['file']->extension();
            $data['file']->move(public_path('uploads/contact'), $filename);

            $data['link'] = asset('uploads/contact/' . $filename);
            $data['filename'] = $filename;
        }

        Contact::create($data);

        try {
            Mail::to('suhrab22@gmail.com')->send(new ContactMail($data['name'], $data['phone'], $data['email'], $data['link'], $data['msg']));

            Contact::create($data);

            return back()->with('success', 'Mail successfully sent');
        } catch (\Exception $e) {
            return $e->getMessage();
            return back()->with('error', 'Ops, please check your internet connection')->withInput();
        }
    }

}
