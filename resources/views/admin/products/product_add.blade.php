@extends('admin.admin_master')
@section('title','Ecommerce | Product Add')
@section('custom_css')
<script src="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script>
<!-- include summernote css/js -->
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<style type="text/css">
select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 18px);
}
.text-danger{
  color: red;
  font-size: 18px;
  font-weight: 600;
}
</style>
@endsection
@section('content')
<div class="row">
   <div class="col-md-1"></div>
   <div class="col-md-10">
      <div class="tile">
         <div class="tile-body">
               <div class="modal-header">
                  <h3 class="modal-title" id="exampleModalLabel">Product Add</h3>
                  <h4> <a href="{{ route('product-list') }}" class="btn btn-sm btn-success pull-right">Back to List</a></h4>
               </div>
               <div class="modal-body">
  <form id="insert_form" action="{{url('/product-add-process')}}" method="post" name="edit_form" enctype="multipart/form-data">
     @csrf
     <div class="row">
       <div class="col-md-6">
         <div class="form-group">
            <label for="product_name" class="col-form-label">Product Name</label>
            <input type="text" class="form-control  @error('product_name') is-invalid @enderror" name="product_name" id="product_name" placeholder="Product Name" required value="{{ old('product_name')}}">
         </div>
         @error('product_name')
             <span class="invalid-feedback" role="alert">
                 <strong>{{ $message }}</strong>
             </span>
         @enderror
       </div>

       <div class="col-md-6">
         <div class="form-group">
            <label for="main_cat" class="col-form-label">Category</label>
           <select class="form-control dynamic"  name="category_id" id="main_cat" required >
             <option value="">----- Choose Categorey -----</option>
             @foreach($category_infos as $main_cat)
             <option value="{{$main_cat->id}}">{{$main_cat->name}}</option>
             @endforeach
           </select>
         </div>
       </div>
       <div class="col-md-6">
         <div class="form-group">
            <label for="sub_category" class="col-form-label">Sub Category</label>
            <select class="form-control sub_sub_category" name="sub_category_id" id="sub_category">
             <option value="">----- Choose Sub Categorey -----</option>
             @foreach($sub_category_infos as $sub_cat)
             <option value="{{$sub_cat->id}}">{{$sub_cat->name}}</option>
             @endforeach
           </select>
         </div>
       </div>
      <div class="col-md-6">
        <div class="form-group">
        <label for="main_cat" class="col-form-label">Product Brand</label>
        <select class="form-control dynamic"  name="brand_id" id="main_cat">
          <option value="">----- Choose Brand -----</option>
          @foreach($brand_infos as $brand)
          <option value="{{$brand->id}}">{{$brand->name}}</option>
          @endforeach
        </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
        <label for="generic_id" class="col-form-label">Generic List</label>
        <select class="form-control"  name="generic_id" id="generic_id"> 
          @foreach($generic_info as $generic)
          <option value="{{$generic->id}}">{{$generic->generic_name}}</option>
          @endforeach
        </select>
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
        <label for="home_page_visiblity" class="col-form-label">Home Page Visiblity</label>
        <select class="form-control"  name="home_page_visiblity" id="home_page_visiblity">
          <option value="">----- Choose Brand -----</option>
          <option value="9999">Feature Product</option>
          <option value="99999">Category Product</option>
        </select>
        </div>
      </div>
       <div class="col-md-6">
         <div class="form-group">
            <label for="price" class="col-form-label">Product Price</label>
            <input type="number" class="form-control" name="price" id="price" placeholder="Enter Product Price" required value="{{ old('price')}}">
         </div>
       </div>

       <div class="col-md-6">
         <div class="form-group">
            <label for="discount" class="col-form-label">Discount</label>
            <input type="texg" class="form-control" name="discount" id="discount" placeholder="Enter Discount" value="{{ old('discount')}}">
         </div>
       </div>


           <div class="row container-fluid  add_item">
               <div class='form-group col-md-11'>
                  <label for='product_image' class='col-form-label'>Product Image </label>&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;" class="text-danger"><i>Image Size Must Be 600 x 600 pixels</i></span>
                  <input class='form-control' min="1" multiple='multiple' name='product_image[]' type='file' id='product_image' required>
               </div>
               <div class="col-md-1 mt-5">
                  <label for='product_image' class='col-form-label'> </label>
                   <button type="button" class="btn btn-success" id="add_more"><i class="fa fa-plus" aria-hidden="true"></i></button>
               </div>
           </div>

            <div class="col-md-12">
            <div class="form-group">
               <label for="summernote2" class="control-label">Product Description <span class="text-danger">*</span></label>
               <textarea  class="form-control summernote" name="description"  rows="4">{{ old('description')}}</textarea>
            </div>
            </div>

           <div class="col-md-10"></div>
           <div class="col-md-2">
           </div>

     </div>
</div>
        <div class="modal-footer ">
          <input type="submit" class="btn btn-sm btn-success submit" name="submit"  value="Add Product">
          <input type="reset" class="btn btn-sm btn-danger" name="submit" value="Reset">
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
</div>
@endsection
@section('custom_script')
<script>
/*====================Show Number By Ajax=======================*/
  $.ajaxSetup({
       headers: {
           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
       }
     });
$(document).ready(function(){
  $('.sub_sub').hide();
 //populate sub category
 $('.dynamic').change(function(){

  if($(this).val() != '')
  {
   var select = $(this).val();
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(data)
    {
      $('#sub_category').empty();
      $('#sub_category').append('<option value="null">Select Sub Category</option>');
      $.each(data, function (i, item) {
          $('#sub_category').append('<option value="'+item.id+'">'+item.category_name+'</option>');
      });

    },error:function(error){
      console.log(error);
    }
   })
  }
 });
 $('.sub_sub_category').change(function(){
  if($(this).val() != '')
  {
  $('.sub_sub').show();
   let select = $(this).val();
   let value = $(this).val();
   let dependent = $(this).data('dependent');
   let _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(data)
    {
      $('#sub_sub_category').empty();
      $('#sub_sub_category').append('<option value="null">Select Sub Sub Category</option>');
      $.each(data, function (i, item) {
          $('#sub_sub_category').append('<option value="'+item.category_id+'">'+item.category_name+'</option>');
      });
    },error:function(error){
      console.log(error);
    }
   })
  }
 });
 $('#main_cat').change(function(){
  $('#sub_category').val('');
  $('#sub_sub_category').val('');
 });
 $('#main_cat').change(function(){
  $('#sub_category').val('');
 });
    //color field and image field extend here
    var htmlString = `
    <div class='container'><div class="row ree"><div class="form-group col-md-11"><label for="product_image" class="col-form-label">Product Image</label><input class="form-control" multiple="multiple" name="product_image[]" type="file" id="product_image"></div><button type="button" style="margin-top:3%;margin-bottom:2%;" class="btnRemove btn btn-sm btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></button></div></div>
    `;
       $('#add_more').click (function () {
          $('.add_item').append(htmlString); // end append
            $('.ree .btnRemove').last().click (function () {
            $(this).parent().last().remove();
            }); // end click
          }); // end click
});
</script>
@if(Session::has('success'))
<script>
   swal({
     title: "Success!",
     text: "{{Session::get('success')}}",
     type: "success",
     timer: 1000,
     });
</script>
@endif
@if(Session::has('error'))
<script>
   swal('error','{{Session::get('error')}}','error');
</script>
@endif

@endsection
