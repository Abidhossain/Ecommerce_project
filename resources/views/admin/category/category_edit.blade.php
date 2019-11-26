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
                  <h5 class="modal-title" id="exampleModalLabel">Category Update</h5> 
                  </button>
               </div>
               <div class="modal-body">
                 
               
        <form action="{{route('category_update',$get_by_id->id)}}" name="edit_form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="category_name" class="col-form-label">Category Name</label>
                     <input type="text" class="form-control" name="name" id="name" value="{{$get_by_id->name}}" required>
                  </div>
               </div>  
                <div class="col-md-6">
                   <div class="form-group">
                      <label for="main_cat" class="col-form-label">Product Type</label>
                     <select class="form-control"  name="product_type_id" id="main_cat" required >
                       <option value="">----- Choose Product Type -----</option>
                       @foreach($product_type_infos as $product_type)
                       <option value="{{$product_type->id}}">{{$product_type->product_type_name}}</option>
                       @endforeach
                     </select>
                   </div>
                 </div>  
                         <div class='form-group col-md-6'>
                            <label for='product_image' class='col-form-label'>Category Image </label>
                            <input class='form-control' multiple='multiple' min="1" name='image' type='file' id='category_image'>
                         </div>

              <div class="col-md-12">
            <div class="form-group">
               <label for="summernote2" class="control-label">Category Description </label>
               <textarea  class="form-control summernote" name="description" value="{{$get_by_id->description}}"  rows="4" >{{$get_by_id->description}}</textarea>
            </div>
            </div> 
             <div class="col-md-12"> 
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" name="show_on_category" type="checkbox" value="1" {{$get_by_id->show_on_category == 1 ? 'checked' : 0 }} >Show on View
                  </label>
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
document.forms['edit_form'].elements['product_type_id'].value={{$get_by_id->product_type_id}} 
</script>
@endsection