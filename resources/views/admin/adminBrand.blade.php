@extends('shared.AdminLayout')
@section('adminDashboard')
  <div class="container-fluid">
    <div class="row">


    <div class="col-lg-12 pt-3">
             <div class="card">
               <div class="card-header d-flex align-items-center">
                 <h4>Create Brand</h4>
               </div>
               <div class="card-body">
                 <p></p>
                 <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('addbrand') }}">
                     @csrf
                   <div class="form-group row">
                     <div class="col-sm-2">
                       <label>Brand Type:</label>
                     </div>
                     <div class="col-sm-10 pb-2">
                       <select name="Vtype" id="Vtype" class="form-control" name="Vtype">
                         <option value="2">Two Wheeler</option>
                         <option value="4">Four Wheeler</option>

                       </select>
                     </div>
                   </div>
                    <input type="hidden" id="aid" name="Aid" value="{{ Auth::guard('admin')->user()->id }}">
                   <div class="form-group row">
                     <div class="col-sm-2">
                       <label>Brand Name:</label>
                     </div>
                     <div class="col-sm-10 pb-2">
                       <input id="Bname" name="Bname" type="text" placeholder="Name" class="form-control form-control-warning"><small class="form-text"></small>
                     </div>
                   </div>
                   <div class="form-group row">
                     <div class="col-sm-10 offset-sm-2 ">
                       <input type="submit" value="submit" class="btn btn-primary">
                     </div>
                   </div>
                 </form>
               </div>
             </div>
           </div>
  </div>
  </div>
@endsection
