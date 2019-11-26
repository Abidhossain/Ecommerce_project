@extends('admin.admin_master')
@section('title','Ecommerce | User List')
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
          <div class="col-md-8">
               <div class="tile">
                  <div class="tile-body">
                     <form name="edit_form" action="{{url('user-update')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$get_by_id->id}}">
                        <h5 class="login-head"><i class="fa fa-lg fa-fw fa-user text-success"></i>Update User Information </h5>
                        <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                           <label class="control-label" for="name">USERNAME</label>
                           <input id="id" type="hidden" class="form-control" name="id" value="{{$get_by_id->id}}">
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$get_by_id->name}}" required autocomplete="name" placeholder="Enter User Name">
                           @error('name')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        </div>
                         <div class="col-md-12">
                        <div class="form-group">
                           <label class="control-label" for="email">Email</label>
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$get_by_id->email}}" required autocomplete="email" placeholder="Enter Email Address">
                           @error('email')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        </div>   
                    
              <div class="col-md-12">
                 <div class="form-group">
                    <label class="control-label" for="roles">User Role</label>
                    <select id="user-type" class="form-control" name="role_id" id="role_id" required>
                    <option value="">===Select User Role ===</option>
                    <option value="1">Admin</option> 
                    <option value="2">User</option> 
                    </select> 
                </div>
              </div>
                        <div class="col-md-12">
                           <div class="form-group btn-container"><a href="{{url('user-list')}}" class="pull-left btn btn-sm btn-warning">Back</a> &nbsp;&nbsp;
                              <button class="btn btn-sm btn-success">Update</button>
                           </div>
                         </div>
                        </div> 
                     </form>
                  </div>
               </div>
            </div>
          </div>
     </div>
  </div>
</div>
@endsection
@section('custom_script') 
<script>  
    document.forms['edit_form'].elements['role_id'].value={{$get_by_id->role_id}}
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
