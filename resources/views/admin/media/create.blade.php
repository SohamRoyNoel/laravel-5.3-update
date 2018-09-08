@extends('layouts.admin')


@section('styles')

    @stop

@section('content')

    <h1>Media Creater</h1>

    {!! Form::open(['method'=>'POST', 'action'=>'AdminPhotosController@store', 'files'=>true, 'class'=>'dropzone']) !!}



    {!! Form::close() !!}

@stop

@section('footer')



@stop