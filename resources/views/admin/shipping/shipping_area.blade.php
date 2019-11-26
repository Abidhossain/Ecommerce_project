 @extends('admin.admin_master')
@section('title','Shipping Area | Bread & Beyond')
@section('custom_css')
@endsection
@section('content')
<!-- modal -->
<div class="row">
   <div class="col-md-6">
      <div class="tile">
         <div class="tile-body">
            <h4>Shipping Area Add</h4>
          <form action="{{url('shipping-area')}}" method="post">
               @csrf
                     <div class="form-group">
                        <label for="area_name" class="col-form-label">Area Name</label>
                        <input type="text" class="form-control @error('area_name') is-invalid @enderror" name="area_name" id="tags_name" placeholder="Area Name" required>
                        @error('area_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  <button type="submit" class="btn btn-sm btn-warning text-white" id="submit">Submit</button>
                  <button type="reset" class="btn btn-sm btn-danger" data-dismiss="modal">Reset</button>

            </form>
       </div>
    </div>
   </div>
   <div class="col-md-6">
      <div class="tile">
         <div class="tile-body">
            <h4>Area List</h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Area Name</th>
                     <th>Action</th>
                  </tr>
               </thead>
               @php $i=1 @endphp
               <tbody>
                  @foreach($area_info as $area)
                  <tr>
                     <td>{{$i++}}</td>
                     <td>{{$area->area_name}}</td>
                     <td> 
                            <a  href="{{url('shipping-area')}}/{{$area->id}}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
                        </td>
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
