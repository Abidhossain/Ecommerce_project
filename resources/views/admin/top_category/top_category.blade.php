 @extends('admin.admin_master')
@section('title','Ecommerce | Top Category List')
@section('custom_css')
@endsection
@section('content')
<!-- modal -->
<div class="row">
   <div class="col-md-6">
      <div class="tile">
         <div class="tile-body">
            <h4>Color Add</h4>
          <form action="{{url('color-add-process')}}" method="post">
               @csrf
                     <div class="form-group">
                        <label for="color_name" class="col-form-label">Color Name</label>
                        <input type="text" class="form-control @error('color_name') is-invalid @enderror" name="color_name" id="color_name" placeholder="Color Name" required>
                        @error('color_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                     </div>
                  <button type="submit" class="btn btn-sm btn-warning text-white" name="submit" id="submit">Submit</button>
                  <button type="reset" class="btn btn-sm btn-danger" data-dismiss="modal">Reset</button>

            </form>
       </div>
    </div>
   </div>
   <div class="col-md-6">
      <div class="tile">
         <div class="tile-body">
            <h4>Color List</h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Color Name</th>
                     <th>Action</th>
                  </tr>
               </thead>
               @php $i=1 @endphp
               <tbody>
                 
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
   // swal({'success','','success',timer:1000});
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
