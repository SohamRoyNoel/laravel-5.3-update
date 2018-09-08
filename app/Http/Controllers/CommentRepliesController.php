<?php

namespace App\Http\Controllers;

use App\CommentReply;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class CommentRepliesController extends Controller
{
    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {

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
        //
    }

    public function createReply(Request $request){

        $user = Auth::user();
        $input['comment_id']=$request->comment_id;
        $input['author']=$user->name;
        $input['email']=$user->email;
        $input['photo']=$user->photo->path;
        $input['body']=$request->body;
        CommentReply::create($input);
        return redirect()->back();
    }
}
