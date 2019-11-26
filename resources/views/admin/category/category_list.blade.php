 @extends('admin.admin_master')
@section('title','Ecommerce | Category List')
@section('custom_css')
<style>
   .badge{
   border-radius: 0px;
   padding: 5%!important;
   }
</style>
@endsection
@section('content')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content container-fluid">
         <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Category Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> 
         </div>
         <form action="{{url('category-add-procsss')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="category_name" class="col-form-label">Category Name</label>
                     <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" required>
                  </div>
               </div> 
                <div class="col-md-6">
                   <div class="form-group">
                      <label for="main_cat" class="col-form-label">Product Type</label>
                     <select class="form-control dynamic"  name="product_type_id" id="main_cat" required >
                       <option value="">----- Choose Product Type -----</option>
                       @foreach($product_type_infos as $id => $product_type)
                       <option value="{{$product_type->id}}">{{$product_type->product_type_name}}</option>
                       @endforeach
                     </select>
                   </div>
                 </div> 
                         <div class='form-group col-md-6'>
                            <label for='product_image' class='col-form-label'>Category Image </label> &nbsp;&nbsp;&nbsp;<span style="font-size: 14px;" class="text-danger"><i>Image Size Must Be 937 x 205 pixels</i></span>
                            <input class='form-control' multiple='multiple' min="1" name='image' type='file' id='category_image'>
                         </div>
             
              <div class="col-md-12">
            <div class="form-group">
               <label for="summernote2" class="control-label">Category Description <span class="text-danger">*</span></label>
               <textarea  class="form-control summernote" name="description"  rows="4">{{ old('description')}}</textarea>
            </div>

            </div> 
                     
             <div class="col-md-12"> 
                <div class="form-check">
                  <label class="form-check-label">
                    <input class="form-check-input" name="show_on_category" type="checkbox" value="1">Show On Home View
                  </label>
                </div>
             </div>
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-sm btn-success text-white" name="submit" id="submit">Submit</button>
               <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
            </div>
         </form>
      </div>
   </div>
</div>
<!-- modal -->
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="tile-body">
            <h4>Category List  <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Category Add</button> 
            </h4>
           @if ($errors->any())
               <div class="alert alert-danger">
                   <ol>
                       @foreach ($errors->all() as $error)
                           <li>{{ $error }}</li>
                       @endforeach
                   </ol>
               </div>
           @endif
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Category Name</th>
                     <th>Product Type</th>
                     <th>Image</th> 
                     <th>Category Description</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @php $i=1 @endphp
                  @foreach($category_infos as $data)
                  <tr>
                     <td>{{$i++}}</td>
                     <td>{{$data->name}}</td> 
                    <td>
                      {{-- {{$data->product_types->product_type_name}} --}}
                    </td> 
                     <td>
                        <img src="{{url('/')}}/{{$data->image}}" height="40px" width="40px" alt="">
                     </td> 
                     <td>{{$data->description}}</td>
                     <td>
                        <a href="{{url('category-edit')}}/{{$data->id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                        <a  href="{{url('category-delete')}}/{{$data->id}}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
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
