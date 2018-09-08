@extends('layouts.blog-post')

@section('content')

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> {{$post->updated_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo? 'http://localhost/Goals/public/images/'.$post->photo->path:'No Pic Uploaded'}}" alt="">

    <hr>

    <!-- Post Content -->
    <p class="lead">{{$post->body}}</p>

    <hr>

    <!-- Blog Comments -->
    @if(Auth::check())
        <!-- Comments Form -->
        <div class="well">
            @if(Session::has('message'))
                {{session('message')}}
            @endif

            <h4>Leave a Comment:</h4>
            {!! Form::open(['method'=>'POST', 'action'=>'PostCommentsController@store', 'files'=>true]) !!}

            <input type="hidden" name="post_id" value="{{$post->id}}">

            <div class="form-group">
                {!! Form::textarea('body', null, ['class'=>'form-control', 'placeholder'=>'Name', 'rows'=>3]) !!}
            </div>


            {!! Form::submit('Comment', ['class'=>'btn btn-primary']) !!}

            {!! Form::close() !!}
        </div>
    @endif
    <hr>

    <!-- Posted Comments -->

    <!-- Comment -->


    <!-- Comment -->
    @if(count($comment) > 0)
        @foreach($comment as $com)
            <div class="media">
                <a class="pull-left" href="#">

                    <img class="media-object" height="64" width="64" src="{{$com->photo_id? 'http://localhost/Goals/public/images/'.$com->photo_id :'No Pic Uploaded'}}" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">{{$com->author}}
                        <small>{{$com->created_at->diffForHumans()}}</small>
                    </h4>
                {{$com->body}}
                <!-- Nested Comment -->
                    <br>
                    @if(count($com->reply) > 0)
                        @foreach($com->reply as $rep)



                            <div class="media">
                                <a class="pull-left" href="#">
                                    <img class="media-object" height="64" width="64" src="{{$rep->photo? 'http://localhost/Goals/public/images/'.$rep->photo :'No Pic Uploaded'}}" alt="">
                                </a>
                                <div class="media-body">
                                    <h4 class="media-heading">{{$rep->author}}
                                        <small>{{$rep->author}}</small>
                                    </h4>
                                    {{$rep->body}}
                                </div>
                                <div class="comment-reply-container">


                                    <button class="toggle-reply btn btn-primary pull-right">Reply</button>

                                    <div class="comment-reply">
                                        {!! Form::open(['method'=>'POST', 'action'=>'CommentRepliesController@createReply', 'files'=>true]) !!}

                                        <input type="hidden" name="comment_id" value="{{$com->id}}">

                                        <div class="form-group">
                                            {!! Form::textarea('body', null, ['class'=>'form-control', 'placeholder'=>'Name', 'rows'=>3]) !!}
                                        </div>


                                        {!! Form::submit('Post Reply', ['class'=>'btn btn-primary']) !!}

                                        {!! Form::close() !!}
                                    </div>
                                </div>
                            </div>





                    @endforeach
                @endif
                <!-- End Nested Comment -->
                </div>
            </div>
        @endforeach
    @endif
@stop

@section('category')

    <div class="well">
        <h4>Blog Categories</h4>
        <div class="row">
            <div class="col-lg-6">
                <ul class="list-unstyled">
                    @foreach($category as $cats)
                        <li><a href="#">{{$cats->name}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
        <!-- /.row -->
    </div>

@stop

@section('scripts')

    <script>

        $(".comment-reply-container .toggle-reply").click(function(){

            $(this).next().slideToggle("slow");
        });

    </script>

@stop