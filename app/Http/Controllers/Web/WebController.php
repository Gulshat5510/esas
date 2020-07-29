<?php

namespace App\Http\Controllers\Web;

use App\About;
use App\Http\Controllers\Controller;
use App\Project;
use App\Text;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        $text = Text::first();

        if (count($projects) > 8) {
            $projects = $projects->take(8);
        }

        return view('web.index', compact('projects', 'text'));
    }

    public function about()
    {
        $about = About::first();

        return view('web.about', compact('about'));
    }
}
