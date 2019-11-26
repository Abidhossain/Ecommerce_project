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
                       <h2> Show Role</h2>
                   </div>
                   <div class="pull-right">
                       <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
                   </div>
               </div>
           </div>


           <div class="row">
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Name:</strong>
                       {{ $role->name }}
                   </div>
               </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                   <div class="form-group">
                       <strong>Permissions:</strong><br>
                       @if(!empty($rolePermissions))
                           @foreach($rolePermissions as $v)
                               <label class="badge badge-primary">{{ $v->name }}</label> 
                           @endforeach
                       @endif
                   </div>
               </div>
           </div>
        </div>
     </div>
  </div>
</div>
@endsection  