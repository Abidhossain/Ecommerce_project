@extends('admin.admin_master')
@section('title','Ecommerce | Gallery List')
@section('custom_css') 
@endsection
@section('content')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content container-fluid">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Gallery Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <form action="{{url('gallery-add-procsss')}}" method="post" enctype="multipart/form-data"> 
            @csrf
            <div class="row">   
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="gallery_image" class="col-form-label">Gallery Photo</label>&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;" class="text-danger"><i>*</i></span> 
                     <input type="file" class="form-control" name="gallery_image" id="gallery_image" required>
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
               <button type="submit" class="btn btn-sm btn-success" name="submit" id="submit">Submit</button>
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
            <h4>Gallery List  <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Gallery Add</button>
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
                     <th>Gallery Image</th> 
                     <th>Gallery Status</th>
                     <th>Action</th>
                  </tr>
               </thead>
               @php $i=1 @endphp 
               <tbody>
                  @foreach($gallery_pictures as $gallery)
                     <tr>
                        <td>{{$i++}}</td>  
                        <td><img src="{{$gallery->gallery_image}}" alt="{{$gallery->gallery_image}}" height="40" width="40"></td> 
                  <td>
                     <?php
                        if ($gallery->publication_status == 1) { ?>
                     <span class="badge badge-info">Publish</span>
                     <?php }else{ ?>
                     <span class="badge badge-danger">Unpublish</span>
                     <?php } ?>
                  </td>
                  <td>
                       <a href="{{url('gallery-edit')}}/{{$gallery->id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                        <a  href="{{url('gallery-delete')}}/{{$gallery->id}}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
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
@endsection