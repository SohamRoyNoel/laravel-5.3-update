<?php

namespace App\Http\Controllers;

use App\Comment;
use App\CommentReply;
use App\Post;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class PostCommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        $reply = CommentReply::all();
        return view('admin.comments.index', compact('comments', 'reply'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {

        $user = Auth::user();

//        return $user->photo;
        $input['post_id']=$request->post_id;
        $input['author']=$user->name;
        $input['email']=$user->email;
        $input['body']=$request->body;
        $input['photo_id']=$user->photo->path;

        Comment::create($input);
        $request->session()->flash('message', 'Your comment has been published');

        return redirect()->back();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return view('admin.comments.show_particular', compact('comments'));
    }

    public function edit($id)
    {

    }

    public function update(Request $request, $id)
    {
        Comment::findOrFail($id)->update($request->all());

        return redirect('/admin/comments');
    }

    public function destroy($id)
    {
        Comment::destroy($id);
        return redirect()->back();
    }
}
