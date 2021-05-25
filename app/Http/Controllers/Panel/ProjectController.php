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
        $projects = Project::paginate(20);
        $count_selected = Project::whereIsSelected(true)->count();

        return view('panel.projects.index', compact('projects','count_selected'));
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
            'file' => 'required|image|max:1000',
            'client' => 'nullable',
            'year' => 'nullable',
            'categories' => 'required|array|min:1',
            'images.*' => 'required|image|max:1000',
            'types.*' => 'required|in:wide,normal',
            'is_selected' => 'nullable'
        ]);

        $data['cover'] = $this->fetchImage($data['file']);

        if (Project::whereIsSelected(true)->count() >= 6) {
            $selected_project = Project::whereIsSelected(true)->first();
            $selected_project->update(['is_selected' => false]);
        }

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
            'file' => 'image|max:1000',
            'client' => 'nullable',
            'year' => 'nullable',
            'categories' => 'required|array|min:1',
            'is_selected' => 'nullable'
        ]);

        if (!$request->has('is_selected') && $project->is_selected) {
            $data['is_selected'] = false;
        }

        if ($request->has('file')) {
            $this->removeImagePath($project->cover);
            $data['cover'] = $this->fetchImage($data['file']);
        }

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

    public function orderForm()
    {
        if (Project::whereIsSelected(true)->count() <= 1) {
            return redirect()->route('panel.projects.index')->with('warning', '1 proýekti tertipläp bolmaýar!');
        }

        $projects = Project::whereIsSelected(true)->orderBy('order')->get();

        return view('panel.projects.projects_order', compact('projects'));
    }

    public function order(Request $request)
    {
        if (Project::whereIsSelected(true)->count() <= 1) {
            return redirect()->route('panel.projects.index')->with('warning', '1 proýekti tertipläp bolmaýar!');
        }

        foreach ($request->get('ids', []) as $key => $id) {
            Project::whereId($id)->update(['order' => $key + 1]);
        }

        return redirect()->route('panel.projects.index')->with('success', 'Proýekt tertiplendi.');
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
