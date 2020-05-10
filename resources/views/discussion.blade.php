@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    @foreach($posts as $row)
                    <h3>{{$row->title}}</h3>
                    <small>
                        <b>By:&nbsp;</b>
                        <a href="profile">{{$row->user->name}}</a>&nbsp;&nbsp;
                        <b>Category:&nbsp;</b>
                        <a href="category/{{$row->category->id}}">{{$row->category->catTitle}}</a>
                        <b>On:&nbsp;</b>
                        {{date('jS M Y H:i:s', strtotime($row->created_at))}}
                    </small>
                    @endforeach
                </div>
                <div class="card-body">
                    @foreach($posts as $row)
                    <blockquote>
                        {{$row->content}}
                    </blockquote>
                    @endforeach
                </div>
            </div>
            <br>
            <h2>Comments</h2>
            <hr>


            @foreach($comments as $row)
            <div class="card">
                <div class="card-header">
                    <small>
                        <b>By: </b>
                        <a href="/profile/">{{$row->user->name}}</a>&nbsp;&nbsp;
                        <b>On: </b>
                        {{date('jS M Y H:i:s', strtotime($row->created_at)) }}
                    </small>
                </div>
                <div class="card-body">
                    <blockquote>
                        {{$row->comment_contents}}
                    </blockquote>
                </div>
            </div>
            <br>
            <hr>
            @endforeach


            @if(Auth::check())
            <div class="card overflow-hidden post mx-auto h-auto w-full text-grey-darkest text-xl">
                <div class="discussion_post__content py-8 px-10 lg:py-16 lg:px-20 lg:flex items-start">
                    <form class="form-goup" action="" method="post">
                        @csrf
                        <div class="container">
                            @if($errors->any())
                            <div class="form-group">
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach($errors->all() as $error)
                                        <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                        </div>
                        <br>
                        <div class="col-12">
                            <textarea class="form-control comment-content" name="comment_contents" placeholder="Write Your Comment" required></textarea>
                            @foreach($posts as $row)
                            <input type="hidden" name="post_id" class="form-control comment-user_id" required value="{{$row->id}}">
                            @endforeach
                        </div>
                        <br>
                        <div class="col-12">
                            <input type="submit" name="submit" class="btn btn-primary" value="Comment">
                        </div>
                    </form>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@stop