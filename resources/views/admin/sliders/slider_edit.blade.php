 @extends('admin.admin_master')
@section('title','Ecommerce | Slider Edit')
@section('content')
<div class="row">
   <div class="col-md-1"></div>
   <div class="col-md-10">
      <div class="tile">
         <div class="tile-body">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Slider Update</h5>
                  </button>
               </div>
               <div class="modal-body">
                  <form id="insert_form" action="{{ route('slider-update', $get_by_id->slider_id) }}" method="POST" name="edit_form" enctype="multipart/form-data">
                  {{-- <form id="insert_form" action="{{url('slider-update',$get_by_id->slider_id)}}" method="post" name="edit_form" enctype="multipart/form-data"> --}}
                     @csrf
                     @method('PATCH')
                     <input type="hidden" name="slider_id" value="{{$get_by_id->slider_id}}">
                     <div class="form-group">
                        <label for="slider_title" class="col-form-label">Slider Title</label>
                        <input type="text" class="form-control" name="slider_title" id="slider_title" placeholder="Brand Name" value="{{$get_by_id->slider_title}}">
                     </div>  

                     <div class="form-group">
                        <label for="slider_slug" class="col-form-label">Web Site Link</label>
                        <input type="text" class="form-control" name="slider_slug" id="slider_slug" placeholder="Web Site Link" value="{{$get_by_id->slider_slug}}">
                     </div> 

                     <div class="form-group">
                        <label for="slider_image" class="col-form-label">Slider Image</label>&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;" class="text-danger"><i>Image Size Must Be 874 x 450 pixels</i></span>
                        <input type="file" class="form-control" name="slider_image" id="slider_image">
                        <img src="{{url('/')}}/{{$get_by_id->slider_image}}" height="60px" width="100px" id="blah">
                     </div>
                     <div class="form-group">
                        <label for="slider_position" class="col-form-label">Slider Position</label>
                        <input type="number" class="form-control" name="slider_position" id="slider_position" placeholder="Brand Position" value="{{$get_by_id->slider_position}}">
                     </div> 

                      <div class="form-group">
                     <label for="description" class="control-label">Slider Description </label>
                     <textarea  class="form-control summernote" name="description" rows="4" value="{{$get_by_id->description}}">{{$get_by_id->description}}</textarea>
                  </div>

               </div>
               <div class="modal-footer">
               <button type="submit" class="btn btn-sm btn-warning" id="submit">Update</button>
               </div>
               </form>
         </div>
      </div>
   </div>
</div>
@endsection
@section('custom_script')
<script>
    function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#blah').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
}

$("#slider_image").change(function(){
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
