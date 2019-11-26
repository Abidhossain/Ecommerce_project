 @extends('admin.admin_master')
@section('title','Ecommerce | Banner Edit')
@section('content')
<div class="row">
   <div class="col-md-1"></div>
   <div class="col-md-10">
      <div class="tile">
         <div class="tile-body">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Banner Update</h5>
                  </button>
               </div>
               <div class="modal-body">
                  <form id="insert_form" action="{{url('banner-update')}}" method="post" name="edit_form" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="id" value="{{$get_by_id->id}}">
                     <div class="form-group">
                        <label for="banner_title" class="col-form-label">Banner Title</label>
                        <input type="text" class="form-control" name="banner_title" id="banner_title" placeholder="Banner Name" value="{{$get_by_id->banner_title}}">
                     </div>
              
                       <div class="form-group">
                        <label for="banner_slug" class="col-form-label">Website link</label>
                        <input type="text" class="form-control" name="banner_slug" id="banner_title" placeholder="Website link" value="{{$get_by_id->banner_slug}}">
                     </div>


                     <div class="form-group">
                        <label for="banner_image" class="col-form-label">Banner Image</label>
                        <input type="file" class="form-control" name="banner_image" id="banner_image">
                        <img src="{{url('/')}}/{{$get_by_id->banner_image}}" height="60px" width="100px" id="blah">
                     </div>
                     <div class="form-group">
                        <label for="banner_position" class="col-form-label">Banner Position</label>
                        <input type="text" class="form-control" name="banner_position" id="banner_position" placeholder="Banner Position" value="{{$get_by_id->banner_position}}">
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

$("#banner_image").change(function(){
    readURL(this);
});
</script>

<script>
    $('#tire_based').hide();
    $('#design_based').hide();
    $( "#tire" ).click(function() {
        $('#tire_based').show();
        $('#design_based').hide();
    });
    $( "#design" ).click(function() {
        $('#tire_based').hide();
        $('#design_based').show();
    });
</script>
@endsection
