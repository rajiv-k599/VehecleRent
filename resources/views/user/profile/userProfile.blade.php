@extends('shared.layout_2')
@section('dashboard')
<link href="{{ asset('css/profile.css') }}" rel="stylesheet">
<div class="ps-2 pt-2 mt-2 h"><h3 class="text-uppercase f1">My profile</h3></div>
<section class="container-fluid p-5">
    <div class="row ">

        <div class="col-12 col-lg-3 border-bottom border-dark">
            <h3 class="title border-bottom border-dark">Profile Setting</h3>
            <Ul class="menu" style="list-style: none">
                <a href="{{route('profile')}}" style="text-decoration: none; color:rgb(255, 255, 255);"><li>Profile</li></a>
                <a href="{{route('update_profile')}}"  style="text-decoration: none; color:rgb(255, 255, 255);"><li>Update Profile</li></a>
                <a href="{{route('update_password')}}"  style="text-decoration: none; color:rgb(255, 255, 255);"><li>Update Password</li></a>
                <a href="{{route('report')}}" style="text-decoration: none; color:rgb(255, 255, 255);"><li>My Booking</li></a>
                <a class="" href="{{ route('user.logout') }}"  onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();"  style="text-decoration: none; color:rgb(255, 255, 255);"><li>logout </li></a>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                    @csrf
                    </form>
               
            </Ul>
        </div>
        <div class="col-12 col-lg-8 b1">
            @yield('profile')
            
        </div>

    </div>

</section>
@endsection