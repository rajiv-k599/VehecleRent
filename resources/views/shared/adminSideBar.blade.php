<div class="vertical-nav " id="sidebar">
 <p class="text-gray font-weight-bold text-uppercase px-5 small mt-3 "><u>Main menu</u></p>
 <ul class="nav flex-column bg-dark mb-0" >
   <li class="nav-item">
     <a href="{{ route('admin.dashboard') }}" class="nav-link "> Dashboard</a>
   </li>
   <li class="nav-item">
     <a href="#" class="nav-link dropdown-toggle" id="navbarDropdown" data-toggle="dropdown">Brand</a>
     <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="background-color: #424949;">
          <a class="dropdown-item" href="{{ route('admin.brand') }}" >Add Brand</a>
          <a class="dropdown-item" href="{{ route('admin.brandmanager') }}">Manage Brand</a>
        </div>
   </li>
   <li class="nav-item">
     <a class="nav-link dropdown-toggle" id="navbarDropdown2" data-toggle="dropdown">Vehicle

     </a>
     <div class="dropdown-menu" aria-labelledby="navbarDropdown2" style="background-color: #424949;">
          <a class="dropdown-item" href="{{ route('vehicle') }}">Post Vehicle</a>
          <a class="dropdown-item" href="{{ route('vehiclemanager') }} ">Manage Vehicle</a>
        </div>
   <li class="nav-item">
     <a class="nav-link dropdown-toggle" id="navbarDropdown3" data-toggle="dropdown">Manage Booking</a>
     <div class="dropdown-menu" aria-labelledby="navbarDropdown3" style="background-color: #424949;">
      <a class="dropdown-item" href="{{route('new')}}">New</a>
      <a class="dropdown-item" href="{{route('booked')}}">Confirmed</a>
      <a class="dropdown-item" href="{{route('canceled')}}">Canceled</a>

    </div>
   </li>
    <li class="nav-item">
     <a href="{{route('registerUser')}}" class="nav-link "> Register user</a>
   </li>

    <li class="nav-item">
     <a href="{{route('admin_profile')}}" class="nav-link">Profile </a>
   </li>
    <li class="nav-item">
      @if(Auth::guard('admin')->check())
      <a href="{{ route('admin.logout') }}" class="nav-link">Logout</a>
    @endif
     
   </li>
 </ul>
</div>
  <script type="text/javascript" src="{{ asset('js/jquery.js')}}"></script>
<script type="text/javascript">
$('.sub-btn').click(function(){
  $('.sub-menu').toggleClass('show');
   $('nav ul .first').toggleClass("rotate");
})

</script>
