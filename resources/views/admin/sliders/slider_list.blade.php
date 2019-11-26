 @extends('admin.admin_master')
@section('title','Ecommerce | Slider List')
@section('custom_css')
@endsection
@section('content')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content container-fluid">
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Slider Add</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
         <form action="{{url('slider-add-procsss')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="slider_title" class="col-form-label">Slider Title</label>
                     <input type="text" class="form-control" name="slider_title" id="slider_title" placeholder="Slider Title">
                  </div>
               </div> 
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="slider_slug" class="col-form-label">Slider Slug</label>
                     <input type="text" class="form-control" name="slider_slug" id="slider_slug" placeholder="Slider Title">
                  </div>
               </div>


               <div class="col-md-12">
                  <div class="form-group">
                     <label for="slider_image" class="col-form-label">Slider Photo</label>&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;" class="text-danger"><i>Image Size Must Be 874 x 450 pixels</i></span>
                     <input type="file" class="form-control" name="slider_image" id="slider_image">
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="slider_position" class="col-form-label">Slider Position</label>
                     <input type="number" class="form-control" name="slider_position" id="slider_position" placeholder="Slider Position">
                  </div>
               </div>

               <div class="col-md-12">
                <div class="form-group">
                     <label for="description" class="control-label">Slider Description </label>
                     <textarea  class="form-control summernote" name="description" rows="4" ></textarea>
                  </div>
                  </div>
            
            </div>
            <div class="modal-footer">
               <button type="submit" class="btn btn-sm btn-success" name="submit" id="submit">Submit</button>
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
            <h4>Slider List  <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Slider Add</button>
            </h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Slider Title</th>
                     <th>Slider Slug</th>
                     <th>Slider Image</th>
                     <th>Slider Position</th> 
                     <th>Action</th>
                  </tr>
               </thead>
               @php $i=1 @endphp
               @foreach($slider_infos as $slider)
               <tr>
                  <td>{{$i++}}</td>
                  <td>{{$slider->slider_title}}</td>
                  <td>{{$slider->slider_slug}}</td>
                  <td>
                     <img src="{{url('/')}}/{{$slider->slider_image}}" height="70px" width="150px">
                  </td>
                  <td>{{$slider->slider_position}}</td> 
                  <td>
                       <a href="{{url('slider-edit')}}/{{$slider->slider_id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                        <a  href="{{url('slider-delete')}}/{{$slider->slider_id}}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
                  </td>
               </tr>
               @endforeach
               <tbody>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
@endsection
@section('custom_script')
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
