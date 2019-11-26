 @extends('admin.admin_master')
@section('title','Ecommerce | Set Users Permission')
@section('custom_css')
@endsection
@section('content')
<!-- modal -->
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="tile-body">
           <table class="table table-bordered">
             <thead>
               <tr>
                 <td width="90%">Group Name</td>
                 <td width="2%">Show</td>
                 <td width="2%">Create</td>
                 <td width="2%">Read</td>
                 <td width="2%">Update</td>
                 <td width="2%">Delete</td>
               </tr>
             </thead>
             <tbody>
               <tr>
                 <td >Group Name</td> 
                 <td><input type="checkbox" name=""></td> 
                 <td><input type="checkbox" name=""></td> 
                 <td><input type="checkbox" name=""></td> 
                 <td><input type="checkbox" name=""></td> 
                 <td><input type="checkbox" name=""></td> 
               </tr>
             </tbody>
           </table>
         </div>
      </div>
   </div>
</div>
@endsection
@section('custom_script')<script>
   // swal({'success','','success',timer:1000});
   swal({
     title: "Success!",
     text: "{{Session::get('success')}}",
     type: "success", 
     });
</script>
@if(Session::has('success'))

@endif
@if(Session::has('error'))
<script>
   swal('error','{{Session::get('error')}}','error');
</script>
@endif
@endsection
