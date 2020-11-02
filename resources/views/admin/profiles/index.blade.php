@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
           Edit profile
        </div>
        <div class="card-body">
            @include('inc.feedback')
{{--            {{dd($user)}}--}}
            <form action="{{route('profile.update',$user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Username : </label>
                    <input type="text" name="name" class="form-control" placeholder="Name" id="name" value="{{$user->name}}">
                </div>

                <div class="form-group">
                    <label for="name">E-mail: </label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail" id="name" value="{{$user->email}}" >
                </div>

                <div class="form-group">
                    <label for="password">New password : </label>
                    <input type="password" name="password" class="form-control" placeholder="Password" id="password" value="{{$user->password}}">
                </div>

                <div class="form-group">
                    <label for="avatar">Upload new avatar : </label>
                    <input type="file" name="avatar" class="form-control" placeholder="avatar" id="avatar" >
                </div>

                <div class="form-group">
                    <label for="facebook">Facebook link : </label>
                    <input type="text" name="facebook" class="form-control" placeholder="Facebook" id="facebook" value="{{$user->profile->facebook}}">
                </div>

                <div class="form-group">
                    <label for="youtube">Youtube link : </label>
                    <input type="text" name="youtube" class="form-control" placeholder="Youtube" id="youtube" value="{{$user->profile->youtube}}">
                </div>

                <div class="form-group">
                    <label for="about">About : </label>
                    <textarea cols="6" rows="6" type="text" name="about" class="form-control" placeholder="About me" id="about" >{{$user->profile->about}}</textarea>
                </div>




                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" >Update profile</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
