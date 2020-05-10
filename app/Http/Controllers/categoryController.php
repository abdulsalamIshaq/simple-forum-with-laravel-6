<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cats = \App\category::Orderby('catTitle', 'ASC')->get();
        return view('admin.cats', ['cats' => $cats]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.add_cats');
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
            'catTitle' => ['required', 'unique:categories']
        ]);

        \App\category::create($request->all());

        return redirect('/admin/cats');
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
        $cat = \App\post::with('category')->where('category_id', $id)->paginate();
        $cat_title = \App\category::where('id', $id)->get();
        return view('category', ['cat' => $cat, 'cat_title' => $cat_title]);
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
        
        \App\category::destroy($data);

        return Redirect('/admin/cats');
    }
}
