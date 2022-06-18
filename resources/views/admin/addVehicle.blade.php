@extends('shared.AdminLayout')
@section('adminDashboard')

  <div class="col-lg-12 pt-4 ">
    @if(session('message'))
        <div class="alert alert-success" role="alert">
          {{ session('message')}}
        </div>
      @endif
           <div class="card pb-3">
             <div class="card-header d-flex align-items-center">
               <h4>Add vehicle</h4>
             </div>
             <div class="card-body">
               <form class="row g-3" method="post" enctype="multipart/form-data" action="{{ route('addvehicle') }}">
                     @csrf
                      <div class="col-md-6">
                        <label for="vtype" class="form-label">Vehicle Type:</label>
                        <select class="form-control" aria-label="Default select example" id="Vtype" name="Vtype" required="">
                            <option selected>Select Vehicle Type</option>
                            <option value="2">Two Wheeler</option>
                            <option value="4">Four Wheeler</option>
                          </select>
                      </div>
                      <div class="col-md-6">
                        <label for="inputPassword4" class="form-label">Brand</label>
                        <select class="form-control" aria-label="Default select example" id="brand" name="Brand" required="">
                          {{-- @foreach ($data as $r)
                            <option value="{{$r->id}}">{{$r->Bname}}</option>

                          @endforeach --}}


                          </select>

                      </div>
                      <div class="col-md-4">
                        <label for="Vname" class="form-label">Vehicle Name:</label>
                        <input type="text" class="form-control" id="Vname" name="Vname" required="">
                      </div>
                      <div class="col-md-4">
                        <label for="Model" class="form-label">Model:</label>
                        {{-- <input type="year" class="form-control" id="model" name="Model" required=""> --}}
                        <input type="number" min="1900" max="2099" step="1" value="2022" class="form-control" id="model" name="Model" required=""/>
                      </div>
                      <div class="col-md-4">
                        <label for="Model" class="form-label">Vehicle NO:</label>
                        <input type="text" class="form-control" id="Vnum" name="Vno" required="">
                      </div>
                      <div class="col-md-4">
                        <label for="fuel" class="form-label">fuel:</label>
                        <select class="form-control" aria-label="Default select example" id="fuel" name="Fuel" required="">
                            <option selected>Select Fuel Type</option>
                            <option value="Petrol">Petrol</option>
                            <option value="Diesel">Diesel</option>
                            <option value="Electric">Electric</option>
                          </select>
                      </div>
                      <div class="col-md-4">
                        <label for="capacity" class="form-label">Capacity:</label>
                        <input type="number" class="form-control" id="capacity" name="Capacity" required="">
                      </div>
                      <div class="col-md-4">
                        <label for="rate" class="form-label">Rate(per day):</label>
                        <input type="number" class="form-control" id="rate" name="Rate" required="">
                      </div>
                      <div class="col-12">
                        <label for="description" class="form-label">Overview:</label>
                        <textarea name="Overview" rows="4" cols="80" class="form-control" id="overview" required="" ></textarea>
                        </div>
                        <div class="col-md-4">
                          <label for="img1" class="form-label">Image 1:</label>
                          <input type="file" class="form-control" id="img1" name="img1" required="">
                        </div>
                        <div class="col-md-4">
                          <label for="img2" class="form-label">Image 2:</label>
                          <input type="file" class="form-control" id="img2" name="img2" required="">
                        </div>
                        <div class="col-md-4">
                          <label for="img3" class="form-label">Image 3:</label>
                          <input type="file" class="form-control" id="img3" name="img3" required="">
                        </div>

                      </div>
                      <div class="col-12 ps-4">
                        <button type="submit" class="btn btn-primary">Add</button>
                      </div>
                    </form>

             </div>
           </div>
      
     
           
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

      <script type="text/javascript">
      $(document).ready(function(){
        $("#Vtype").change(function(){
          var type=$("#Vtype").val();

         //alert(type);
         //console.log(type);
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
                            jQuery('#brand').html(data)

                                console.log(data);
                          $.each(data,function(key,item){
                            $('#brand').append(
                              '<option value='+item.id+'>'+item.Bname+'</option>'
                            );
                          
                          });

                              }
                            });

      });
      });
    
      </script>

@endsection
