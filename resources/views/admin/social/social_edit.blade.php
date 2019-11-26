 @extends('admin.admin_master')
@section('title','Ecommerce | Social Links')
@section('content')
<div class="row">
   <div class="col-md-3"></div>
   <div class="col-md-6">
      <div class="tile">
         <div class="tile-body">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Social Links</h5>
                  </button>
               </div>
               <div class="modal-body">
                  <form action="{{url('social-links-update')}}" method="post" name="edit_form">
                     @csrf
                     <input type="hidden" name="id" value="{{!empty($social_infos->id)?$social_infos->id:''}}">
                     <div class="form-group">
                        <label for="facebook" class="col-form-label">Facebook</label>
                        <input type="text" class="form-control" name="facebook" id="facebook" placeholder="http://www.facebook.com" value="{{!empty($social_infos->facebook)?$social_infos->facebook:''}}">
                     </div>
                     <div class="form-group">
                        <label for="instagram" class="col-form-label">Instagram</label>
                        <input type="text" class="form-control" name="instagram" id="instagram" placeholder="http://www.instagram.com"  value="{{!empty($social_infos->instagram)?$social_infos->instagram:''}}">
                     </div>
                     <div class="form-group">
                        <label for="youtube" class="col-form-label">Youtube</label>
                        <input type="text" class="form-control" name="youtube" id="youtube" placeholder="http://www.youtube.com"  value="{{!empty($social_infos->youtube)?$social_infos->youtube:''}}">
                     </div> 
               <button type="submit" class="btn btn-sm pull-left btn-warning text-white" name="submit" id="submit">Update</button> 
               </div> 
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection 
@section('custom_script')
@if(Session::has('success'))
<script>
   swal({
     title: "Updated!",
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
