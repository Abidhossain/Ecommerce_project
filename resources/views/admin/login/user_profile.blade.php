@extends('admin.admin_master')
@section('title','Ecommerce | My Profile')
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
                     <form method="POST" name="edit_form" action="{{url('my-profile-update')}}">
                        @csrf
                        <h5 class="login-head"><i class="fa fa-lg fa-fw fa-user text-success"></i>{{Auth::user()->name}}  <a href="{{url('change-password')}}" class="btn btn-primary btn-sm pull-right "><i class=" fa fa-sign-out fa-lg fa-fw"></i>Change Password</a></h5>
                        <div class="row">
                          <div class="col-md-12">
                          <div class="form-group">
                           <label class="control-label" for="name">USERNAME</label> 
                           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{Auth::user()->name}}" required autocomplete="name" placeholder="Enter User Name">
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
                           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{Auth::user()->email}}" required autocomplete="email" placeholder="Enter Email Address">
                           @error('email')
                           <span class="invalid-feedback" role="alert">
                           <strong>{{ $message }}</strong>
                           </span>
                           @enderror
                        </div>
                        </div>   
                       <div class="col-md-12">
                          <div class="form-group">
                             <label class="control-label" for="user_role_id">User Role</label>
                             <select id="user-type" class="form-control{{ $errors->has('is_admin') ? ' is-invalid' : '' }}" name="user_role_id" id="user_role_id" required>
                             <option value="">========== Select User Role ==========</option>
                             
                             @foreach($user_role as $data)
                               <option value="{{$data->id}}">{{$data->user_role_name}}</option>
                             @endforeach
                             
                             </select>
                             @if ($errors->has('user_role_id'))
                             <span class="invalid-feedback" role="alert"><br>
                             <strong class="text-danger">{{ $errors->first('user_role_id') }}</strong>
                             </span>
                             @endif
                         </div>
                       </div> 
                        <div class="col-md-6">
                           <div class="form-group btn-container">
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
document.forms['edit_form'].elements['user_role_id'].value={{Auth::user()->user_role_id}} 
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