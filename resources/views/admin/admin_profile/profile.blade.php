@extends('shared.AdminLayout')
@section('adminDashboard')

@if(session('profile'))
<div class="alert alert-success mt-2" role="alert">
  {{ session('profile')}}
</div>
@endif
<div class="container shadow p-4 mt-2 col-sm-7">
<form class="form" method="POST" enctype="multipart/form-data" action="{{route('admin_edit')}}">
    <input type="hidden" class="form-control" name="id" value="{{ Auth::guard('admin')->user()->id }}"/>
    @csrf
    <label class="form-label">Name:</label>
    <input type="text" class="form-control" name="name" value="{{ Auth::guard('admin')->user()->name }}"/>

    <label class="form-label">Email:</label>
    <input type="text" class="form-control" name="email" value="{{ Auth::guard('admin')->user()->email }}"/>
    <input type="submit" name="submit" class="btn btn-success mt-2" value="Save the Change" />
</form>
</div>

@if(session('password'))
<div class="alert alert-success" role="alert">
  {{ session('password')}}
</div>
@endif
<div class="container shadow p-4 mt-4 col-sm-7">
<form class="form" method="POST" action="{{route('admin_password')}}">
    <input type="hidden" class="form-control" name="id" value="{{ Auth::guard('admin')->user()->id }}"/>
    @csrf

    <div class="mb-2">
      <label for="" class="form-label">Current Password</label>
      <input type="password" class="form-control" name="current" id="current" placeholder="" required="">
      <input type="checkbox" onclick="showFunction()">Show Password
    </div>

    <div class="mb-2">
        <label for="" class="form-label">New Password</label>
        <input type="password" class="form-control" name="new" id="new" placeholder="" required="">
    </div>

    <div class="mb-2">
        <label for="" class="form-label">Conform Password</label>
        <input type="password" class="form-control" name="confirm" id="confirm" placeholder="" required="">
        <div id="Error"></div>
        <input type="checkbox" onclick="ConfirmshowFunction()">Show Password
      </div>
    <input type="submit" name="submit" class="btn btn-success" value="Update" />

</form>
</div>
<script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
<script src="{{asset('js/password.js')}}"></script>
@endsection