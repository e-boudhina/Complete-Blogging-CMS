<?php

namespace App\Http\Controllers;

use App\Models\Setting;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function index()
    {
        return view('admin.settings.settings')->with('settings',Setting::first());
    }

    public function update()
    {
        // did you know that you don't need to send request as a parameter :p you can simply import or not "use Illuminate\Http\Request;"  and use request() directly

//        dd(request()->all());
        $this->validate(request(), [
            'site_name' =>'required',
            'address' =>'required',
            'contact_number' =>'required',
            'contact_email' =>'required',
        ]);
        $setting = Setting::first();
        $setting->update(
            // Use this only if the attributes names coming from the the front end have the same name as those in data base
            request()->all()
        );
        session()->flash('success', 'Global Settings Updated Successfully');
        return redirect()->back();
    }
}
