<?php

namespace App\Http\Controllers\Panel;

use App\Image;
use App\Project;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ImageController extends Controller
{
    public function order(Project $project)
    {
        $images = $project->imagesOrderBy();
        return view('panel.projects.order', compact('project', 'images'));
    }

    public function orderUpdate(Request $request)
    {
        foreach ($request->get('ids', []) as $key => $id) {
            Image::whereId($id)->update(['order' => $key + 1]);
        }

        return redirect()->route('panel.projects.show', $request->get('project_id'))->with('success', 'Proýekt suratlary saýhallandy.');
    }

    public function create(Project $project)
    {
        return view('panel.projects.image-create', compact('project'));
    }

    public function store(Request $request, Project $project)
    {
        $request->validate([
            'images.*' => 'required|image|max:1000',
            'types.*' => 'required|in:wide,normal',
        ]);

        $last_order = $project->images()->orderBy('order', 'desc')->first()->order;

        foreach ($request->file('images', []) as $key => $image) {
            $last_order++;

            Image::create([
                'project_id' => $project->id,
                'type' => $request->get('types')[$key],
                'filename' => $this->fetchImage($image),
                'order' => $last_order,
            ]);
        }

        return redirect()->route('panel.projects.show', $project->id)->with('success', 'Proýekt surady goşuldy.');
    }

    public function type(Image $image)
    {
        $image->type = $image->type == 'wide' ? 'normal' : 'wide';
        $image->save();

        return redirect()->route('panel.projects.show', $image->project->id)->with('success', 'Surat görnüşi üýtgedildi.');
    }

    public function destroy(Image $image)
    {
        $project = $image->project;

        if (count($project->images) == 1) {
            return redirect()->route('panel.projects.show', $image->project->id)->with('warning', 'Iň az bir sany surat bolmaly');
        }

        $this->removeImagePath($image->filename);
        $image->delete();

        foreach ($project->imagesOrderBy() as $key => $item) {
            $item->update(['order' => $key + 1]);
        }

        return redirect()->route('panel.projects.show', $image->project->id)->with('danger', 'Surat pozuldy.');
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
