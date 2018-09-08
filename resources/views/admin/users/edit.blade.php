@extends('layouts.admin')

@section('content')

    <h1>Edit An User</h1>

    <div class="row">

        <div class="col-sm-3">

            <img height="250" width="250" class="img img-circle" src="{{$user->photo? 'http://localhost/Goals/public/images/'.$user->photo->path:'No Pic Uploaded'}}">

        </div>

        <div class="col-sm-9">

            {!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Name:') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('email', 'Email:') !!}
                {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('photo_id', 'Upload your file:') !!}
                {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('role_id', 'Role:') !!}
                {!! Form::select('role_id', array(''=>'Select Role') + $roles,  null, ['class'=>'form-control']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('is_active', 'Active:') !!}
                {!! Form::select('is_active',array(1 => 'Online', 0 => 'Offline'), null, ['class'=>'form-control']) !!}
            </div>


            <div class="form-group">
                {!! Form::submit('Edit User', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

        </div>

    </div>


    @include('pertial.validationErr')

@stop

@section('footer')

@stop