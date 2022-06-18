@extends('user.profile.userProfile')
@section('profile')
<link href="{{ asset('css/profile_info.css') }}" rel="stylesheet">
<h3 class="border-bottom p-3">General Information</h3>
<ul class="list1" style="list-style: none">
<li><span class="indicator">Name :</span> <br> {{ Auth::User()->name }}</span></li>
<li><span class="indicator">Email:</span> <br>  {{ Auth::User()->email }}</span></li>
<li><span class="indicator">Phone No:</span> <br>  {{ Auth::User()->number }}</span></li>
<li><span class="indicator">Address:</span> <br> {{ Auth::User()->address }}</span></li>
</ul>
@endsection