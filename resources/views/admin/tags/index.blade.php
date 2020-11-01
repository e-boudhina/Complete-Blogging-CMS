@extends('layouts.app')

@section('content')
    {{--    @include('inc.feedback')--}}
    <table class="table">
        <thead class="table-dark">
        <th>Tag name</th>
        <th>Editing</th>
        <th>Deleting</th>
        </thead>

        <tbody>
        @if(count($tags) > 0)
            @foreach($tags as $tag)
                <tr>
                    <td>{{$tag->name}}</td>

                    <td>
                        <a class="btn btn-info" href="{{route('tag.edit',$tag->id)}}" >Edit</a>

                    </td>


                    <td>
                        <form action="{{route('tag.destroy',$tag->id)}}" method="post">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger" type="submit" >Delete</button>
                        </form>
                    </td>

                </tr>
            @endforeach
        @else
            <tr >
                <td colspan="3" class="text-center"><h2>There Are No tags Yet</h2></td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
