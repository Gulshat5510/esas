<?php

namespace App\Http\Controllers\Web;

use App\About;
use App\Http\Controllers\Controller;
use App\Project;
use App\Text;
use Illuminate\Http\Request;
use App\Contact;
class WebController extends Controller
{
    public function index()
    {
        $projects = Project::whereIsSelected(true)->orderBy('order')->get();
        $text = Text::first();
        $count_projects = Project::count();
        if (count($projects) > 8) {
            $projects = $projects->take(8);
        }

        return view('web.index', compact('projects', 'text', 'count_projects'));
    }

    public function about()
    {
        $about = About::first();
        $address = Contact::whereSlug('address')->firstOrFail()->locale_data;
        
        return view('web.about', compact('about', 'address'));
    }
}
