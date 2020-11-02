<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{

    public function index()
    {
        return view('index')
            ->with('settings',Setting::first())
            ->with('categories',Category::take(4)->get())
            ->with('first_post', Post::orderBy('created_at','desc')->first())
            ->with('second_post', Post::orderBy('created_at','desc')->skip(1)->take(1)->get()->first()) // we need to use first or else will get a collection
            ->with('third_post', Post::orderBy('created_at','desc')->skip(2)->take(1)->get()->first())
            ->with('c5', Category::find(5))
            ->with('c6', Category::find(6));

    }

    public function singlePost($slug)
    {
        $post = Post::where('slug',$slug)->first();
//        dd($post);
        return view('single')
            ->with('post',$post)
            ->with('settings',Setting::first())
            ->with('categories',Category::take(4)->get());
    }

}
