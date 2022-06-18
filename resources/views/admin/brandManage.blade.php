@extends('shared.AdminLayout')
@section('adminDashboard')
  <div class="col-lg-12 pt-5">
    @if(session('flash_message'))
    <div class="alert alert-success" role="alert">
      {{ session('flash_message')}}
    </div>
  @endif
      <div class="card">
          <div class="card-header d-flex align-items-center">
            <h4>Manage Brand</h4>
          </div>
          <div class="card-body">
                <p></p>
              <table class="table table-bordered table-sm">
                <thead>
                  <tr>
                    <th>Brand Type</th>
                    <th>Brand Name</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($result as $r)
                      <tr>
                        <td><?php if($r->Vtype==2){
                                                  echo "Two wheeler";
                                                  }
                                             else {
                                                  echo "Four Wheeler";
                                                  }
                               ?>
                          </td>
                          <td>{{$r->Bname}}</td>
                             <td>
                               <a class="btn btn-primary btn-sm" id='editBrand'
                                              onclick="viewBrand('{{$r->id}}','{{$r->Vtype}}','{{$r->Bname}}')"
                                              data-bs-toggle="modal" data-bs-target="#exampleModal">
                                 <i class='fas fa-edit'></i>
                                </a>                                  
                                <a href="{{route('deletebrand',$r->id)}}" class="btn btn-danger btn-sm">
                                  <i class='far fa-trash-alt'></i>
                                </a>
                              </td>
                       </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
{{-- to toggle model --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
{{-- to extract data from row  --}}
<script type="text/javascript">
        function viewBrand(id,Vtype,Bname){
            $("#bid").val(id);
            $("#Vtype").val(Vtype);
            $("#Bname").val(Bname);
        }
</script>


@endsection
{{-- model to update --}}
<div class="modal" id="exampleModal">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form class="form-horizontal" method="post" enctype="multipart/form-data" action="{{ route('updatebrand') }}">
            @csrf
             <input type="hidden" id="bid" name="Bid" value="">
          <div class="form-group row">
            <div class="col-sm-2">
              <label>Brand Type:</label>
            </div>
            <div class="col-sm-10">
              <select name="Vtype" id="Vtype" class="form-control" name="Vtype">
                <option value="2">Two Wheeler</option>
                <option value="4">Four Wheeler</option>

              </select>
            </div>
          </div>

          <div class="form-group row">
            <div class="col-sm-2">
              <label>Brand Name:</label>
            </div>
            <div class="col-sm-10">
              <input id="Bname" name="Bname" type="text" placeholder="Name" class="form-control form-control-warning"><small class="form-text"></small>
            </div>
          </div>
          <div class="form-group row">
            <div class="col-sm-10 offset-sm-2">
              <input type="submit" value="Update" class="btn btn-primary">
            </div>
          </div>
        </form>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
