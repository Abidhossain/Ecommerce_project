  @extends('admin.admin_master')
 
@section('title','Ecommerce | Role List')

@section('content')
<div class="row">
  <div class="col-md-12">
     <div class="tile">
        <div class="tile-body">
      <div class="row">
          <div class="col-lg-12">
              <div class="pull-left">
                  <h2>Role Management</h2>
              </div>
              <div class="pull-right"> 
                 <a class="btn btn-sm btn-success" href="{{ route('roles.create') }}"> Create New Role</a> 
              </div>
          </div>
      </div>

      <table class="table table-bordered">
        <tr>
           <th>No</th>
           <th>Name</th>
           <th width="280px">Action</th>
        </tr> 
        <?php $i=1 ?>
    @foreach ($roles as $key => $role)
          <tr>
              <td>{{ $i++ }}</td>
              <td>{{ $role->name }}</td>
              <td>
                <a class="btn btn-sm btn-info" href="{{ route('roles.show',$role->id) }}">Show</a>   
                  <a class="btn btn-sm btn-primary" href="{{ route('roles.edit',$role->id) }}">Edit</a> 
                    <a class="btn btn-sm btn-danger" href="{{url('role-delete')}}/{{$role->id}}">Delete</a> 
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
<script>
   // swal({'success','','success',timer:1000});
   
  <?php if(Session::get('success')): ?>
      
      swal({
        title: "Success!",
        text: "{{Session::get('success')}}",
        type: "success",
        timer: 1000
        });
      
    <?php endif; ?>
    
    
</script>

@endsection
