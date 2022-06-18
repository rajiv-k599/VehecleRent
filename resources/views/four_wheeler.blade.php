@extends('shared.layout_2')
@section('dashboard')
<section>
  <link href="{{ asset('css/userHome.css') }}" rel="stylesheet">
<div class=" pt-2 h"><h3 class="text-uppercase f1">Four Wheeler</h3></div>
 <section class="container-fluid p-4">
   <div class="row row-cols-1 row-cols-2 row-cols-4" id="content">


    @foreach($four as $r)
    <div class="col mb-4 bg-1 rounded">
      <div class="thumbnail pt-2 ps-2 pe-2">
        <img src="/vehicles/{{$r->img1}}" class="img-responsive w-100 img-resize" alt="vehicle">
      </div>
      <div class="list">
       <ul class="icon rounded">
         <li><i class="fa-solid fa-gas-pump"></i> {{$r->Fuel}}</li>
         <li><i class="fa-solid fa-calendar-days"></i>{{$r->Model}}</li>
         <li><i class="fa-solid fa-chair"> </i>{{$r->Capacity}} Seats</li>
         <li><i class="fa-solid fa-id-badge"> </i> {{$r->Bname}}</li>
       </ul>
      </div>
      <a href="{{route('vehicle_details',$r->Vid)}}">
      <div class="bottom d-flex justify-content-between ps-2 pe-2">
        <p id="name">{{$r->Vname}}</p>
        <p id="rate"><i class="fa-solid fa-brazilian-real-sign"></i><span>{{$r->Rate}}</span> per/day</p>
      </div>
    </a>
    </div>
    @endforeach
   </div>
    <span>
        {{$four->links()}}
      </span>
   </section>
  
  
  </section>
  @endsection