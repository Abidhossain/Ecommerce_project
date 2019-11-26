 @extends('admin.admin_master')
@section('title','Ecommerce | Category Edit')
@section('content')
<div class="row">
   <div class="col-md-1"></div>
   <div class="col-md-10">
      <div class="tile">
         <div class="tile-body">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Sub_Category Update</h5>
                  </button>
               </div>
               <div class="modal-body">


        <form name="edit_form" action="{{route('sub_category_update',$get_by_id->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="category_name" class="col-form-label">Sub Category Name <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" name="name" id="name" value="{{$get_by_id->name}}" required>
                  </div>
               </div>

                <div class="col-md-6">
                   <div class="form-group">
                      <label for="category_id" class="col-form-label">Category <span class="text-danger">*</span></label>
                     <select class="form-control dynamic"  name="category_id" id="category_id" required >
                       <option value="">----- Choose Categorey -----</option>
                       @foreach($main_category_infos as $main_cat)
                       <option value="{{$main_cat->id}}">{{$main_cat->name}}</option>
                       @endforeach
                     </select>
                   </div>
                 </div>

              <div class="col-md-12">
            <div class="form-group">
               <label for="summernote2" class="control-label">Sub_Category Description </label>
               <textarea  class="form-control summernote" name="description" value="{{$get_by_id->description}}"  rows="4" >{{$get_by_id->description}}</textarea>
            </div>
            </div>


               </div>
               <div class="modal-footer">
               <button type="submit" class="btn btn-sm btn-warning float-left text-white" name="submit" id="submit">Update</button>
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
</script>
<script>
document.forms['edit_form'].elements['publication_status'].value={{$get_by_id->publication_status}}
document.forms['edit_form'].elements['category_type'].value={{$get_by_id->category_type}}
document.forms['edit_form'].elements['category_id'].value={{$get_by_id->category_id}}
</script>
@endsection
