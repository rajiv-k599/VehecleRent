@extends('user.profile.userProfile')
@section('profile')
<link href="{{ asset('css/profile_info.css') }}" rel="stylesheet">
<h3 class="border-bottom p-3">Update Password</h3>
@if(session('message'))
<div class="alert alert-success" role="alert">
  {{ session('message')}}
</div>
@endif
@if(session('Error'))
<div class="alert alert-danger" role="alert">
  {{ session('Error')}}
</div>
@endif
<form class="form" method="POST" action="{{route('updatePassword')}}">
    <input type="hidden" class="form-control" name="id" value="{{ Auth::User()->id }}"/>
    @csrf

    <div class="mb-3">
      <label for="" class="form-label">Current Password</label>
      <input type="password" class="form-control" name="current" id="current" placeholder="" required="">
      <input type="checkbox" onclick="showFunction()">Show Password
    </div>

    <div class="mb-3">
        <label for="" class="form-label">New Password</label>
        <input type="password" class="form-control" name="new" id="new" placeholder="" required="">
    </div>

    <div class="mb-3">
        <label for="" class="form-label">Conform Password</label>
        <input type="password" class="form-control" name="confirm" id="confirm" placeholder="" required="">
        <div id="Error"></div>
        <input type="checkbox" onclick="ConfirmshowFunction()">Show Password
      </div>

  
    <input type="submit" name="submit" class="btn btn-success" value="Update" />

</form>
<script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
<script src="{{asset('js/password.js')}}"></script>
@endsection