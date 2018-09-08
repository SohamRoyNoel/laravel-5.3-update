<?php

namespace App\Http\Controllers;

use App\Category;
use App\Comment;
use App\Http\Requests\PostsCreateRequest;
use App\Photo;
use App\Post;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class AdminPostsController extends Controller
{
    public function index()
    {
        $post = Post::paginate(2);

        return view('admin.posts.index', compact('post'));
    }


    public function create()
    {
        $post = Category::pluck('name', 'id')->all();

        return view('admin.posts.create', compact('post'));
    }

    public function store(PostsCreateRequest $request)
    {
        $input = $request->all();

        $user = Auth::user();

        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->post()->create($input);

//        dd($user->post());
        return redirect('/admin/posts');

    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $category = Category::pluck('name','id')->all();
        return view('admin.posts.edit', compact('post', 'category'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $post->update($input);

        return redirect('/admin/posts');
    }

    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('/admin/posts');
    }

    public function posts($id){
        $post = Post::findOrFail($id);
        $category = Category::all()->take(5);
        $comment = $post->comments()->whereIsActive(1)->get();

        return view('post', compact('post', 'category', 'comment'));
    }
}
