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
                    <a href="/admin/add_cats" class="btn btn-primary">Add New Category</a>
                    <table class="table">
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>published date</th>
                            <th>Action</th>
                        </tr>
                        @foreach($cats as $row)
                        <tr>
                            <td>{{$row->id}}</td>
                            <td>{{$row->catTitle}}</td>
                            <td>{{date('D M Y', strtotime($row->created_at))}}</td>
                            <td>
                                <span class="row">
                                    <a href="/edit_cats/{{$row->id}}" class="btn btn-primary">Edit</a> &nbsp;
                                    <form action="" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" required name="delete_id" value="{{$row->id}}">
                                        <input type="submit" class="btn btn-danger" value="Delete">
                                    </form>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection