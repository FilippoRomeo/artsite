<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\UserData;
use DB;

class userdataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()) {
            return view('auth/login')->with('message', 'Please log in first.');
        } else {
            return view('profile.index');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (!auth()->user()) {
            return view('auth/login')->with('message', 'Please log in first.');
        } else {
            return view('profile.create');
        }
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
            'name' => 'required',
            'from' => 'required',
            'movement' => 'required',
            'active_period' => 'required',
            'bio' => 'required'
        ]);

        $userInputs = new UserData;

        $userInputs->name = $request->input('name');
        $userInputs->from = $request->input('from');
        $userInputs->movement = $request->input('movement');
        $userInputs->active_period = $request->input('active_period');
        $userInputs->bio = $request->input('bio');
        $userInputs->user_id = Auth::id();

        $userInputs->save();

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
        $udata = UserData::find($id);
        return view('profile.detail', compact('udata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $udata = UserData::find($id);

        var_dump($udata->user_id, $udata->user_id === Auth::id(), Auth::id(), 'userDataController, handle permission');

        if (!$udata) {
            return redirect()->route('profile.index')
                ->with('success', 'Yea updated successfully');
        } else {
            return view('profile.edit', compact('udata'));
        }
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
            'name' => 'required',
            'from' => 'required',
            'movement' => 'required',
            'active_period' => 'required',
            'bio' => 'required',
        ]);

        $udata = UserData::find($id);
        $udata->name = $request->input('name');
        $udata->from = $request->input('from');
        $udata->movement = $request->input('movement');
        $udata->active_period = $request->input('active_period');
        $udata->bio = $request->input('bio');
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
        $udata = UserData::find($id);
        $udata->delete();
        return redirect()->route('profile.index')
            ->with('success', 'The record was deleted successfully');
    }
}
