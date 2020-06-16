<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\userdatas;

class userdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $udata = userdatas::latest()->paginate(5);
        $images = auth()->user()->images;
        return view('profile.index', compact('udata','images'))
                  ->with('i', (request()->input('page',1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required'
          ]);
  
          userdatas::create($request->all());
          return redirect()->route('profile.index')
                          ->with('success', 'new record successfully added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $udata = userdatas::find($id);
        return view('detail', compact('udata'));        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $udata = userdatas::find($id);
        return view('profile.edit', compact('udata'));
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
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'link' => 'required'
          ]);
          $udata = userdatas::find($id);
          $udata->title = $request->get('title');
          $udata->description = $request->get('description');
          $udata->link = $request->get('link');
          $udata->save();
          return redirect()->route('profile.index')
                          ->with('success', 'Yea updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $udata = userdatas::find($id);
        $udata->delete();
        return redirect()->route('profile.index')
                        ->with('success', 'The record was deleted successfully');
    }
}
