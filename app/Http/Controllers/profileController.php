<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class profileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $profile = \App\User::where('id', $id)->get();
        return view('profile.profile', ['profile' => $profile]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        $profile = \App\User::where('id', Auth::id())->get();
        return view('profile.edit_profile', ['profile' => $profile]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => 'required',
            'email' => 'required',
            'gender' => 'required',
            'phone' => 'required',
            'birth' => 'required'
        ]);

        $imageName = time().'.'.$request->photo->extension();
        $request->photo->move(public_path('uploads'), $imageName);
        $data = $request->all();

        $user = \App\User::find(Auth::id());

        $user->photo = $imageName;
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->gender = $data['gender'];
        $user->phone = $data['phone'];
        $user->birth = $data['birth'];

        $user->save();
        return Redirect('edit_profile');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}