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
          <h4>User List <a href="{{ route('users.create') }}" class="btn btn-primary pull-right">Add New</a></h4>
           <table class="table table-bordered">
              <thead>
                 <tr>
                    <th>Sl</th>
                    <th>User Name</th>
                    <th>Mail Address</th>
                    <th>User Role</th>  
                    <th>Action</th>
                 </tr>
              </thead>
              @php 
                $i=1;
                $info = DB::table('users')->get();
              @endphp
              <tbody>
              
                @foreach($info as $data)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$data->name}}</td>
                    <td>{{$data->email}}</td> 
                    <td> 
                      <?php 
                        if($data->role_id == 1){
                          echo 'Admin';
                        }else{
                          echo 'User';
                        }
                      ?>
                    </td> 
                      <td>
                        <a href="{{url('user-edit')}}/{{$data->id}}"><i class="fa fa-edit btn btn-sm btn-success" aria-hidden="true"></i></a>
                        <a href="{{url('user-delete')}}/{{$data->id}}" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash btn btn-sm btn-danger" aria-hidden="true"></i></a>
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
     });
</script>
@endif
@if(Session::has('error'))
<script>
   swal('error','{{Session::get('error')}}','error');
</script>
@endif
@endsection
