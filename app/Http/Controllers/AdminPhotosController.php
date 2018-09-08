<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

use App\Http\Requests;

class AdminPhotosController extends Controller
{

    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }


    public function create()
    {
        return view('admin.media.create');
    }


    public function store(Request $request)
    {
        $file=$request->file('file');

        $name = time() . $file->getClientOriginalName();

        $file->move('images', $name);

        Photo::create(['path'=>$name]);
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        Photo::destroy($id);
        return redirect('/admin/media');
    }
}
