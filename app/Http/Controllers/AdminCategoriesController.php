<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminCategoriesController extends Controller
{

    public function index()
    {
        $category = Category::all();

        return view('admin.categories.index', compact('category'));
    }

    public function create()
    {
        return view('admin.categories.edit');
    }

    public function store(CategoryRequest $request)
    {

        Category::create($request->all());
        return redirect('/admin/categories');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Category::findOrFail($id);
        return view('admin.categories.edit', compact('post'));
    }

    public function update(Request $request, $id)
    {
        $categories = Category::findOrFail($id);
        $input = $request->all();
        $categories->update($input);
        return redirect('/admin/categories');

    }

    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/admin/categories');
    }
}
