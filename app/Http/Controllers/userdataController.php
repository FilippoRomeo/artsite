<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\UserData;
use Redirect;
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
        //if users do not own a profile redirect to login/signin page
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
        //if users do not own an account redirect to login/signin, they should not be able to create data
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

        $UserretrievedFromRequest = $request->user();
        $uid = $UserretrievedFromRequest->{'id'};

        $currentUser = DB::table('users')
            ->where('id', Auth::id())
            ->get();

        //if the user is authenticate 
        if (!auth()->user()) {
            return view('auth/login')->with('message', 'Please log in first.');
        }
        //if the user has the same id, or the user is the admin
        elseif ($uid == Auth::id() or $currentUser[0]->user_type == 'admin') {

            $request->validate([
                'name' => 'required|max:100',
                'from' => 'required|max:100',
                'movement' => 'required|max:250',
                'active_period' => 'required|max:100',
                'bio' => 'required|max:1000'
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
        //if the user is authenticate but do not own the post redirect to homepage(images) with error
        else {
            return redirect()->route('images')->with('error', "No, you can't edit someone else data");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //it does not handle authenticated users that don't have additional data stored

        //retrieve the data from the auth user
        $currentUserData = DB::table('user_data')
            ->where('user_id', Auth::id())
            ->get();
         
        if (Auth::check() && !empty($currentUserData[0]) && $id == $currentUserData[0]->id){
            //if the user is the owner ot the page, redirect to profile.index
           return redirect() -> route('profile.index');
        }
   
        // if the user does not own the page OR if the user is not authenticated
           $udata = UserData::find($id);
        // retrieve the data from the auth user
        $images = DB::table('craft_work_pics') 
               -> where('added_by', $udata->user_id) 
               -> get();
        return view('profile.detail', compact('udata', 'images'));
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

        $currentUser = DB::table('users')
            ->where('id', Auth::id())
            ->get();

        //Access object properties with name
        $uid = (object) $udata;


        //if the user is authenticate 
        if (!auth()->user()) {
            return view('auth/login')->with('message', 'Please log in first.');
        }
        //if the user has the same id, or the user is the admin
        elseif ($uid->{'user_id'} == Auth::id() or $currentUser[0]->user_type == 'admin') {
            return view('profile.edit', compact('udata'));
        }
        //if the user is authenticate but do not own the post redirect to homepage(images) with error
        else {
            return redirect()->route('images')->with('error', "No, you can't edit someone else data");
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
        $udata = UserData::find($id);
        $currentUser = DB::table('users')
            ->where('id', Auth::id())
            ->get();

        //if the user is authenticate 
        if (!auth()->user()) {
            return view('auth/login')->with('message', 'Please log in first.');
        }
        //if the user has the same id
        elseif ($udata->user_id == Auth::id()) {
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
        //if the user is the admin
        elseif ($currentUser[0]->user_type == 'admin') {
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

            return redirect()->route('profile.show', $id)->with('success', 'Yea updated successfully');
        }
        //if the user is authenticate but do not own the post redirect to homepage(images) with error
        else {
            return redirect()->route('images')->with('error', "No, you can't edit someone else data");
        }
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
        $currentUser = DB::table('users')
            ->where('id', Auth::id())
            ->get();

        //if the user is not authenticate 
        if (!auth()->user()) {
            return view('auth/login')->with('message', 'Please log in first.');
        }
        //if the user has the same id
        elseif ($udata->user_id == Auth::id()) {
            $udata->delete();
            return redirect()->route('profile.index')
                ->with('success', 'The record was deleted successfully');
        } //if the user is the admin
        elseif ($currentUser[0]->user_type == 'admin') {
            $udata->delete();
            return redirect()->route('profile.show', $id)
                ->with('success', 'The record was deleted successfully');
        }
        // if the user is authenticate but do not own the post redirect to 
        // homepage(named ine the web.php file as images) with error message
        else {
            return redirect()->route('images')->with('error', "No, you can't edit someone else data");
        }
    }
}
