<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{



    public function __construct()
    {
        $this->middleware('admin');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users.index')->with('users',User::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name'=>'required',
            'email'=>'required|email'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' =>$request->email,
            'password'=>Hash::make('password')
        ]);
        $profile = Profile::create([
            'user_id' => $user->id,
            'avatar' =>'default_user.png'
        ]);
        session()->flash('success', 'User Created Successfully');
        return redirect(route('user.index'));
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
    public function destroy(User $user)
    {
        // You need to delete the sub relationship first before proceeding to delete the user, though there are methods out there that do this in a cascading way.
        Profile::destroy($user->profile->id);
        User::destroy($user->id);
        session()->flash('success', 'User Deleted Successfully');
        return redirect()->back();
    }

    public function admin(User $user)
    {
        $user->admin = 1;
        $user->save();
        session()->flash('success', 'User Rank Upgraded Successfully');
        return redirect(route('user.index'));
    }
    public function revoke(User $user)
    {
        $user->admin = 0;
        $user->save();
        session()->flash('success', 'User Rank downgraded Successfully');
        return redirect(route('user.index'));
    }
}
