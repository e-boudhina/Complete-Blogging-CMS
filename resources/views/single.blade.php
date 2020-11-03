@extends('layouts.frontend')

@section('content')

    <!-- Stunning Header -->

    <div class="stunning-header stunning-header-bg-lightviolet">
        <div class="stunning-header-content">
            <h1 class="stunning-header-title">{{$post->title}}</h1>
        </div>
    </div>



    <div class="container">
        <div class="row medium-padding120">
            <main class="main">
                <div class="col-lg-10 col-lg-offset-1">
                    <article class="hentry post post-standard-details">

                        <div class="post-thumb">
                            <img src="{{$post->featured}}" alt="{{$post->title}}">
                        </div>

                        <div class="post__content">


                            <div class="post-additional-info">

                                <div class="post__author author vcard">
                                    Posted by

                                    <div class="post__author-name fn">
                                        <a href="#" class="post__author-link">{{$post->user->name}}</a>
{{--                                        don't forget to add the relation sip $post->user->name--}}
                                    </div>

                                </div>

                                <span class="post__date">

                                <i class="seoicon-clock"></i>

                                <time class="published" datetime="2016-03-20 12:00:00">
                                               {{$post->created_at->toFormattedDateString() }}
                                </time>

                            </span>

                                <span class="category">
                                <i class="seoicon-tags"></i>
                                <a href="{{route('category.single',$post->category->id)}}">{{$post->category->name}}</a>

                            </span>

                            </div>

                            <div class="post__content-info">

                                {!! $post->content !!}
                                <div class="widget w-tags">
                                    <div class="tags-wrap">
                                        @foreach($post->tags as $tag)
                                        <a href="#" class="w-tags-item">{{$tag->name}}</a>
                                        @endforeach
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class=" text-center">
                         @include('inc.addthis')
                        </div>

                    </article>

                    <div class="blog-details-author">

                        <div class="blog-details-author-thumb">
                            <img src="{{$post->user->profile->avatar}}" alt="Author" width="80px" height="80px" style="border-radius: 50%">

                        </div>

                        <div class="blog-details-author-content">
                            <div class="author-info">
{{--                                relationship between admni and post--}}
                                <h5 class="author-name">{{$post->user->name}}</h5>
{{--                                <p class="author-info">SEO Specialist</p>--}}
                            </div>
                            <p class="text">{{$post->user->profile->about}}
                            </p>
                            <div class="socials">

                                <a href="{{$post->user->profile->facebook}}" class="social__item" target="_blank">
                                    <img src="{{asset('app/svg/circle-facebook.svg')}}" alt="facebook" >
                                </a>

{{--                                <a href="#" class="social__item">--}}
{{--                                    <img src="{{asset('app/svg/twitter.svg')}}" alt="twitter">--}}
{{--                                </a>--}}

{{--                                <a href="#" class="social__item">--}}
{{--                                    <img src="{{asset('app/svg/google.svg')}}" alt="google">--}}
{{--                                </a>--}}

                                <a href="{{$post->user->profile->youtube}}" class="social__item" target="_blank">
                                    <img src="{{asset('app/svg/youtube.svg')}}" alt="youtube">
                                </a>

                            </div>
                        </div>
                    </div>

                    <div class="pagination-arrow">


                        @if($next)
                        <a href="{{route('post.single',$next->slug)}}" class="btn-next-wrap">
                            <div class="btn-content">
                                <div class="btn-content-title">Next Post</div>
                                <p class="btn-content-subtitle">{{$next->title}}</p>
                            </div>
                            <svg class="btn-next">
                                <use xlink:href="#arrow-right"></use>
                            </svg>
                        </a>
                    @endif
                            @if($previous)
                                <a href="{{route('post.single',$previous->slug)}}" class="btn-prev-wrap">
                                    <svg class="btn-prev">
                                        <use xlink:href="#arrow-left"></use>
                                    </svg>
                                    <div class="btn-content">
                                        <div class="btn-content-title">Previous Post</div>
                                        <p class="btn-content-subtitle">{{$previous->title}}</p>
                                    </div>
                                </a>
                            @endif
                    </div>

                    <div class="comments">

                        <div class="heading text-center">
                            <h4 class="h1 heading-title">Comments</h4>
                            <div class="heading-line">
                                <span class="short-line"></span>
                                <span class="long-line"></span>
                            </div>
                        </div>
                    </div>
{{--                        Injecting discus--}}

                    @include('inc.disqus')



                </div>

                <!-- End Post Details -->

                <!-- Sidebar-->

                <div class="col-lg-12">
                    <aside aria-label="sidebar" class="sidebar sidebar-right">
                        <div  class="widget w-tags">
                            <div class="heading text-center">
                                <h4 class="heading-title">ALL BLOG TAGS</h4>
                                <div class="heading-line">
                                    <span class="short-line"></span>
                                    <span class="long-line"></span>
                                </div>
                            </div>

                            <div class="tags-wrap">
                                @foreach($tags as $tag)
                                <a href="{{route('tag.single',$tag->id)}}" class="w-tags-item">{{$tag->name}}</a>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                </div>

                <!-- End Sidebar-->

            </main>
        </div>
    </div>


@endsection
