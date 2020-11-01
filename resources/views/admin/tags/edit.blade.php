@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Update tag
        </div>
        <div class="card-body">
            @include('inc.feedback')
            <form action="{{route('tag.update',$tag->id)}}" method="post" >
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">Name : </label>
                    <input type="text" name="name" class="form-control" placeholder="Name" id="name" value="{{old('name')? old('name'): $tag->name}}">
                </div>




                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" >Store tag</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
