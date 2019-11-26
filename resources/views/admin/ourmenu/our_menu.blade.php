@extends('admin.admin_master')
@section('title','Our menu | Bread & Beyond')   
@section('content')
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Our menu</h3>
            <div class="tile-body">
    <form action="{{url('our-menu')}}" method="post"  enctype="multipart/form-data"> 
  <input type="hidden" name="id" value="{{!empty($ourmenu->id)?$ourmenu->id:''}}">
              @csrf 
                  <div class="form-group">
                 <label for="our_menu_image"></label>
                 <input class="form-control" id="our_menu_image" name="our_menu_image" type="file"> <br>
                 <img src="{{url('/')}}/{{!empty($ourmenu->our_menu_image)?$ourmenu->our_menu_image:''}}" id="blah" height="100px" width="250px" alt="{{!empty($ourmenu->our_menu_image)?$ourmenu->our_menu_image:''}}">
              </div> 
        </div>
        </div>

            <div class="tile-footer">
              <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{url('/dashboard')}}"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
            </div>
            </form>
          </div>
        </div>
      </div>

          <script>
              $('.summernote').summernote({
                  placeholder: 'Write short description about your products',
                  tabsize: 2,
                  height: 100
              });
          </script>
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

$("#our_menu_image").change(function(){
    readURL(this);
});
</script>
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
@endsection
