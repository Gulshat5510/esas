<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Text;
use Illuminate\Http\Request;

class TextController extends Controller
{
    public function create()
    {
        if (Text::count()) {
            return back()->with('waring', 'Already exists');
        }

        return view('panel.texts.create');
    }

    public function store(Request $request)
    {
        $request->validate(['description.*' => 'required']);

        Text::create($request->all());

        return redirect()->route('panel.index')->with('success', 'Baş sahypa teksti goşuldy');
    }

    public function edit(Text $text)
    {
        return view('panel.texts.edit', $text);
    }
}
