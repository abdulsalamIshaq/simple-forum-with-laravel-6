@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Welcome Dashboard {{Auth::user()->name}}</h4>
                    <div class="row">
                        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
                            <div class="" id="navbarSupportedContent">
                                <!-- Left Side Of Navbar -->
                                <ul class="navbar-nav mr-auto">
                                    <li class="dropdown">
                                        <a class="dropdown-toggle" data-toggle="dropdown" href="">Admin<span class="caret"></span> </a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-item"><a href="/admin/home">Posts</a></li>
                                            <li class="dropdown-item"><a href="/admin/cats">Categories</a></li>
                                            <li class="dropdown-item"><a href="/admin/users">Users</a></li>
                                            <li class="dropdown-item"><a href="/admin/comments">Comments</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        @csrf
                        <div class="form-group row">
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
                            <div class="col-md-4">
                                <input type="text" name="catTitle" id="catTitle" placeholder="Add New Category" class="form-control">
                            </div>
                            <div class="col-md-2">
                                <input type="submit" value="Add Category" class="btn btn-primary">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection