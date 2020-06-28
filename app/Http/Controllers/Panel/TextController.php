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
        return view('panel.texts.edit', compact('text'));
    }

    public function update(Request $request, Text $text)
    {
        $request->validate(['description.*' => 'required']);

        $text->update($request->all());

        return redirect()->route('panel.index')->with('success', 'Baş sahypa teksti üýtgedildi');
    }

    public function destroy(Text $text)
    {
        $text->delete();

        return redirect()->route('panel.index')->with('danger', 'Baş sahypa teksti pozuldy');
    }
}
