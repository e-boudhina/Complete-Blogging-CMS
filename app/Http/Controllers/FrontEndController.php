<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Setting;
use App\Models\Tag;
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
        $next_id = Post::where('id','>',$post->id)->min('id');
        $previous_id = Post::where('id','<',$post->id)->max('id');

//        dd($post);
        return view('single')
            ->with('post',$post)
            ->with('tags',Tag::all())
            ->with('settings',Setting::first())
            ->with('categories',Category::take(4)->get())
            ->with('next',Post::find($next_id))
            ->with('previous',Post::find($previous_id));
    }

    // if you like to use slugs you can do it's much more readable
    public function category(Category $category)
    {
//        dd($category);
            return view('category')
                ->with('category', $category)
                ->with('settings',Setting::first())
                ->with('categories',Category::take(4)->get());
    }
    public function tag(Tag $tag)
    {
//        dd('here');
//        dd($category);
            return view('tag')
                ->with('tag', $tag)
                ->with('settings',Setting::first())
                ->with('tags',Tag::take(4)->get())
                ->with('categories',Category::take(4)->get());
    }

    public function search(Request $request)
    {
//        dd($request->query);
        $posts = Post::where('title','like',   '%'.$request->myquery.  '%')->get();
        return view('results')
            ->with('title', 'Search results for : '.$request->myquery)
            ->with('posts', $posts)
            ->with('settings',Setting::first())
            ->with('categories',Category::take(4)->get());
    }
}
