<?php

namespace App\Http\Controllers\Panel;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('panel.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('panel.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'slug' => 'required|unique:categories',
            'name.*' => 'required'
        ]);

        Category::create($request->all());

        return redirect()->route('panel.categories.index')->with('success', 'Katgoriýalar goşuldy');
    }

    public function edit(Category $category)
    {
        return view('panel.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate(['name.*' => 'required']);

        $category->update($request->all());

        return redirect()->route('panel.categories.index')->with('success', 'Katgoriýalar üýtgedildi');
    }

    public function destroy(Category $category)
    {
        if ($category->projects()->count()) {
            return redirect()->route('panel.categories.index')->with('warning', 'Bu kategoriýada nahar bar');
        }

        $category->delete();

        return redirect()->route('panel.categories.index')->with('danger', 'Katgoriýalar pozuldy');
    }
}
