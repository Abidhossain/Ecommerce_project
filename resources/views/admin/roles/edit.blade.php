 @extends('admin.admin_master')
@section('title','Ecommerce | Role List') 
@section('custom_css')
    <style>
      .badge{
        padding: 1%!important;
      }
    </style>
@endsection
@section('content') 
<div class="row">
  <div class="col-md-12">
     <div class="tile">
        <div class="tile-body">
           
           <div class="row">
               <div class="col-lg-12 margin-tb">
                   <div class="pull-left">
                       <h2>Edit Role</h2>
                   </div>
                   <div class="pull-right">
                       <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                   </div>
               </div>
           </div> 
           @if (count($errors) > 0)
               <div class="alert alert-danger">
                   <strong>Whoops!</strong> There were some problems with your input.<br><br>
                   <ul>
                   @foreach ($errors->all() as $error)
                       <li>{{ $error }}</li>
                   @endforeach
                   </ul>
               </div>
           @endif  
  <form action="{{url('role-update')}}" method="post"> 
    @csrf
    <input type="hidden" name="role_id" value="{{$role->id}}">
  <div class="row">
      <div class="col-md-4">
          <div class="form-group">
              <label>Role Name:</label> 
              <input type="text" name="name" class="form-control" placeholder="Enter Role Name" value="{{$role->name}}" readonly>
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
              <label>Permission:</label><br/>
              <br/>
             
              @foreach($permission as $value) 
              <label><input type="checkbox" name="permission[]" value="{{ $value->id}}" 
                <?php 
                  if(in_array($value->id, $rolePermissions)){ ?>
                  checked
                  <?php } else {  ?><?php }?> >{{ $value->name}}</label> <br>
              @endforeach
          </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>
  </div>
  </form>

        </div>
     </div>
  </div>
</div>
@endsection  