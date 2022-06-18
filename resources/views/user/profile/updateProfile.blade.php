@extends('user.profile.userProfile')
@section('profile')
<link href="{{ asset('css/profile_info.css') }}" rel="stylesheet">
<h3 class="border-bottom p-3">Update Profile</h3>
@if(session('message'))
<div class="alert alert-success" role="alert">
  {{ session('message')}}
</div>
@endif
<form class="form" method="POST" enctype="multipart/form-data" action="{{route('updateProfile')}}">
    <input type="hidden" class="form-control" name="id" value="{{ Auth::User()->id }}"/>
    @csrf
    <label class="form-label">Name:</label>
    <input type="text" class="form-control" name="name" value="{{ Auth::User()->name }}"/>

    <label class="form-label">Email:</label>
    <input type="text" class="form-control" name="email" value="{{ Auth::User()->email }}"/>

    <label class="form-label">Phone N0:</label>
    <input type="text" class="form-control" name="number" value="{{ Auth::User()->number }}"/>

    <label class="form-label">Address:</label>
    <input type="text" class="form-control" name="address" value="{{ Auth::User()->address }}"/>

    <input type="submit" name="submit" class="btn btn-success" value="Save the Change" />

</form>

@endsection