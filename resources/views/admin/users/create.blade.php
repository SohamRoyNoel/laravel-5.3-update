@extends('layouts.admin')




@section('content')

    <h1>Create An User</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminUsersController@store', 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Name:') !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('email', 'Email:') !!}
        {!! Form::text('email', null, ['class'=>'form-control', 'placeholder'=>'Email']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('password', 'Password:') !!}
        {!! Form::password('password', ['class'=>'form-control', 'placeholder'=>'Password']) !!}
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
        {!! Form::submit('Create User', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}




    @include('pertial.validationErr')

@stop

@section('footer')

@stop