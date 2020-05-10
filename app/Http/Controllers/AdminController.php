<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $posts = \App\post::with('category', 'user')->Orderby('id', 'desc')->paginate();

        return view('admin.home', ['posts' => $posts]);
    }

    public function fetch_users() {
        $user = \App\User::paginate(10);
        return view('admin.users', ['user' => $user]);
    }

    public function destroy(Request $request) {
        $request->validate([
            'delete_id' => 'required',
        ]);
        $data = $request->all();

        \App\User::destroy($data);

        return Redirect('/admin/users');
    }
    /**
     * fetch all post
     */
}
