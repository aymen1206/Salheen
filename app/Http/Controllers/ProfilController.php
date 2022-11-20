<?php

namespace App\Http\Controllers;
use Auth;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=Auth::user();
        $id=Auth::id();
        return view('users.profile')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profil  $profil
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Profil $profil)
    {

        $this->validate($request,[
            'name'=> 'required',
            'country'=> 'required',
            'gender'=> 'required',
            'job'=> 'required'

        ]);

        $user=Auth::user();
        $user->name = $request->name;
        $user->profil->Country = $request->country;
        $user->profil->gender = $request->gender;
        $user->profil->job = $request->job;
        $user->save();
        $user->profil->save();
        return redirect()->back();
    }

}
