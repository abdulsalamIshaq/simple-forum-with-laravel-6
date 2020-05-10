@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">General</div>
                <div class="card-body">
                    <ul class="post_lists">
                        @foreach($posts as $row)
                        <li>
                            <h5><a href="discussion/{{$row->id}}">{{$row->title}}</a></h5>
                            <small>
                                <b>By: </b>
                                <a href="/profile/{{$row->user->id}}">{{$row->user->name}}</a>&nbsp;&nbsp;
                                <b>Category: </b>
                                <a href="/category/{{$row->category->id}}">{{$row->category->catTitle}}</a>&nbsp;&nbsp;
                                <b>On: </b>
                                {{date('jS M Y H:i:s', strtotime($row->created_at)) }}
                            </small>
                        </li>
                        @endforeach
                    </ul>
                    <div class="paging">
                        {{$posts->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop