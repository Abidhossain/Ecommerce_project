@extends('admin.admin_master')
@section('title','Ecommerce | Role Manage')
@section('custom_css')
<style>
  .badge{
  border-radius: 0px;
  padding: 3%;
  }
  .form-control{
    border-radius: 0px;
  }
</style>
@endsection
@section('content') 
<div class="row">
  <div class="col-md-12">
     <div class="tile">
        <div class="tile-body">
            <div class="row">  
              <div class="col-md-4"></div>
              <div class="col-md-3">
                <form method="post" id="role_form">
                <input type="text" class="form-control" name="user_role_name" id="user_role_name" placeholder="User Role Name">
              </div>
              <div class="col-md-1">
                <input type="submit" name="submit" class="btn btn-success" value="Create Role">   
              </div>
              </form> 
            </div>
          <h4>User List</h4>
           <table class="table table-bordered">
              <thead>
                 <tr>
                    <th width="5%">Sl</th>
                    <th width="70%">Role Name</th> 
                    <th width="10%">Permission</th> 
                    <th width="8%">Action</th>
                 </tr>
              </thead>
              <tbody id="role_infos"> 
              </tbody>
           </table>
        </div>
     </div>
  </div>
</div>

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="editModal" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content container-fluid">
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Faq Add</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
         <form id="update_form" action="{{url('user-role-update-process')}}" method="post">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="user_role_name" class="col-form-label">Role Name</label>
                     <input type="hidden" class="form-control" name="id" id="id" placeholder="Role Name" required>
                     <input type="text" class="form-control" name="user_role_name" id="user_role_name" placeholder="Role Name" required>

                  </div>
               </div> 
            <div class="modal-footer">
               <button type="submit" class="btn btn-sm btn-warning" name="submit" id="submit">Update</button> 
            </div>
         </form>
      </div>
   </div>
</div>
<!-- modal -->
@endsection
@section('custom_script')
<script>  
  $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
  $('document').ready(function(){ 
      function readData(){ 
   
       $.get("{{url('user-role-read')}}", function(data){ 
               $('#role_infos').empty().html(data); 
       }); 
    } 
    window.onload = readData();

     $('#role_form').on('submit',function(e){
       e.preventDefault(); 
       $.ajax({
           url : "{{url('user-role-create')}}",
           method: 'post',
           data: $(this).serialize(),
           dataTpye: 'json',
           success:function(data){  
             swal('Success','Role Added Successfully','success');
             $('#user_role_name').val("");  
             return readData(); 
           },error:function (response) { 
            console.log(response);
             swal('Error','Role Must Be Unique !!','error');
           }
       })
   });  
      /*====================Edit Data By Ajax=======================*/ 

         $('#role_infos').delegate('#edit', 'click', function(){ 
              var id = $(this).data('id');
               console.log(id); 
           $.get('{{url('user-role-edit')}}/' + id, function(data) { 
               $('#update_form').find('#id').val(data.id); 
               $('#update_form').find('#user_role_name').val(data.user_role_name); 
                
               $('#editModal').modal('show'); 
            }); 
          });

         //   //update with ajax

       $('#update_form').on('submit',function(e){
          e.preventDefault();
          var data = $(this).serialize();
            $.ajax({
                url : "{{url('user-role-update')}}",
                method: 'post',
                data: data,
                dataTpye: 'json',
                success:function(data){  
               $('#editModal').modal('hide');  
                  swal('Success', 'Data Updated Successfully', 'success',{timer:800});  
                  return readData(); 
                }
            })
        })  
 
  }); 
</script>  
@if(Session::has('success'))
<script>
   swal({
     title: "Success!",
     text: "{{Session::get('success')}}",
     type: "success", 
     });
</script>
@endif
@if(Session::has('error'))
<script>
   swal('error','{{Session::get('error')}}','error');
</script>
@endif
@endsection
