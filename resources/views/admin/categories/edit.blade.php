@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Update category
        </div>
        <div class="card-body">
            <form action="{{route('category.update',$category->id)}}" method="post" >
                @csrf
                @method('put')
                <div class="form-group">
                    <label for="name">New Name : </label>
                    <input type="text" name="name" value="{{$category->name}}" class="form-control" placeholder="Name" id="name" autofocus>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" >Update Category</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
