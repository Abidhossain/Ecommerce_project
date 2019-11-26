 @extends('admin.admin_master')
@section('title','Ecommerce | Color List')
@section('custom_css') 
@endsection
@section('content')

<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content container-fluid">
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Social Add</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
         <form action="{{url('social-add-process')}}" method="post">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="social_name" class="col-form-label">Social Name</label>
                     <input type="text" class="form-control" name="social_name" id="social_name" placeholder="Social Name" required>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="social_link" class="col-form-label">Social Link</label>
                     <input type="url" class="form-control" name="social_link" id="social_link" placeholder="http://www.example.com" required>
                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="publication_status" class="col-form-label">Publication Status</label>
                     <select name="publication_status" id="publication_status" class="form-control" required>
                        <option value="">---Select Status---</option>
                        <option value="1">Publish</option>
                        <option value="0">Unpublish</option>
                     </select>
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
            <h4>Social List<button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Social Add</button></h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Social Name</th>
                     <th>Link</th>
                     <th>Publication Status</th>
                     <th width="10%">Action</th>
                  </tr>
               </thead>
               <tbody>
                  @php $i=1 @endphp
                    @foreach($social_infos as $data)
                    <tr>
                    <td>{{$i++}}</td>
                    <td>{{$data->social_name}}</td>
                    <td>{{$data->social_link}}</td>
                    <td>
                        <?php
                           if ($data->publication_status == 1) { ?>
                        <span class="badge badge-info">Publish</span>
                        <?php }else{ ?>
                        <span class="badge badge-danger">Unpublish</span>
                        <?php } ?>
                     </td>
                      <td>
                        <a href="{{url('social-edit')}}/{{$data->id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                            <a  href="{{url('social-delete')}}/{{$data->id}}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a></td>
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
@if(Session::has('success'))
<script>
   // swal({'success','','success',timer:1000});
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
