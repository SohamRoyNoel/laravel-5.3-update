@extends('layouts.admin')


@section('content')
    <h1>I'm from Create Category page</h1>

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminCategoriesController@update', $post->id], 'files'=>true]) !!}

    <div class="form-group">
        {!! Form::label('name', 'Post Title:') !!}
        {!! Form::text('name', null, ['class'=>'form-control', 'autocomplete'=>'off', 'placeholder'=>'Name']) !!}
    </div>

    <div class="form-group">
        {!! Form::submit('Update Category', ['class'=>'btn btn-primary']) !!}
    </div>

    {!! Form::close() !!}







@stop