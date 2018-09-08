@extends('layouts.admin')

@section('content')
    <table style="width:100%" class="table table-hover table-responsive">
        <tr>
            <th>Id</th>
            <th>Picture</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Delete</th>
        </tr>
        @if($photos)
            @foreach($photos as $photo)
                <tr>
                    <td style="padding-top: 40px">{{$photo->id}}</td>
                    <td><img height="100" width="100" class="img img-circle" src="{{$photo->path? 'http://localhost/Goals/public/images/'.$photo->path:'No Pic Uploaded'}}"> </td>
                    <td style="padding-top: 40px">{{$photo->created_at->diffForHumans()}}</td>
                    <td style="padding-top: 40px">{{$photo->updated_at->diffForHumans()}}</td>
                    <td>
                        <div style="padding-top: 30px">
                            {!! Form::open(['method'=>'Delete', 'action'=>['AdminPhotosController@destroy', $photo->id]]) !!}
                            {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        </div>
                    </td>
                </tr>
            @endforeach
        @endif


    </table>
@stop

@section('footer')

@stop