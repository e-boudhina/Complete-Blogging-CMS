@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Updating post
        </div>
        <div class="card-body">
            @include('inc.feedback')
            <form action="{{route('post.update',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('patch')
                <div class="form-group">
                    <label for="category"> Select Category : </label>
                    <select class="form-control" name="category_id" id="category" >
                        <option selected value disabled > -- select an option -- </option>

                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{ $category->id == $post->category_id  ? 'selected':''}}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="title">Title : </label>
                    <input type="text" name="title" class="form-control" placeholder="Title" id="title" value="{{ old('title')? old('title'):$post->title }}">
                </div>

                <div class="form-group">
                    <label for="image">Featured image : </label>
                    <input type="file" name="featured" class="form-control" id="image" value="{{ old('featured')? old('featured'):$post->title }}">

                </div>

                <div class="form-group">
                    <label for="tags">Select tags :</label>
                    @foreach($tags as $tag)
                        <div class="form-check">
                            <label class="form-check-label">
                                <input class="form-check-input" type="checkbox"  name="tags[]" value="{{$tag->id}}"
{{--                                       checking if one of the post's tag is the same as the current tag, if the id is the same then market as as cheked--}}
                                        @foreach($post->tags as $t)
                                                @if($tag->id == $t->id)
                                                    checked
                                                    @endif
                                        @endforeach
                                >{{$tag->name}}
                            </label>
                        </div>
                    @endforeach
                </div>

                <div class="form-group">
                    <label for="content">Content : </label>
                    <textarea type="text" name="content" class="form-control" placeholder="Text" id="content">{{ old('content')? old('content'):$post->content }}</textarea>
                </div>


                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" >Store Post</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
