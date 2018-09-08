@extends('layouts.admin')


@section('content')
    <h1>I'm from post page</h1>

    <table style="width:100%" class="table table-hover table-responsive">
        <tr>
            <th>Id</th>
            <th>user_id</th>
            <th>category_id</th>
            <th>photo_id</th>
            <th>title</th>
            <th>body</th>
            <th>Comments</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Delete</th>
        </tr>
        @if($post)
            @foreach($post as $pos)
                <tr>
                    <td>{{$pos->id}}</td>
                    <td>{{$pos->user->name}}</td>
                    <td>{{$pos->category->name}}</td>
                    <td><a href="{{route('views.post', $pos->id)}}"><img data-toggle="tooltip" title="See The Post" height="100" width="100" src="{{$pos->photo? 'http://localhost/Goals/public/images/'.$pos->photo->path:'No Pic Uploaded'}}"></a> </td>
                    <script>
                        $(document).ready(function(){
                            $('[data-toggle="tooltip"]').tooltip();
                        });
                    </script>
                    <td>
                        <a data-toggle="tooltip" title="Edit The Post" href="{{route('admin.posts.edit', $pos->id)}}">{{$pos->title}}</a>
                    </td>
                    <td>{{$pos->body}} </td>
                    <td><a data-toggle="tooltip" title="See Comments Related To The Post" href="{{route('comments.show', $pos->id)}}">{{$pos->title}}</a></td>
                    <td>{{$pos->created_at->diffForHumans()}}</td>
                    <td>{{$pos->updated_at->diffForHumans()}}</td>
                    <td>

                        {!! Form::open(['method'=>'Delete', 'action'=>['AdminPostsController@destroy', $pos->id]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                        {!! Form::close() !!}

                    </td>
                </tr>
            @endforeach
        @endif


    </table>



<div class="row">
    <div class="col-sm-6 col-sm-offset-5">
        {{$post->render()}}
    </div>
</div>



@stop