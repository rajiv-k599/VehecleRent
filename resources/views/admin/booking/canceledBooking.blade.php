@extends('shared.AdminLayout')
@section('adminDashboard')

<div class="col-lg-12 pt-5">
    @if(session('message'))
        <div class="alert alert-success" role="alert">
          {{ session('message')}}
        </div>
      @endif
           <div class="card">
             <div class="card-header d-flex align-items-center">
               <h4>New Booking</h4>
             </div>
             <div class="card-body">
               <div class="table-responsive">
               <table class="table table-bordered table-xl">
                   <thead>
                     <tr>
                         <th>Name</th>
                         <th>Booking No</th>                   
                         <th>Vehicle</th>
                         <th>FromDate</th>
                         <th>ToDate</th>
                         <th>Status</th>
                         <th>Posting</th>
                         <th>Action</th>                        
                     </tr>
                   </thead>
                   <body>
                     @foreach($canceled as $canceled)
                       <tr>
                           <td>{{ $canceled->name }}</td>
                           <td>{{ $canceled->bookingNumber }}</td>
                           <td>{{ $canceled->Vname }}</td>
                           <td>{{ $canceled->FromDate }}</td>
                           <td>{{ $canceled->ToDate }}</td>
                           <td><?php if($canceled->status==0){
                            echo 'Pending';
                             }elseif ($canceled->status==1) {
                                echo 'Confirmed';
                             } else {
                               echo 'Canceled';
                             }
   ?></td>
                           <td>{{ $canceled->created_at }}</td>
                           <td><a href='{{route('details',$canceled->Bid)}}'>View</a></td>
                       </tr>
                       @endforeach
                   </body>
               </table>
               </div>
             </div>
           </div>
</div>

@endsection
