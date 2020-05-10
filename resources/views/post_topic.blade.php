@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create Topic</div>
                <div class="card-body">
                    <form method="POST" action="">
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
                        <div class="form-group row">
                            <label for="Title" class="col-md-4 col-form-label text-md-right">Title</label>
                            <div class="col-md-6">
                                <input id="title" type="text" name="title" value="" required="required" autofocus="autofocus" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category_id" class="col-md-4 col-form-label text-md-right">Category</label>
                            <div class="col-md-6">
                                <select name="category_id">
                                    @foreach($nav as $row)
                                    <option value="{{$row->id}}">{{$row->catTitle}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="content" class="col-md-4 col-form-label text-md-right">Content</label>
                            <div class="col-md-6">
                                <textarea name="content" id="editor" placeholder="Subject Content" class="form-control"></textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input type="submit" name="submit" class="btn btn-primary" value="Post">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection