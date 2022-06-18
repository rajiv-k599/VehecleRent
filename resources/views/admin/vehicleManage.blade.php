@extends('shared.AdminLayout')
@section('adminDashboard')
<link href="{{ asset('css/vehicleManage.css') }}" rel="stylesheet">
  <div class="col-lg-12 pt-5">
    @if(session('message'))
        <div class="alert alert-success" role="alert">
          {{ session('message')}}
        </div>
      @endif
           <div class="card">
             <div class="card-header d-flex align-items-center">
               <h4>Manage Vehicle</h4>
             </div>
             <div class="card-body">
               <div class="table-responsive">
               <table class="table table-bordered table-xl">
                   <thead>
                     <tr>
                       <th>Name</th>
                       <th>Modal</th>
                       <th>Type</th>
                        <th>Brand</th>
                         <th>Vehicle No</th>
                         <th>Fuel</th>
                         <th>Capacity</th>
                         <th>Rate</th>
                         <th>Overview</th>
                         <th>Images</th>
                         <th>Action</th>


                     </tr>
                   </thead>
                   <tbody>
                       @foreach($result as $r)
                           <tr>
                             <td>{{$r->Vname}}</td>
                             <td>{{$r->Model}}</td>
                             <td><?php if($r->Vtype==2){
                                           echo "Two wheeler";
                                         }
                                           else {
                                             echo "Four Wheeler";
                                           }
                             ?></td>
                             <td>{{$r->Bname}}</td>
                             <td>{{$r->Vno}}</td>
                             <td>{{$r->Fuel}}</td>
                             <td>{{$r->Capacity}}</td>
                             <td>{{$r->Rate}}</td>
                             <td style=""><div class="a">{{$r->Overview}}</div></td>
                             <td>
                              <a href="#" class="i1"> <img class="img-responsive" src="{{asset('vehicles/'.$r->img1)}}" width="40" height="40" ></a>
                              <a href="#" class="i2"> <img class="img-responsive" src="{{asset('vehicles/'.$r->img2)}}" width="40" height="40" ></a>                            
                              <a href="#" class="i3"> <img class="img-responsive" src="{{asset('vehicles/'.$r->img3)}}" width="40" height="40" ></a>
                              </td>
                              {{-- data-bs-toggle="modal" data-bs-target="#image" onclick="viewImage('{{$r->img1}}')" --}}

                          <td><a class="btn btn-primary btn-sm" value="" onclick="viewVehicle('{{$r->Vid}}','{{$r->Vtype}}','{{$r->id}}','{{$r->Vname}}','{{$r->Model}}','{{$r->Vno}}',
                                        '{{$r->Fuel}}','{{$r->Capacity}}','{{$r->Rate}}','{{$r->Overview}}',
                                        '{{$r->img1}}','{{$r->img2}}','{{$r->img3}}')" id='editBrand' data-bs-toggle="modal" data-bs-target="#updateModal">
                                        <i class='fas fa-edit'></i>
                                </a>
                                <a href="{{route('deletevehicle',$r->Vid)}}" class="btn btn-danger btn-sm">
                                            <i class='far fa-trash-alt'></i>
                                </a>
                              </td>
                           </tr>
                            @endforeach
                   </tbody>
                 </table>
                </div>
                
               <!-- Modal -->

             </div>
           </div>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript">

    function viewVehicle(vid,Vtype,Bname,Vname,Model,Vno,Fuel,Capacity,Rate,Overview,img1,img2,img3){
      $("#Vid").val(vid);
        $("#eVtype").val(Vtype);
          $("#Brand").val(Bname);
          $("#Vname").val(Vname);
          $("#Model").val(Model);
          $("#Vno").val(Vno);
          $("#Fuel").val(Fuel);
          $("#Capacity").val(Capacity);
          $("#Rate").val(Rate);
          $("#Overview").val(Overview);
         console.log(vid,img1,img2,img3);
        document.getElementById("image1").innerHTML = '<input type="file" class="form-control" id="img1" name="img1" value="'+img1+'"><img src="/vehicles/'+img1+'" alt="" width="40" height="40">';
        document.getElementById("image2").innerHTML = '<input type="file" class="form-control" id="img2" name="img2" value="'+img2+'"><img src="/vehicles/'+img2+'" alt="" width="40" height="40">';
        document.getElementById("image3").innerHTML = '<input type="file" class="form-control" id="img3" name="img3" value="'+img3+'"><img src="/vehicles/'+img3+'" alt="" width="40" height="40">';
      }
 
  
  $(function() {
    $('.i1,.i2,.i3').on('click', function() {
      console.log("image");
        $('.imagepreview').attr('src', $(this).find('img').attr('src'));
        $('#image').modal('show');   
    });     
});

  </script>


