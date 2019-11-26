 @extends('admin.admin_master')
@section('title','Ecommerce | Branch Location List')
@section('custom_css')   
        
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css')}}/bootstrap-clockpicker.min.css">
@endsection
@section('content')   
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content container-fluid">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Location Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div> 
          <form action="{{url('location-store')}}" method="post">
               @csrf
                     <div class="form-group">
                        <label for="branch_name" class="col-form-label">Branch Name</label>
                        <input type="text" class="form-control @error('branch_name') is-invalid @enderror" name="branch_name" id="branch_name" placeholder="Branch Name">
                        @error('branch_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="google_map_code" class="col-form-label">Branch Goole Map Code</label>
                        <input type="text" class="form-control @error('google_map_code') is-invalid @enderror" name="google_map_code" id="google_map_code" placeholder="Branch Goole Map">
                        @error('google_map_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="branch_address" class="col-form-label">Address</label>
                        <input type="text" class="form-control @error('branch_address') is-invalid @enderror" name="branch_address" id="branch_address" placeholder="Address">
                        @error('branch_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="branch_phone_number" class="col-form-label">Branch Phone Number</label>
                        <input type="text" class="form-control @error('branch_phone_number') is-invalid @enderror" name="branch_phone_number" id="branch_phone_number" placeholder="Branch Phone Number">
                        @error('branch_phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>   
                    <div class="row">
                      <div class="col-md-6">
                        <div class="input-group">
                          <div class="clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                          <label for="start_time" class="col-form-label">Start Time</label>
                          <input type="text" id="start_time" name="start_time" class="form-control" required>
                          <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                          </span>
                          </div>

                        </div> 
                      </div>
                      <div class="col-md-6">
                        <div class="input-group">
                          <div class="clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                          <label for="end_time" class="col-form-label">End Time</label>
                          <input id="end_time" type="text" name="end_time" class="form-control" required>
                          <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                          </span>
                          </div>

                        </div> 
                      </div>
                    </div> 
                     <br> 
                 
                 <div style="margin-bottom:5%" class="pull-left">
                    <button type="submit" class="btn btn-sm btn-success text-white" name="submit" id="submit">Submit</button>
                    <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                 </div>

            </form>
      </div>
   </div>
</div>
<!-- modal -->
<div class="row"> 
   <div class="col-md-12">
      <div class="tile">
         <div class="tile-body">
            <h4>Branch List <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Location Add</button></h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Branch Name</th>
                     <th>Map Code</th>
                     <th>Branch Address</th>
                     <th>Branch Number</th>
                     <th>Time</th>
                     <th>Action</th>
                  </tr>
               </thead>
               @php $i=1 @endphp
               <tbody> 
               </tbody>
               @php($i =1)
               @foreach($location_infos as $data)
               <tr>
                 <td>{{$i++}}</td>
                 <td>{{$data->branch_name}}</td>
                 <td><i style="padding: 20px;"  class="badge badge-info">valid</i></td>
                 <td>{{$data->branch_address}}</td>
                 <td>{{$data->branch_phone_number}}</td>
                 <td>{{$data->start_time}} - {{$data->end_time}}</td>
                 <td>
                   <a href="{{url('location-edit')}}/{{$data->id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                    <a  href="{{url('location-delete')}}/{{$data->id}}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
                 </td>
               </tr>
               @endforeach
            </table>
         </div>
      </div>
   </div>
</div>
@endsection
@section('custom_script') 

<script type="text/javascript" src="{{asset('admin/assets/js')}}/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript"> 
  $('.clockpicker').clockpicker();
</script>
@if(Session::has('success'))
<script>
   swal({
     title: "Success!",
     text: "{{Session::get('success')}}",
     type: "success",
     timer: 1000
     });
</script>
@endif
@if(Session::has('error'))
<script>
   swal('error','{{Session::get('error')}}','error');
</script>
@endif
@endsection
