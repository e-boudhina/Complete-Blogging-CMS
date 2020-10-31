@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Create new category
        </div>
        <div class="card-body">
            @include('inc.feedback')
            <form action="{{route('category.store')}}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="name">Name : </label>
                    <input type="text" name="name" class="form-control" placeholder="Name" id="name" >
                </div>




                <div class="form-group">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success" >Store Category</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
