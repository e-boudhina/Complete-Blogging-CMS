@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Create new tag
        </div>
        <div class="card-body">
            @include('inc.feedback')
            <form action="{{route('user.store')}}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="name">User : </label>
                    <input type="text" name="name" class="form-control" placeholder="Name" id="name" >
                </div>

                <div class="form-group">
                    <label for="name">E-mail: </label>
                    <input type="email" name="email" class="form-control" placeholder="E-mail" id="name" >
                </div>


                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" >Store user</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
