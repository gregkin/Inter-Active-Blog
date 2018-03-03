<?php

namespace App\Http\Controllers;

use App\User;
use App\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.users.index')->with('users', User::all());
    }
    
    public function create()
    {
       return view('admin.users.create');
    }

    public function store(Request $request)
    {
       $this->validate($request, [
            'name' => 'required', 
            'email' => 'required|email'
        ]);
        $user = User::create([
            'name' => $request->name, 
            'email' => $request->email,
            'password' => bcrypt('password')
        ]);
        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' => 'uploads/avatar/man1.png'
        ]);
        Session::flash('info','User created successfully!');
        return redirect()->route('users');
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
    public function destroy($id)
    {
        $user = User::find($id);
        $user->profile->delete();
        $user->delete();
        Session::flash('info', 'The user '.$user->name.' has been deleted!' );
        return redirect()->route('users');
    }
    public function admin($id)
    {
        $user = User::find($id);
        $user->admin = 1;
        $user->save();
        Session::flash('info', 'Changed '.$user->name.' permission.');
        return redirect()->back();
    }
    public function not_admin($id)
    {
        $user = User::find($id);
        $user->admin = 0;
        $user->save();
        Session::flash('info', 'Changed '.$user->name.' permission.');
        return redirect()->back();
    }
}
