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
                     @foreach($pending as $new)
                       <tr>
                           <td>{{ $new->name }}</td>
                           <td>{{ $new->bookingNumber }}</td>
                           <td>{{ $new->Vname }}</td>
                           <td>{{ $new->FromDate }}</td>
                           <td>{{ $new->ToDate }}</td>
                           <td><?php if($new->status==0){
                                echo 'Pending';
                                }elseif ($new->status==1) {
                                    echo 'Confirmed';
                                } else {
                                  echo 'Canceled';
                                }
                                ?></td>
                           <td>{{ $new->created_at }}</td>
                           <td><a href='{{route('view',$new->Bid)}}'>View</a></td>
                       </tr>
                       @endforeach
                   </body>
               </table>
               </div>
             </div>
           </div>
</div>

@endsection
