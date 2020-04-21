<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        if (count($projects) > 8) {
            $projects = $projects->take(8);
        }

        return view('web.index', compact('projects'));
    }

    public function about()
    {
        return view('web.about');
    }
}
