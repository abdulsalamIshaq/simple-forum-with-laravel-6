@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                    <div class="form-group row">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                    <form method="POST" action="{{ url('edit_profile') }}" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        @foreach($profile as $row)
                        <div class="form-group row">
                            <label for="profile" class="col-md-4 col-form-label text-md-right">Profile Pic</label>
                            <div class="col-md-6">
                                <input id="photo" type="file" name="photo" required="required" class="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                            <div class="col-md-6">
                                <input id="name" type="text" name="name" value="{{$row->name}}" required="required" autocomplete="name" autofocus="autofocus" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail Address</label>
                            <div class="col-md-6">
                                <input id="email" type="email" name="email" value="{{$row->email}}" required="required" autocomplete="email" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="Gender" class="col-md-4 col-form-label text-md-right">Gender</label>
                            <div class="col-md-6">
                                <input type="radio" class="" name="gender" value="Male"> Male &NonBreakingSpace;
                                <input type="radio" class="" name="gender" value="Female"> Female
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="phoneNo" class="col-md-4 col-form-label text-md-right">Phone No</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" name="phone" value="{{$row->phone}}" required="required" autocomplete="name" autofocus="autofocus" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="birth" class="col-md-4 col-form-label text-md-right">Date of Birth</label>
                            <div class="col-md-6">
                                <input id="birth" type="date" name="birth" value="{{$row->birth}}" required="required" autocomplete="name" autofocus="autofocus" class="form-control ">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Update
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@stop