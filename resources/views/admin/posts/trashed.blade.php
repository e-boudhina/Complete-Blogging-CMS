@extends('layouts.app')

@section('content')
    {{--    @include('inc.feedback')--}}
    <table class="table">
        <thead class="table-dark">
        <th>Image</th>
        <th>Title</th>
        <th>Restore</th>
        <th>Delete</th>
        </thead>

        <tbody>
        @if(count($posts) > 0)
            @foreach($posts as $post)
                <tr>
                    <td><img src="{{$post->featured}}" alt="Post image" width="90px"height="50px"></td>
                    <td>{{$post->title}}</td>
                    <td>
                        <a class="btn btn-info" href="{{route('post.restore',$post->id)}}" >Restore</a>

                    </td>


                    <td>
                        <form action="{{route('post.destroy',$post->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit" >Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        @else
            <tr >
                <td colspan="4" class="text-center"><h2>There Are No Trashed Posts Yet</h2></td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
