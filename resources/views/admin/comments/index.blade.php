@extends('layouts.admin')


@section('content')
    <h1>Comments</h1>

    <table style="width:100%" class="table table-hover table-responsive">
        <tr>
            <th>Id</th>
            <th>post_id</th>
            <th>Active</th>
            <th>Author</th>
            <th>Email</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Delete</th>
        </tr>
        @if($comments)
            @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td><a href="{{route('views.post', $comment->post->id)}}"> {{$comment->post->title}}</a></td>
                    <td>
                        @if($comment->is_active == 1)
                            {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="0">
                            <div class="form-group">
                                {!! Form::submit('Make Un-approve', ['class'=>'btn btn-primary']) !!}
                            </div>
                            {!! Form::close() !!}
                        @else
                            {!! Form::open(['method'=>'PATCH', 'action'=> ['PostCommentsController@update', $comment->id]]) !!}
                            <input type="hidden" name="is_active" value="1">
                            <div class="form-group">
                                {!! Form::submit('Make Approve', ['class'=>'btn btn-info']) !!}
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </td>
                    <td>{{$comment->author}}</td>
                    <td>{{$comment->email}} </td>
                    <td>{{$comment->body}}</td>
                    <td>{{$comment->created_at->diffForHumans()}}</td>
                    <td>{{$comment->updated_at->diffForHumans()}}</td>
                    <td>

                        {!! Form::open(['method'=>'Delete', 'action'=>['PostCommentsController@destroy', $comment->id]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
        @endif


    </table>



@stop