<?php

namespace App\Http\Controllers\Panel;

use App\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::first();

        return view('panel.about.index', compact('about'));
    }

    public function create()
    {
        if (About::count() == 0) {
            return view('panel.about.create');
        }

        return redirect()->route('panel.about.index')->with('warning', 'About us already exists');
    }

    public function store(Request $request)
    {
        if (About::count() == 0) {
            $data = $request->validate([
                'file' => 'required|image|max:1024',
                'desc' => 'required',
            ]);

            $data['filename'] = $this->fetchImage($data['file']);

            About::create($data);

            return redirect()->route('panel.about.index')->with('success', 'About us text created');
        }

        return redirect()->route('panel.about.index')->with('warning', 'About us already exists');
    }

    public function edit(About $about)
    {
        return view('panel.about.edit', compact('about'));
    }

    public function update(About $about, Request $request)
    {
        $data = $request->validate([
            'file' => 'image|max:1024',
            'desc' => 'required',
        ]);

        if ($request->file('file')) {
            $this->removeImagePath($about->filename);
            $data['filename'] = $this->fetchImage($data['file']);
        }

        $about->update($data);

        return redirect()->route('panel.about.index')->with('success', 'About us text updated');
    }

    public function destroy(About $about)
    {
        $this->removeImagePath($about->filename);
        $about->delete();

        return redirect()->route('panel.about.index')->with('danger', 'About us text deleted');
    }

    private function removeImagePath($image): void
    {
        $path = public_path('uploads/about/' . $image);

        if (is_file($path)) {
            unlink($path);
        }
    }

    private function fetchImage($img)
    {
        $filename = Str::random() . '.' . $img->extension();
        $img->move(public_path('uploads/about'), $filename);

        return $filename;
    }
}
