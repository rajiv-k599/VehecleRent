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
               <h4>Registered Users</h4>
             </div>
             <div class="card-body">
               <div class="table-responsive">
               <table class="table table-bordered table-xl">
                   <thead>
                     <tr>
                       <th>#</th>
                         <th>Name</th>
                         <th>Email</th>                   
                        
                         <th>Address</th>
                         <th>Phone no</th>   
                         <th>Posting</th>
                                             
                     </tr>
                   </thead>
                   <body>
                     <?php $count=1 ?>
                     @foreach($view as $v)
                       <tr>
                         <td>{{$count++}}</td>
                           <td>{{$v->name}}</td>
                           <td>{{$v->email}}</td>
                           <td>{{$v->address}}</td>
                           <td>{{$v->number}}</td>
                           <td>{{$v->created_at}}</td>
                           
                           
                       </tr>
                       @endforeach
                   </body>
               </table>
               </div>
             </div>
           </div>
</div>

@endsection
