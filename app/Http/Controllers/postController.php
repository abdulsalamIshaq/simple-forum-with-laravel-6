<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('post_topic');
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
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required'
        ]);

        $data = $request->all();
        $data['user_id'] = Auth::id();

        \App\post::create($data);

        return redirect('home');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $posts = \App\post::with('category', 'user')->Orderby('id','desc')->paginate();
        return view('home', ['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $edit = \App\post::with('category', 'user')->where('id', $id)->Orderby('id', 'desc')->get();
        return view('admin.edit_post', ['edit' => $edit]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'user_id' => 'required'
        ]);
        $data = $request->all();

        $post = \App\post::find($id);

        $post->title = $data['title'];
        $post->user_id = $data['user_id'];
        $post->category_id = $data['category_id'];
        $post->content = $data['content'];
        $post->save();

        return Redirect('/admin/home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $request->validate([
            'delete_id' => 'required',
        ]);
        $data = $request->all();
        
        \App\post::destroy($data);

        return Redirect('/admin/home');

    }
}
