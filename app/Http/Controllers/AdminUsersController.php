<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserEditRequest;
use App\Http\Requests\UserRequest;
use App\Photo;
use App\User;

use App\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Session;

class AdminUsersController extends Controller
{

    public function index()
    {
        $users = User::all();


        return view('admin.users.index', compact('users'));
    }


    public function create(){

        $roles = Role::pluck('name','id')->all();

        return view('admin.users.create', compact('roles'));
    }


    public function store(UserRequest $request){

        $input = $request->all();


        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

//        User::create($request->all());

        $input['password'] = bcrypt($request->password);

        User::create($input);

        return redirect('/admin/create');

    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::pluck('name','id')->all();
        return view('admin.users.edit', compact('user','roles'));
    }


    public function update(UserEditRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();

        if ($file = $request->file('photo_id')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);

        return redirect('/admin/create');
    }


    public function destroy($id)
    {
        // DELETES USER BUT DOESN'T DELETE PIC FROM THE SERVER
        User::findOrFail($id)->delete();


        // DELETES BOTH USER AND PHOTO FROM SERVER
//        $user = User::findOrFail($id);
//
//        unlink('htdocs/Goals/public/images' . $user->photo->path);
//
//        $user->delete();
//
        Session::flash('deleted_user', 'User has been deleted');

        return redirect('/admin/create');

    }
}
