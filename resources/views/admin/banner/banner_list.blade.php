@extends('admin.admin_master')
@section('title','Ecommerce | Banner List')
@section('custom_css') 
@endsection
@section('content')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content container-fluid">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Banner Add</h5> 
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
            @if ($errors->any())
                    {{ implode('', $errors->all('<div>:message</div>')) }}
            @endif
         </div> 
            <small><span style="font-size: 14px;" class="text-danger"><i> </i></span></small>
          
         <form action="{{url('front-banner-add-process')}}" method="post" enctype="multipart/form-data" onSubmit="return validate();"> 
            @csrf
            <div class="row"> 
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="banner_title" class="col-form-label">Banner Title</label>
                     <input type="text" class="form-control" name="banner_title" id="banner_title" placeholder="Banner Title" required>
                  </div>
               </div>  
            <div id="design_based" class="col-md-12"> 
                  <div class="form-group">
                     <label for="site_slug" class="col-form-label">Banner link</label>
                     <input type="text" class="form-control" name="banner_slug" id="banner_slug" placeholder="Website link">
                  </div> 
            </div> 
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="banner_image" class="col-form-label">Banner Photo</label>&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;" class="text-danger"><i>Image Size Must Be 377 x 166 pixels</i></span> 
                     <input type="file" class="form-control demoInputBox" name="banner_image" required id="file"><span id="file_error"></span> 
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="banner_position" class="col-form-label">Banner Position</label>
                     <input type="number" class="form-control" name="banner_position" id="banner_position" placeholder="Brand Position" required>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="publication_status" class="col-form-label">Publication Status</label>
                     <select name="publication_status" id="publication_status" class="form-control" required> 
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                     </select>
                  </div>
               </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-sm btn-success" name="submit" id="btnSubmit">Submit</button>
               <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- modal -->
<div class="row">
   <div class="col-md-12">
      <div class="card">
         <div class="card-body">
            <h4>Banner List  <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Banner Add</button>
               @error('category_slug')
               <span class="invalid-feedback" role="alert">
               <strong>{{ $message }}</strong>
               </span>
               @enderror
            </h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th> 
                     <th>Banner Title</th>
                     <th>Banner Slug</th>
                     <th>Banner Image</th>
                     <th>Banner Position</th>
                     <th>Banner Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               @php $i=1 @endphp 
               <tbody>
                  @foreach($banner_infos as $banner)
                     <tr>
                        <td>{{$i++}}</td>
                        <td>{{$banner->banner_title}}</td>
                        <td>{{$banner->banner_slug}}</td>
                        <td><img src="{{url('/')}}/{{$banner->banner_image}}" alt="{{$banner->banner_image}}" height="40" width="40"></td>
                        <td>{{$banner->banner_position}}</td>
                         <td>
                     <?php
                        if ($banner->publication_status == 1) { ?>
                     <span class="badge badge-info">Publish</span>
                     <?php }else{ ?>
                     <span class="badge badge-danger">Unpublish</span>
                     <?php } ?>
                  </td>
                  <td>
                       <a href="{{url('banner-edit')}}/{{$banner->id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                       {{--  <a  href="{{url('banner-delete')}}/{{$banner->id}}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a> --}}
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
     timer: 1000
     });
</script>
@endif
@if(Session::has('error'))
<script>
   swal('error','{{Session::get('error')}}','error');
</script>
@endif
<script>
   function validate() {
      $("#file_error").html("");
      $(".demoInputBox").css("border-color","#F0F0F0");
      var file_size = $('#file')[0].files[0].size;
      if(file_size>2097152) {
         $("#file_error").html("File size is greater than 2MB");
         $(".demoInputBox").css("border-color","#FF0000");
         return false;
      } 
      return true;
   }
</script>

 
@endsection
