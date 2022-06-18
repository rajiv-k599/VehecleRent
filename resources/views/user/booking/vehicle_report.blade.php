@extends('user.profile.userProfile')

@section('profile')
<link href="{{ asset('css/report_info.css') }}" rel="stylesheet">
<h3 class="border-bottom p-3">My Booking</h3>
@if(session('message'))
<div class="alert alert-success" role="alert">
  {{ session('message')}}
</div>
@endif

<div class="myVehicle">
  <?php $c=1; ?>
  @foreach ($report as $reports)
      
 
<div class="border-bottom pb-4">
  <div id="part{{$c}}" class="r1">
    <h4>Booking No: <span style="color: rgb(255, 11, 11)">{{$reports->bookingNumber}}</span></h4>
    <div class="d-flex border-bottom p-2">
      <div class="col-2"><img src="/vehicles/{{$reports->img1}}" class="img-fluid rounded border float-start img1" alt="vehicle" style=""> </div>
      <div class="col-6 ps-3">
        <h5>{{$reports->Vname}}</h5>
        <p><b>By :</b>{{$reports->name}}</p>
        <p><b>From</b> {{$reports->FromDate}} <b>To</b> {{$reports->ToDate}}</p>
        <div><p><b>Message:</b> {{$reports->message}}</p> </div>

      </div>
     <div class="col-2"><p> <?php if($reports->status==0){
                            echo '<span id="p">Pending</span>';
                             }elseif ($reports->status==1) {
                                echo '<span id="c">Confirmed</span>';
                             } else {
                               echo '<span id="rej">Cancelled</span>';
                             }
   ?></p></div>
   </div>
   <h4 style="color: brown">INVOICE</h4>
   <table class="table table-bordered border-primary">
    
    <tbody>
      <tr>
        <td class="table-active">Venhicle Name</td>
        <td class="table-active">From Date</td>
        <td class="table-active">To Date</td>
        <td class="table-active">Total Days</td>
        <td class="table-active">Rent/Day</td>
        
      </tr>
      <tr>
        <td>{{$reports->Vname}}</td>
        <td>{{$reports->FromDate}}</td>
        <td>{{$reports->ToDate}}</td>
        <?php
            //   $from_date = $request->Fdate;
            //   $to_date = $request->Tdate;
               $first_datetime = new DateTime($reports->FromDate);
               $last_datetime = new DateTime($reports->ToDate);
              $interval = $first_datetime->diff($last_datetime);
              $final_days = $interval->format('%a')+1;
             
            ?>
        <td>{{ $final_days}}</td>
        <td>{{$reports->Rate}}</td>
      </tr>
      <tr>
        <td colspan="4" class="table-active">Grant Total</td>
       
        <td>{{$final_days*$reports->Rate}}</td>
      </tr>
    </tbody>
  </table>

</div>
<button onclick="printContent('part{{$c}}')" class="btn btn-info">Print</button>

</div>
<?php $c++; ?>
@endforeach


</div>
<span>
  {{$report->links()}}
</span>

@endsection
<script>
  function printContent(el){
    var restorepage=document.body.innerHTML;
    var printContent=document.getElementById(el).innerHTML;
    document.body.innerHTML=printContent;
    window.print();
    document.body.innerHTML=restorepage;
  }
</script>