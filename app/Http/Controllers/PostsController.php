<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use PhpParser\Node\Scalar\String_;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.posts.index')->with('posts',Post::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /*
        In order to create a post there must be at least one category, you either implement the rules directly on the view forcing the user to create one before adding a post or you can create a middleware to filter that request and check if there is
        at least one category(best practise) following conventions or you simply do the logic here which is not recommended but it does the same job.
        */
        $categories = Category::all();
        if ($categories->count()>0)
        {
            return view('admin.posts.create')->with('categories',$categories);
        }else{
            session()->flash('info', 'You Must First Create at Least One Category Before Attempting to Create a Post');
            return redirect()->back();
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
//        dd($request->all());
//        dd(Str::slug($request->title));
$this->validate($request, [
    'title'=>'required',
    'featured'=>'required|image',
    'content'=>'required',
    'category_id'=>'required',
    // or str_slug
]);
        //dd($request->all());
        //Taking care of the image:
        $featured = $request->featured;
        $featured_new_name = time().$featured->getClientOriginalName();
        //Moving it to public folder
        $featured->move('upload/posts', $featured_new_name);

        // Taking care of the other fields

        Post::create([
            'title'=>$request->title,
            'content'=> $request->content,
            'featured' =>$featured_new_name,
            'category_id' => $request->category_id,
            'slug'=>Str::slug($request->title)
        ]);
        session()->flash('success', 'Post created Successfully');
        return redirect()->back();

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
        //
    }
}
