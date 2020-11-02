@extends('layouts.app')

@section('content')
    {{--    @include('inc.feedback')--}}
    <table class="table">
        <thead class="table-dark">
        <th>Image</th>
        <th>Name</th>
        <th>Permissions</th>
        <th>Delete</th>
        </thead>

        <tbody>
        @if(count($users) > 0)
            @foreach($users as $user)
                <tr>

                <td>
                    <img src="{{ $user->profile->avatar}}" alt="Avatar" width="60px" height="60px" style="border-radius: 50%">
                </td>

                <td>
                    {{$user->name}}
                </td>

                <td>
                    @if($user->admin)
                        <a href="{{route('user.revoke',$user->id)}}" class="btn btn-sm btn-danger">Revoke Admin</a>
                    @else
                        <a href="{{route('user.admin',$user->id)}}" class="btn btn-sm btn-success">Make Admin</a>
                    @endif

                </td>

                    <td>
                        @if(auth()->user()->id == $user->id)
                            <button type="button" class="btn btn-sm btn-block" disabled>You can not delete your self</button>
                        @else
                        <form action="{{route('user.destroy',$user->id)}}" method="post">
                            @csrf
                            @method('delete')
                        <button type="submit" class="btn btn-sm btn-dark">Delete</button>
                        </form>
                    </td>
                    @endif
                </tr>
            @endforeach
        @else
            <tr >
                <td colspan="4" class="text-center"><h2>There Are No Users Yet</h2></td>
            </tr>
        @endif
        </tbody>
    </table>
@endsection
