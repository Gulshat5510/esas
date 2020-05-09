<?php

namespace App\Http\Controllers\Panel;

use App\Image;
use App\Project;
use App\Category;
use App\ProjectCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::paginate(28);

        return view('panel.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = Category::all();

        return view('panel.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name.*' => 'required',
            'description.*' => 'required',
            'client' => 'required',
            'year' => 'required',
            'categories' => 'required|array|min:1',
            'images.*' => 'required|image|max:1000',
            'types.*' => 'required|in:wide,normal',
        ]);

        $project = Project::create($data);

        foreach ($request->file('images', []) as $key => $image) {
            Image::create([
                'project_id' => $project->id,
                'type' => $data['types'][$key],
                'filename' => $this->fetchImage($image),
                'order' => $key + 1,
            ]);
        }

        foreach ($data['categories'] as $category) {
            ProjectCategory::create([
                'project_id' => $project->id,
                'category_id' => $category,
            ]);
        }

        return redirect()->route('panel.projects.index')->with('success', 'Proýekt goşuldy');
    }

    public function show(Project $project)
    {
        return view('panel.projects.show', compact('project'));
    }

    public function edit(Project $project)
    {
        foreach ($project->categories as $category) {
            $arr[] = $category->id;
        }

        $categories = Category::all();

        return view('panel.projects.edit', compact('project', 'categories', 'arr'));
    }

    public function update(Project $project, Request $request)
    {
        $data = $request->validate([
            'name.*' => 'required',
            'description.*' => 'required',
            'client' => 'required',
            'year' => 'required',
            'categories.*' => 'required|exists:categories,id',
        ]);

        $project->update($data);
        $project->categories()->sync($data['categories']);

        return redirect()->route('panel.projects.index')->with('success', 'Proýekt üýtgedildi.');
    }

    public function destroy(Project $project)
    {
        foreach ($project->images as $image) {
            $this->removeImagePath($image->filename);
            $image->delete();
        }

        $project->categories()->detach();
        $project->delete();

        return redirect()->route('panel.projects.index')->with('danger', 'Proýekt pozuldy.');
    }


    private function fetchImage($img)
    {
        $filename = Str::random() . '.' . $img->extension();
        $img->move(public_path('uploads/projects'), $filename);

        return $filename;
    }

    private function removeImagePath($image): void
    {
        $path = public_path('uploads/projects/' . $image);

        if (is_file($path)) {
            unlink($path);
        }
    }
}
