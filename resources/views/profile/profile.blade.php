@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4>Profile</h4>
                </div>
                <div class="card-body">
                    <div class="m-auto">
                        @foreach($profile as $pic)

                        <img src="{{ asset('uploads'.'/'.$pic->photo) }}" class="img img-rounded profile-pic">
                        @endforeach
                    </div>
                    <table class="table table-bodered">
                        <tr>
                            <th></th>
                            <th>Details</th>
                        </tr>
                        @foreach($profile as $row)
                        <tr>
                            <td>Name</td>
                            <td>{{$row->name}}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{$row->email}}</td>
                        </tr>
                        <tr>
                            <td>Gender</td>
                            <td>{{$row->gender}}</td>
                        </tr>
                        <tr>
                            <td>phone</td>
                            <td>{{$row->phone}}</td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td>{{date('d M Y ', strtotime($row->birth))}}</td>
                        </tr>
                        @endforeach
                    </table>
                    @if (Auth::check())
                    <a href="/edit_profile" class="btn btn-primary">Edit Profile</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@stop