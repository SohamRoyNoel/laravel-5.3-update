@extends('layouts.admin')




@section('content')

    <h1>Create A Post</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('title', 'Post Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
    </div>

    <div class="form-group">
    {!! Form::label('category_id', 'Post Category:') !!}
    {!! Form::select('category_id', array(''=>'Select Category')+ $post,  null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('body', 'Post Content:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
    </div>

    <div class="form-group">
        {!! Form::label('photo_id', 'Upload Post Image:') !!}
        {!! Form::file('photo_id', null, ['class'=>'form-control']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}

    @include('pertial.validationErr')

@stop

@section('footer')

@stop