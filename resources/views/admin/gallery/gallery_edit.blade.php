 @extends('admin.admin_master')
@section('title','Ecommerce | Brand Edit')
@section('content') 
<div class="row">
   <div class="col-md-3"></div>
   <div class="col-md-6">
      <div class="tile">
         <div class="tile-body">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Gallery Update</h5> 
                  </button>
               </div>
               <div class="modal-body">
                  <form id="insert_form" action="{{url('gallery-update')}}" method="post" name="edit_form" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="id" value="{{$get_by_id->id}}">
                  
                     <div class="form-group">
                        <label for="gallery_image" class="col-form-label">Gallery Image</label>
                        <input type="file" class="form-control" name="gallery_image" id="gallery_image">
                        <img src="..\{{$get_by_id->gallery_image}}" height="60px" width="100px" id="blah"> 
                     </div> 
                     <div class="form-group">
                        <label for="publication_status" class="col-form-label">Publication Status</label>
                        <select name="publication_status" id="publication_status" class="form-control" {{$get_by_id->publication_status}}> 
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                        </select>
                     </div>
               </div>
               <div class="modal-footer">
               <button type="submit" class="btn btn-sm btn-warning" name="submit" id="submit">Update</button>  
               </div> 
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('custom_script')
<script>
   document.forms['edit_form'].elements['publication_status'].value={{ $get_by_id->publication_status }}

    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader(); 
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        } 
        reader.readAsDataURL(input.files[0]);
    }
}

$("#gallery_image").change(function(){
    readURL(this);
});
</script>
@endsection