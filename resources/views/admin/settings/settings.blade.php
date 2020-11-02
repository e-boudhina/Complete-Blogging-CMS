@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            Edit Blog Global Settings
        </div>
        <div class="card-body">
            @include('inc.feedback')
            <form action="{{route('settings.update')}}" method="post" >
                @csrf
                <div class="form-group">
                    <label for="site_name">Site name : </label>
                    <input type="text" name="site_name" class="form-control" placeholder="Site Name" value="{{$settings->site_name}}" id="site_name" >
                </div>

                <div class="form-group">
                    <label for="address">Address : </label>
                    <input type="text" name="address" class="form-control" placeholder="Address" value="{{$settings->address}}" id="address" >
                </div>

                <div class="form-group">
                    <label for="phone">Contact Phone : </label>
                    <input type="text" name="contact_number" class="form-control" placeholder="Phone number" value="{{$settings->contact_number}}" id="phone" >
                </div>

                <div class="form-group">
                    <label for="email">Contact email: </label>
                    <input type="email" name="contact_email" class="form-control" placeholder="Email" value="{{$settings->contact_email}}" id="email" >
                </div>

                <div class="form-group">
                    <div class="text-center" style="width: 100%">
                        <button type="submit" class="btn btn-outline-dark" >Update Site Settings</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