<script src=""></script>

    <script type="text/javascript">
    $(document).ready(function(){
      $("#eVtype").on('change',function(){

          var type=$(this).val();


          console.log(type);

       $.ajaxSetup({
        headers: {
                 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                 }
               });
       $.ajax({
           type:'POST',
           url:'{{route('brandtype')}}',
           data:{Vtype:type},
           success:function(data){
                          jQuery('#Brand').html(data)

                              console.log(data);


                            }
                          });
    });

     $.ajaxSetup({
      headers: {
               'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
               }
             });
     $.ajax({
         type:'get',
         url:'{{route('brandtypeall')}}',
         success:function(data){
                        jQuery('#Brand').html(data)

                            console.log(data);


                          }
                        });
  });



    </script>

@endsection


<div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{route('updatevehicle')}}">
            @csrf
             <input type="hidden" id="Vid" name="Vid" value="">

             <div class="row">
               <div class="col-md-6">
                 <label for="vtype" class="form-label">Vehicle Type:</label>
                 <select class="form-control" aria-label="Default select example" id="eVtype" name="eVtype" required="">
                     <option selected>Select Vehicle Type</option>
                     <option value="2">Two Wheeler</option>
                     <option value="4">Four Wheeler</option>
                   </select>
               </div>
               <div class="col-md-6">
                 <label for="inputPassword4" class="form-label">Brand</label>
                 <select class="form-control" aria-label="Default select example" id="Brand" name="Brand">

                   </select>
               </div>
             </div>
             <div class="row">
             <div class="col-md-4">
               <label for="Vname" class="form-label">Vehicle Name:</label>
               <input type="text" class="form-control" id="Vname" name="Vname" required="">
             </div>
             <div class="col-md-4">
               <label for="Model" class="form-label">Model:</label>
               <input type="text" class="form-control" id="Model" name="Model" required="">
             </div>
             <div class="col-md-4">
               <label for="Model" class="form-label">Vehicle NO:</label>
               <input type="text" class="form-control" id="Vno" name="Vno" required="">
             </div>
           </div>
           <div class="row">
             <div class="col-md-4">
               <label for="fuel" class="form-label">fuel:</label>
               <select class="form-control" aria-label="Default select example" id="Fuel" name="Fuel" required="">
                   <option selected>Select Fuel Type</option>
                   <option value="Petrol">Petrol</option>
                   <option value="Diesel">Diesel</option>
                   <option value="Electric">Electric</option>
                 </select>
             </div>
             <div class="col-md-4">
               <label for="capacity" class="form-label">Capacity:</label>
               <input type="number" class="form-control" id="Capacity" name="Capacity" required="">
             </div>
             <div class="col-md-4">
               <label for="rate" class="form-label">Rate(per day):</label>
               <input type="number" class="form-control" id="Rate" name="Rate" required="">
             </div>
           </div>
             <div class="col-12">
               <label for="description" class="form-label">Overview:</label>
               <textarea name="Overview" rows="4" cols="80" class="form-control" id="Overview" required="" ></textarea>
               </div>
               <div class="row">
               <div class="col-md-4">
                 <label for="img1" class="form-label">Image 1:</label>
                 <div class="demo" id="image1">
                 </div>
               </div>
               <div class="col-md-4">
                 <label for="img2" class="form-label">Image 2:</label>
                 <div class="demo" id="image2">
                 </div>
               </div>
               <div class="col-md-4">
                 <label for="img3" class="form-label">Image 3:</label>
                 <div class="demo" id="image3">
                 </div>
               </div>
             </div>
             </div>
             <div class="col-12">
               <button type="submit" class="btn btn-primary">Add</button>
             </div>
        </form>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

      </div>
        </div>
    </div>
  </div>

  <div class="modal fade" id="image">
    <div class="modal-dialog">
      <div class="modal-content">
  
        <!-- Modal Header -->
        <div class="modal-header">
      
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
  
        <!-- Modal body -->
        <div class="modal-body">
          <div class="demo" id="imagedisplay">
             <img class="imagepreview img-thumbnail" src="" alt="" >
          </div>   
        </div>
  
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
        </div>
  
      </div>
    </div>
  </div>