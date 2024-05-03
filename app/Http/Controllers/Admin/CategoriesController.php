<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categorie;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $category = new Categorie();
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function show($id)
    {
        $category = Categorie::find($id);
        return view('admin.categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Categorie::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = Categorie::find($id);
        $category->name = $request->name;
        $category->save();
        return redirect()->route('admin.categories.index');
    }

    public function destroy($id)
    {
        Categorie::destroy($id);
        return redirect()->route('admin.categories.index');
    }
}
