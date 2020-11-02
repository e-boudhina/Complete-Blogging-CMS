<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.profiles.index')->with('user',auth()->user());
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request,  $id)
    {
        // I tried to send the id with the request using User $user but for an unknown reason this didn't work
         $user = User::find($id);
//        dd($user->name);
//dd($request->all());
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'facebook' =>'required|url',
            'youtube' =>'required|url',
            'about' => 'required'
        ]);

        if ($request->hasFile('avatar'))
        {
            $avatar = $request->file('avatar');
            $avatar_new_name = time().$avatar->getClientOriginalName();

            $avatar->move('upload/avatars',$avatar_new_name);
            $user->profile->avatar = $avatar_new_name;
            $user->profile->save();
        }

//        dd('here1');
        // The rest of the fields
        $user->name = $request->name;
        $user->email = $request->email;

        $user->profile->facebook = $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->about = $request->about;

        $user->save();
//        dd('here2');

        $user->profile->save();

        if ($request->has('password'))
        {
            $user->password = 'test';
            $user->save();
        }

        session()->flash('success', 'Your profile  has been updated Successfully');
//        return redirect(route('home'));
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd("here");
    }
}
