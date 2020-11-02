<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/toastr.min.css') }}" rel="stylesheet">

{{--    Custom Styles--}}
    @yield('styles')

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                    <a class="dropdown-item" href="{{route('profile.index')}}">Profile</a>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row">
                    @if(auth()->check())
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item">
                                <a href="{{route('home')}}">Home</a>
                            </li>
                            @if(auth()->user()->admin)

                            <li class="list-group-item">
                                <a href="{{route('user.index')}}">Users</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('user.create')}}">Create new user</a>
                            </li>
                            @endif
                            <li class="list-group-item">
                                <a href="{{route('category.index')}}">Categories</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('category.create')}}">Create New Category</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('post.index')}}">Posts</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('post.trashed')}}">Trashed Posts</a>
                            </li>

                            <li class="list-group-item">
                                <a href="{{route('post.create')}}">Create New Post</a>
                            </li>


                            <li class="list-group-item">
                                <a href="{{route('tag.index')}}">Tags</a>
                            </li>
                            <li class="list-group-item">
                                <a href="{{route('tag.create')}}">Create New Tag</a>
                            </li>

                            @if(auth()->user()->admin)
                                <li class="list-group-item">
                                    <a href="{{route('settings.index')}}">Settings</a>
                                </li>
                            @endif

                        </ul>
                    </div>
                    @endif
                    <div class="col-md-8">
                        @yield('content')
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <script src="{{asset('js/toastr.min.js')}}"></script>
    <script>

        @if(session()->has('success'))
        toastr.success("{{session()->get('success')}}")
        @elseif(session()->has('info'))
        toastr.info("{{session()->get('info')}}")
        @elseif(session()->has('error'))
        toastr.error("{{session()->get('error')}}")
        @endif
    </script>

{{--  Custom Script Section--}}
@yield('scripts')

</body>
</html>
