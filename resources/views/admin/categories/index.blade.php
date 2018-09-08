@extends('layouts.admin')


@section('content')
    <h1>I'm from All Category page</h1>


    <div class="row">

        <div class="col-sm-6">

            {!! Form::open(['method'=>'POST', 'action'=>'AdminCategoriesController@store', 'files'=>true]) !!}

            <div class="form-group">
                {!! Form::label('name', 'Category Title:') !!}
                {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Name']) !!}
            </div>

            <div class="form-group">
                {!! Form::submit('Create Category', ['class'=>'btn btn-primary']) !!}
            </div>

            {!! Form::close() !!}

            @include('pertial.validationErr')
        </div>


        <div class="col-sm-6">

            <table style="width:100%" class="table table-hover table-responsive">
                <tr>
                    <th>Id</th>
                    <th>Category Name</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                    <th>Delete</th>
                </tr>
                @if($category)
                    @foreach($category as $cat)
                        <tr>
                            <td>{{$cat->id}}</td>
                            <td><a href="{{route('admin.categories.edit', $cat->id)}}">{{$cat->name}}</a></td>
                            <td>{{$cat->created_at ? $cat->created_at->diffForHumans() : "No date available"}}</td>
                            <td>{{$cat->updated_at ? $cat->updated_at->diffForHumans() : "No date available"}}</td>
                            <td>

                                {!! Form::open(['method'=>'Delete', 'action'=>['AdminCategoriesController@destroy', $cat->id]]) !!}
                                {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                                {!! Form::close() !!}


                            </td>
                        </tr>
                    @endforeach
                @endif


            </table>
        </div>

    </div>




@stop