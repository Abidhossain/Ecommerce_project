 @extends('admin.admin_master')
@section('title','Delivery Time | Bread & Beyond')
@section('custom_css')    
<link rel="stylesheet" type="text/css" href="{{asset('admin/assets/css')}}/bootstrap-clockpicker.min.css">
<style>
 
</style>
@endsection
@section('content')   
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-body">
                    <h4>Delivery Time Add</h4>
                    <form action="{{url('delivery-time-add')}}" method="post">
                        @csrf
                        <div class="row">
                           <div class="col-md-5">
                             <div class="input-group">
                               <div class="clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                               <label for="start_time" class="col-form-label">Start Time <span class="text-danger">*</span></label>
                               <input type="text" name="recieved_time" class="form-control" placeholder="Received Time" required>
                              {{--  <input type="text" id="start_time" name="recieved_time" class="form-control start_time" placeholder="Received Time" required> 
                               <span class="input-group-addon">
                               <span class="glyphicon glyphicon-time"></span>
                               </span> --}}
                               </div>

                             </div> 
                           </div>
                           <div class="col-md-5">
                             <div class="input-group">
                               <div class="clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                               <label for="end_time" class="col-form-label">End Time <span class="text-danger">*</span></label>

                               <input type="text" name="delivered_time" class="form-control" placeholder="Delivered Time" required>
                              {{--  <input id="end_time" type="text" name="delivered_time" class="start_time form-control" required placeholder="Delivered Time">
                               <span class="input-group-addon">
                               <span class="glyphicon glyphicon-time"></span>
                               </span> --}}
                               </div>

                             </div> 
                           </div>
                           <div class="col-md-2">
                            <label class="col-form-label"></label>
                             <button style="margin-top:38px;" type="submit" class="btn btn-sm btn-success">Submit</button>
                           </div>
                        </div>  
                    </form>
                </div>
            </div>
        </div>
   <div class="col-md-6">
      <div class="tile">
         <div class="tile-body">
            <h4>Delivery Time List</h4>
            <table class="table table-bordered">
               <thead>
                  <tr> 
                     <th>Receice Time</th> 
                     <th>End Time</th> 
                     <th>Action</th>
                  </tr>
               </thead>
               @php $i=1 @endphp
               <tbody> 
                @foreach($delivery_time as $data)
                <tr>
                  <td>{{$data->recieved_time}}</td>
                  <td>{{$data->delivered_time}}</td>
                  <td> <a href="{{url('time-delete')}}/{{$data->id}}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a></td>
                </tr>
                @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>  
@endsection
@section('custom_script') 

<script type="text/javascript" src="{{asset('admin/assets/js')}}/bootstrap-clockpicker.min.js"></script>
<script type="text/javascript"> 
  $('.start_time').clockpicker({
    placement: 'bottom',
    align: 'right',
    autoclose: true,
    'default': '12:15', 
  }); 
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
