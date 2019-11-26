 @extends('admin.admin_master')
@section('title','Ecommerce | Brand List')
@section('custom_css')
<style>
   .badge{
   border-radius: 0px;
   padding: 5%!important;
   }
</style>
@endsection
@section('content')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content container-fluid">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Brand Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> 
         </div>
         <form action="{{ route('brand_store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="category_name" class="col-form-label">Brand Name</label>
                     <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" required>
                  </div>
               </div>  
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="category_name" class="col-form-label">Phone Number</label>
                     <input type="number" class="form-control" name="phone" id="phone" placeholder="Enter number">
                  </div>
               </div>  

               <div class="col-md-12">
                  <div class="form-group">
                     <label for="category_name" class="col-form-label">Email address</label>
                     <input type="text" class="form-control" name="email" id="email" placeholder="Email Address">
                  </div>
               </div>  

              <div class="col-md-12">
            <div class="form-group">
               <label for="summernote2" class="control-label">Address</label>
               <textarea  class="form-control summernote" name="address"  rows="4">{{ old('address')}}</textarea>
            </div>
            </div> 
             
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-sm btn-success text-white" name="submit" id="submit">Submit</button>
               <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- modal -->
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="tile-body">
            <h4>Brand List  <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Brand Add</button> 
            </h4>
           @if ($errors->any())
               <div class="alert alert-danger">
                   <ol>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ol>
               </div>
           @endif
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Brand Name</th>
                     <th>Phone No</th>
                     <th>E-mail</th>
                     <th>Brand Address</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  
                  @foreach($brand_infos as $key => $brand)
               
                  <tr>
                     <td>{{$key+1 }}</td>
                     <td>{{$brand->name}}</td>
                     <td>{{$brand->phone}}</td>
                     <td>{{$brand->email}}</td>
                     
                     <td>{{$brand->address}}</td>
                     <td>
                        <a href="{{ route('brand_edit',$brand->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                        <a  href="{{ route('brand_delete',$brand->id) }}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {{-- {{$brand_infos->links()}} --}}
         </div>
      </div>
   </div>
</div>
@endsection
@section('custom_script')
{{--  <script>
   $('document').ready(function(){
      $('#textboxes2').hide();
        $(function() {
          $('select[name="category_type"]').on('click', function() {
              if ($(this).val() == '999') {
                  $('#textboxes2').show();
                  // $('#textboxes1').hide();
              }else if($(this).val() == '1'){
                  $('#textboxes1').show();
                  $('#textboxes2').hide();
              }
          });
      });
   });
</script> --}}

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
