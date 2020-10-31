@extends('layouts.app')

@section('content')
{{--    @include('inc.feedback')--}}
    <table class="table">
        <thead class="table-dark">
        <th>Category name</th>
        <th>Editing</th>
        <th>Deleting</th>
        </thead>

        <tbody>
                @if(count($categories) > 0)
                        @foreach($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>


                                <td>
                                    <a class="btn btn-info" href="{{route('category.edit',$category->id)}}" >Edit</a>

                                </td>


                                <td>
                                <form action="{{route('category.destroy',$category->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn btn-danger" type="submit" >Delete</button>
                                </form>
                                </td>

                            </tr>
                        @endforeach
                @else
                    <tr >
                        <td colspan="3" class="text-center"><h2>There Are No Categories Yet</h2></td>
                    </tr>
                    @endif
        </tbody>
    </table>
@endsection
