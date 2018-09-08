@extends('layouts.admin')

@section('content')

    <h1>Edit The Post</h1>

    <div class="row">

        <div class="col-sm-3">

            <img height="250" width="250" class="img img-circle" src="{{$post->photo? 'http://localhost/Goals/public/images/'.$post->photo->path:'No Pic Uploaded'}}">

        </div>

        <div class="col-sm-9">

            {!! Form::model($post, ['method'=>'PATCH', 'action'=>['AdminPostsController@update', $post->id], 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('title', 'Post Title:') !!}
                {!! Form::text('title', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
            </div>

            <div class="form-group">
                {!! Form::label('category_id', 'Post Category:') !!}
                {!! Form::select('category_id', $category,  null, ['class'=>'form-control']) !!}
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

        </div>

    </div>
    @include('pertial.validationErr')

@stop

@section('footer')

@stop