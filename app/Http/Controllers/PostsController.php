<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
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
        $tags = Tag::all();
        if ($categories->count()>0 && $tags->count() > 0)
        {
            return view('admin.posts.create')
                ->with('categories',$categories)
                ->with('tags', $tags);
        }else{
            session()->flash('info', 'You Must First Create at Least One Category & One Tag Before Attempting to Create a Post');
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

      $post =  Post::create([
            'title'=>$request->title,
            'content'=> $request->content,
            'featured' =>$featured_new_name,
            'category_id' => $request->category_id,
            'slug'=>Str::slug($request->title),
          'tags' => 'required',
          'user_id' =>auth()->user()->id
        ]);

        //Using tags
        //the attach method can be used only when you have a pivot table that is set remember post_tag ?
        $post->tags()->attach($request->tags);
        session()->flash('success', 'Post created Successfully');
        return redirect(route('post.index'));

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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('admin.posts.edit')
            ->with('post',$post)
            ->with('categories',Category::all())
            ->with('tags', Tag::all());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        /*
         *  one thing I should mention, I always use Post $post as an argument for simplicity, it is easier, but not optimal
         *  you may ask the question why? well if we have a 1000 request and if in each request we fetch the post before checking validation rules,
         * this will waste time and use unnecessary resources what if the validations fail why would you fetch the post, each access to database takes time lets say 1ms per request
         * so what you have done is wait 1 s in 1000 request just like that, one way to resolve this is to use custom request : Myrequest $request where validation rules will be checked first,
         * or you simply use the $id as an argument and then after you validate you find that post using $post = find(îd)
        */
        $this->validate($request, [
            'title'=>'required',
            'content'=>'required',
            'category_id'=>'required',
            // or str_slug
        ]);

        //Check if user uploaded a new image
        if ($request->hasFile('featured')) {
            $featured = $request->file('featured');
            $featured_new_name = time() . $featured->getClientOriginalName();

            $featured->move('upload/posts',$featured_new_name);

//            File::delete($post->featured);

            //changing name
            $post->featured = $featured_new_name;

        }
        // This will always gets executed
            $post->title = $request->title;
            $post->content = $request->content;
            $post->category_id = $request->category_id;
            $post->save();

            //After saving the post the tags since they are linked using a relation ship are not saved
            $post->tags()->sync($request->tags); // sync will delete the previous tags and add the new ones using the pivot table
            session()->flash('success', 'Post Updated Successfully');
            return redirect(route('post.index'));
    }


    public function trashed()
    {
//        dd('here');
        $posts = Post::onlyTrashed()->get(); // when you use Trashed() with no get you will the builder and not result it self that is why you need to use get();
        //Delete trashed the the object first since we are using softDelete
        return view('admin.posts.trashed')->with('posts',$posts);
    }

    // Here you cant use Post $post since that will return posts that are not trashed so you'll have to manually code that
    public function restore($id)
    {
//        dd($id);
     $post = Post::onlyTrashed()->where('id',$id)->firstOrFail();
        $post->restore();
        session()->flash('success', 'Post Restored Successfully');
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
        // we always return a collection or builder that is why we need to use get()
        $post = Post::withTrashed()->where('id',$id)->firstOrFail();
        // If trashed then we like to force deleted
        if ($post->trashed())
        {
//            dd($post->featured);
            //deleting the image still not working
            File::delete($post->featured);
            $post->forceDelete();


            session()->flash('success', 'Post Permanently Deleted');
            // if the request is coming from trash or first time delete then trash
        }else
        {
            $post->delete();
            session()->flash('success', 'Post Trashed Successfully');

        }
        //Delete trashed the the object first since we are using softDelete
        return redirect()->back();
    }




}
