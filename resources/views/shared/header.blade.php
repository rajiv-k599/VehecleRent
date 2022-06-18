{{-- header top --}}
<link href="{{ asset('css/header.css') }}" rel="stylesheet">
<div class="">
    <div class="default-header">
      <div class="d-flex">
       
            <div class="me-auto">
                <a class="d-flex navbar-brand" href="{{route('home')}}">
                   <img src="/logo/logo.png" class="img-responsive" alt="Logo" style="width:80px;">
                   <div class="text">
                     <h1 style="font-size: 3vw;">VEHICLE RENTAL SERVICE</h1>
                   </div>
                </a>
              </div>
          <div class="pt-3 pb-2 me-3 d-flex ">
            @guest
               <div class="me-3">
                   <a href="{{ route('login') }}" class="btn btn-success">Login</a>
              </div>
              <div class="pl-4">
                  <a href="{{ route('register') }}" class="btn btn-info ">Register</a>
              </div>
              @endguest
              @auth
                  <div class="pe-4">
                         <h4 style="color: rgb(68, 128, 238)">Welcome to portal, <span style="color: rgb(3, 193, 3)"> {{ Auth::user()->name }}</span></h4>
                  </div>
              @endauth

          </div>
       </div>
 
   </div>
</div>
{{-- header-top end  --}}
{{-- user nav start --}}
<nav class="navbar navbar-expand-sm bg-dark">

       <button id="menu_slide" data-bs-target="#navigation" data-bs-toggle="collapse"
               class="navbar-toggler" type="button">
               <i class="fa-solid fa-sliders" style="color: aliceblue"></i>
       </button>
         <div class="collapse navbar-collapse" id="navigation">
            <ul class="navbar-nav me-auto pb-1 n1" >
                <li class="nav-item" ><a class="nav-link" style="color: aliceblue" href="{{route('home')}}">Home</a>  </li>
                <li class="nav-item"><a class="nav-link" style="color: aliceblue" href="{{route('two')}}">Two Wheeler</a></li>
                <li class="nav-item"><a class="nav-link" style="color: aliceblue" href="{{route('four')}}">Four Wheeler</a>
                <li class="nav-item"><a class="nav-link" style="color: aliceblue" href="{{route('report')}}">My Booking</a></li>
                <li class="nav-item"><a class="nav-link" style="color: aliceblue" href="#">Contact Us</a></li>
            </ul>
        
    
      
        <ul class="navbar-nav">
          <li class="nav-item">
          <div class="nav-item dropdown me-2">
              <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" data-bs-toggle="tooltip" title="Plz login..." style="color:white;">
                <i class="fa-solid fa-user i1" style="color:rgb(251, 251, 251)"></i>
                   <span class="ps-1" style="font-size:20px;">
                       @auth
                     {{ Auth::user()->name }}</span>
                       @endauth
              </a>
                @auth
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="{{route("profile")}}">Profile</a>
                  <a class="dropdown-item" href="{{route('update_profile')}}">Update Profile</a>
                  <a class="dropdown-item" href="{{route('update_password')}}">Update Password</a>
                  <a class="dropdown-item"  href="{{route('report')}}">My Booking</a>
                  <a class="dropdown-item" href="{{ route('user.logout') }}"  onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">logout</a>
                  <form id="logout-form" action="{{ route('user.logout') }}" method="POST" class="d-none">
                      @csrf
                  </form>
                </div>
              @endauth

         </div>
          </li>
          <li class="">
            @auth
            <a class="nav-link dropdown-toggle" href="#" id="message" data-toggle="dropdown" style="color:white;">
              <i class="fa-solid fa-bell" style="color:rgb(251, 251, 251)" class="pt-1"><sup class="badge" style="color:rgb(255, 51, 51)"><?php if(!empty(count(auth()->User()->unreadNotifications))){
                echo count(auth()->User()->unreadNotifications);
              } ?></sup></i>
            </a>
            

            <ul class="dropdown-menu" >
              @foreach(auth()->user()->unreadNotifications as $notification)

              <li class="dropdown-item" id='MarkAsRead' onclick='MarkAsRead()'>
                <h5>{{$notification->data['name']}}</h5>
                <p>{{$notification->data['status']}}</p>
              </li>
              @endforeach
             
            </ul>
            @endauth
          </li>
         <li>
          <form class="form d-flex"  action="{{ route('search')}}" method="post"> 
            @csrf                   
                <input type="text" name='search' id='search' class="form-control me-1">                     
                <button type="submit" class="btn btn-primary">Go!</button>
            </form>
            <div class="auto-com" >
              <ul id="list" class="list-group">

              </ul>
                {{-- <li><img src='' alt='img' style="width:60px;" ><strong class="ps-2">Name</strong></li> --}}
                
            
            </div>
          </li>
          </div>
        </ul>
    </div>
</nav>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script>
  function MarkAsRead(){
    
    document.location.href='{{route('mark')}}';
  }
  $(document).ready(function(){
    $("#search").keyup(function(){
      var val=$("#search").val();
      console.log(val);
      $('#list').html('');

      $.ajaxSetup({
          headers: {
                   'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                   }
                 });

         $.ajax({
             type:'POST',
             url:'{{route('autosearch')}}',
             data:{type:val,'_token': '{{csrf_token()}}'},
             success:function(data){
             
             // if(data.length>0){
              for(i=0;i<data.length;i++){
              $('#list').append('<a href="/user/vehicle_details/'+data[i]['Vid']+'"><li class="list-group-item"><img src="/vehicles/'+data[i]['img1']+'" style="width:40px;" ><strong class="ps-1">'+data[i]['Vname']+'</strong></li></a>');
              //$('#list').html(data);
            }
            }         
               // $('#list').html($li); 
         // }
       });

    });

  });
</script>
{{-- User nav end --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
