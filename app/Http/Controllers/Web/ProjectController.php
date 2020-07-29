<?php

namespace App\Http\Controllers\Web;

use App\Project;
use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->get();
        $categories = Category::all();

        return view('web.projects.index', compact('projects', 'categories'));
    }

    public function show(Project $project)
    {
        $arr = [];
        $id = $project->id;

        foreach ($project->categories as $category) {
            $arr[] = $category->id;
        }

        $projects = Project::whereHas('categories', function ($query) use ($arr, $id) {
            $query->where('project_id', '!=', $id)->whereIn('category_id', $arr);
        })->get()->take(2);

        return view('web.projects.show', compact('project', 'projects'));
    }
}
