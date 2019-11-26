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
            <h5 class="modal-title" id="exampleModalLabel">Sub Category Add</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button> 
         </div>
         <form action="{{url('sub_category-add-procsss')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="category_name" class="col-form-label">Sub_Category Name <span class="text-danger">*</span></label>
                     <input type="text" class="form-control" name="name" id="name" placeholder="Category Name" required>
                  </div>
               </div>  
                <div class="col-md-6">
                   <div class="form-group">
                      <label for="main_cat" class="col-form-label">Category <span class="text-danger">*</span></label>
                     <select class="form-control dynamic"  name="category_id" id="main_cat" required >
                       <option value="">----- Choose Categorey -----</option>
                       @foreach($main_category_infos as $main_cat)
                       <option value="{{$main_cat->id}}">{{$main_cat->name}}</option>
                       @endforeach
                     </select>
                   </div>
                 </div>
             
              <div class="col-md-12">
            <div class="form-group">
               <label for="summernote2" class="control-label">Sub_Category Description <span class="text-danger">*</span></label>
               <textarea  class="form-control summernote" name="description"  rows="4">{{ old('description')}}</textarea>
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
            <h4>Sub Category List  <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Sub Category Add</button> 
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
                     <th>Sub_Category Name</th>
                     <th>Main Category</th>
                     <th>Sub_Category Description</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
                  @php $i=1 @endphp
                  @foreach($category_infos as $data)
                  <tr>
                     <td>{{$i++}}</td>
                     <td>{{$data->name}}</td>
                     <td>{{$data->category->name}}</td>
                     
                     <td>{{$data->description}}</td>
                     <td>
                        <a href="{{ route('sub_category_edit',$data->id) }}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                        <a  href="{{url('sub_category-delete')}}/{{$data->id}}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
                     </td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
            {{$category_infos->links()}}
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
