<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class discussionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $comments = \App\comment::with('user')->paginate();
        return view('admin.comments', ['comments' => $comments]);
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
    public function store(Request $request, $id)
    {
        //
        $request->validate([
            'comment_contents' => 'required',
            'post_id' => 'required',
        ]);
        
        $data = $request->all();
        $data['user_id'] = Auth::id();
         
        \App\comment::create($data);

        return redirect()->route('discussion', ['id' => $id]);
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
        //fetch posts
        $posts = \App\Post::where('id', $id)->with('user', 'category')->get();

        // fetch comments
        $comments = \App\comment::where('post_id', $id)->with('user')->get();

        //print_r($rep[0]); die();
        //return view
        return view('discussion', ['posts' => $posts], ['comments' => $comments]);
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

        \App\comment::destroy($data);

        return Redirect('/admin/comments');
    }
    
}
