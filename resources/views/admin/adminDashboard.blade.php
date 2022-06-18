@extends('shared.AdminLayout')
@section('adminDashboard')
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.8.0/chart.min.js"></script>
  <div class=" pt-5">
    <div class="container-fluid">
    <div class="row">
      <div class="col-sm-3 pe-2 pb-2">
          <div class="card c1">
            <div class="card-header pt-5 ">
              <p class="num">{{$reg_user}}</p>
              <p class="title">Reg User</p>
            </div>
            <div class="card-footer">
              <a href="{{route('register')}}" style="text-decoration: none; color:black;" >Full Details<i class="fa-solid fa-arrow-right ps-1"></i></a>
            
            </div>
          </div>
      </div>
      <div class="col-sm-3 pe-2 pb-2">
        <div class="card c2">
          <div class="card-header pt-5 ">
            <p class="num">{{$reg_brand}}</p>
            <p class="title">Listed Brands</p>
          </div>
          <div class="card-footer">
            <a href="{{route('admin.brandmanager')}}" style="text-decoration: none; color:black;" >Full Details<i class="fa-solid fa-arrow-right ps-1"></i></a>
          </div>
        </div>
      </div>
      <div class="col-sm-3 pe-2 pb-2">
        <div class="card c3 ">
          <div class="card-header pt-5 ">
            <p class="num">{{$reg_vehicle}}</p>
            <p class="title">Listed Vehicles</p>
          </div>
          <div class="card-footer">
            <a href="{{route('vehiclemanager')}}" style="text-decoration: none; color:black;" >Full Details<i class="fa-solid fa-arrow-right ps-1"></i></a>
          </div>
        </div>
      </div>

      <div class="col-sm-3 pe-2 pb-2">
        <div class="card c4 ">
          <div class="card-header pt-5 ">
            <p class="num">{{$booking}}</p>
            <p class="title">Total Booking</p>
          </div>
          <div class="card-footer">
            <a href="#" style="text-decoration: none; color:black;" >Full Details<i class="fa-solid fa-arrow-right ps-1"></i></a>
          </div>
        </div>
      </div>

    </div>
  </div>
  <div class="container-fluid">
    <div class="row pt-3">
      <div class="col-sm-3 pe-2 pb-2">
          <div class="card c1 " >
            <div class="card-header pt-5 ">
              <p class="num">{{$new}}</p>
              <p class="title">Pending</p>
            </div>
            <div class="card-footer">
              <a href="{{route('new')}}" style="text-decoration: none; color:black;" >Full Details<i class="fa-solid fa-arrow-right ps-1"></i></a>
            </div>
          </div>
      </div>
      <div class="col-sm-3 pe-2 pb-2">
        <div class="card c2">
          <div class="card-header pt-5 ">
            <p class="num">{{$confirmed}}</p>
            <p class="title">Confirmed Booking</p>
          </div>
          <div class="card-footer">
            <a href="{{route('booked')}}" style="text-decoration: none; color:black;" >Full Details<i class="fa-solid fa-arrow-right ps-1"></i></a>
          </div>
        </div>
      </div>
      <div class="col-sm-3 pe-2 pb-2 ">
        <div class="card c3 ">
          <div class="card-header pt-5 ">
            <p class="num">{{$cancelled}}</p>
            <p class="title">Canceled Booking</p>
          </div>
          <div class="card-footer">
            <a href="{{route('canceled')}}" style="text-decoration: none; color:black;" >Full Details<i class="fa-solid fa-arrow-right ps-1"></i></a>
          </div>
        </div>
      </div>

     
    </div>
    </div>
    
    <div  class="col-sm-4 chart-container" style="position: relative;  width:60vw; ">
      <canvas id="myChart" height="500" width="500" style="position: absolute;"></canvas>
    </div>
    

  
<script>
const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Pending', 'Confirmed', 'Cancelled',],
        datasets: [{
            label: '# of Votes',
            data: [{{$new1}}, {{$confirmed2}}, {{$cancelled2}},],
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)'
               
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            hoverOffset: 4
        }],
    },
    options:{
      responsive: false,
    },
   
});
</script>

    
  </div>
@endsection
