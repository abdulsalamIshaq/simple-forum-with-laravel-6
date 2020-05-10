@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                @foreach($cat_title as $cat_name)
                <div class="card-header">
                    <h4>
                        Category: {{$cat_name->catTitle}}
                    </h4>
                </div>
                @endforeach
                <div class="card-body">
                    <ul class="post_lists">
                        @foreach($cat as $row)
                        <li>
                            <h5><a href="/discussion/{{$row->id}}">{{$row->title}}</a></h5>
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
                        {{$cat->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop