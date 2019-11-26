 @extends('admin.admin_master')
@section('title','Ecommerce | Location Update')
@section('custom_css')     
<link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css')}}/bootstrap-clockpicker.min.css">
<link rel="stylesheet" type="text/css" href="{{asset('public/admin/assets/css')}}/github.min.css">
@endsection
@section('content')
<!-- modal -->
<div class="row">
   <div class="col-md-1"></div>
   <div class="col-md-10">
      <div class="tile">
         <div class="tile-body">
            <h4>Location Update</h4>
          <form action="{{url('location-update')}}" method="post">
               @csrf
               <input type="hidden" name="id" value="{{$get_by_id->id}}">
                     <div class="form-group">
                        <label for="branch_name" class="col-form-label">Branch Name</label>
                        <input type="text" class="form-control @error('branch_name') is-invalid @enderror" name="branch_name" id="branch_name" placeholder="Branch Name" required value="{{$get_by_id->branch_name}}">
                        @error('branch_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="google_map_code" class="col-form-label">Branch Goole Map Code</label>
                        <input type="text" class="form-control @error('google_map_code') is-invalid @enderror" name="google_map_code" id="google_map_code" placeholder="Branch Goole Map" required value="{{$get_by_id->google_map_code}}">
                        @error('google_map_code')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="branch_address" class="col-form-label">Address</label>
                        <input type="text" class="form-control @error('branch_address') is-invalid @enderror" name="branch_address" id="branch_address" placeholder="Address" required value="{{$get_by_id->branch_address}}">
                        @error('branch_address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label for="branch_phone_number" class="col-form-label">Branch Phone Number</label>
                        <input type="text" class="form-control @error('branch_phone_number') is-invalid @enderror" name="branch_phone_number" id="branch_phone_number" placeholder="Branch Phone Map Code" required value="{{$get_by_id->branch_phone_number}}">
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
                          <input type="text" id="start_time" name="start_time" class="form-control" required value="{{$get_by_id->start_time}}">
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
                          <input id="end_time" type="text" name="end_time" class="form-control" required value="{{$get_by_id->end_time}}">
                          <span class="input-group-addon">
                          <span class="glyphicon glyphicon-time"></span>
                          </span>
                          </div>

                        </div> 
                      </div>
                    </div> 
                     <br> 
                  <button type="submit" class="btn btn-sm btn-warning text-white" name="submit" id="submit">Update</button> 

            </form>
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
