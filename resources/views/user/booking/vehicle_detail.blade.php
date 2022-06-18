@extends('shared.layout')
@section('dashboard')
<link href="{{ asset('css/vehicleDetails.css') }}" rel="stylesheet">
<div class="ms-3 pt-2"><h3 class="text-uppercase">My profile</h3></div>
<section class="container-fluid border p-5">
    <div class="row ">
        <div class="col-8 border ps-5 ">
            <div class="col-sm">
            <div id="demo" class="carousel slide" data-bs-ride="carousel">
                <!-- Indicators/dots -->
                <div class="carousel-indicators">
                  <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
                  <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
                  <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
                </div>               
                <!-- The slideshow/carousel -->
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="/vehicles/{{$result->img1}}" alt="Los Angeles" class="d-block img-responsive w-100 img-resize" style="">
                  </div>
                  <div class="carousel-item">
                    <img src="/vehicles/{{$result->img2}}" alt="Chicago" class="d-block" style="width:100%">
                  </div>
                  <div class="carousel-item">
                    <img src="/vehicles/{{$result->img3}}" alt="New York" class="d-block" style="width:100%">
                  </div>
                </div>              
                <!-- Left and right controls/icons -->
                <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
                  <span class="carousel-control-next-icon"></span>
                </button>
              </div>
            </div>
            {{-- Name and Price --}}
             <div class="d-flex justify-content-between bg">
                 <h3>{{$result->Vname}}</h3>
                 <p id="rate"><i class="fa-solid fa-brazilian-real-sign"></i><span>{{$result->Rate}}</span> per/day</p>
             </div>
             {{-- Details --}}
             <div class="container mt-0">
              <h2></h2>
              <br>
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active" data-bs-toggle="tab" href="#home">Details</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" data-bs-toggle="tab" href="#menu1">Overview</a>
                </li>
               
              </ul>
            
              <!-- Tab panes -->
              <div class="tab-content">
                <div id="home" class="container tab-pane active"><br>
                  {{-- <h3>Details</h3> --}}
                  <p>Type: <?php if($result->Vtype==2){
                                     echo "Two Wheeler";
                              }else {
                                echo "Four Wheeler";
                              }
                  ?></p>
                  <p>Brand: {{$result->Bname}}</p>
                  <p>Model: {{$result->Model}}</p>
                  <p>Vehicle No: {{$result->Vno}}</p>
                  <p>Fuel: {{$result->Fuel}}</p>
                  <p>Capacity: {{$result->Capacity}}</p>
                  <p>Rate: {{$result->Rate}}</p>
                  

                </div>
                <div id="menu1" class="container tab-pane fade"><br>
                  {{-- <h3>Overview</h3> --}}
                  <p>{{$result->Overview}}</p>
                </div>
                
              </div>
            </div>       
    </div>
    
        <div class="col-4 border">
          <div>
            <h3><i class="fa-solid fa-envelope"></i> Book Now</h3>
          </div>
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
         
          <form action="{{route('booking')}}" method="post" >
           <input type="hidden" name="vid" id="" value="{{$result->Vid}}">
           <input type="hidden" name="id" id="" value="{{ Auth::User()->id }}">
            @csrf
            <div class="mb-3">
              <label for="" class="form-label">From Date</label>
              <input type="date" class="form-control" name="fromdate" id="fromdate" aria-describedby="helpId" placeholder="">
              {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
            </div>
            <div class="mb-3">
              <label for="" class="form-label">To Date</label>
              <input type="date" class="form-control" name="todate" id="todate" aria-describedby="helpId" placeholder="">
              {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
            </div>
            <div class="mb-3">
              <label for="" class="form-label"></label>
              <textarea class="form-control" name="message" id="message" rows="3" placeholder="Message"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Book Now</button>
          </form>

        </div>
    </div>
</section>


@endsection