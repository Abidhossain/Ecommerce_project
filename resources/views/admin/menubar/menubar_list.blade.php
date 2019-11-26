@extends('admin.admin_master')
@section('title','Ecommerce | Menubar List')
@section('custom_css')
@endsection
@section('content')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
     <div class="modal-content container-fluid">
       <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Menubar Add</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
       </div>
        <form action="{{url('menu-add-procsss')}}" method="post">
           @csrf
           <div class="row">
              <div class="col-md-12">
                 <div class="form-group">
                    <label for="menu_name" class="col-form-label">Menu Name</label>
                    <input type="text" class="form-control  @error('menu_name') is-invalid @enderror" name="menu_name" id="menu_name" placeholder="Enter menu name" required value="{{old('menu_name')}}">
                    @error('menu_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                 </div>
              </div>
              <div class="col-md-12">
                 <div class="form-group">
                    <label for="menu_type" class="col-form-label">Menu Type</label>
                    <select class="form-control" name="menu_type">
                      <option value="">---Select Menu Type---</option>
                      <option value="0">Slug</option>
                      <option value="1">Main Menu</option>
                    </select>
                 </div>
              </div>
              <div class="col-md-12" id="slug">
                 <div class="form-group">
                    <label for="slug" class="col-form-label">Link</label>
                    <input type="text" class="form-control @error('menu_link') is-invalid @enderror" name="slug"  placeholder="Slug Link" value="{{old('menu_link')}}">
                    @error('menu_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                 </div>
              </div>
              <div class="col-md-6 main_menu">
                   <div class="form-group">
                      <label for="main_menu" class="col-form-label">Base Url</label>
                      <input type="text" class="form-control" value="{{url('/')}}" readonly>
                   </div>
              </div>
              <div class="col-md-6 main_menu">
                 <div class="form-group">
                    <label for="menu_link" class="col-form-label">Link</label>
                    <input type="text" class="form-control @error('menu_link') is-invalid @enderror" name="menu_link" id="main_menu"  placeholder="Main Menu Link" value="{{old('menu_link')}}">
                    @error('menu_link')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                 </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="position" class="col-form-label">Position</label>
                    <input type="number" class="form-control" name="position" id="position"  placeholder="Position" required value="{{old('position')}}">
                 </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="publication_status" class="col-form-label">Status</label>
                    <select name="publication_status" id="publication_status" class="form-control" required>
                       <option value="">---Select Status---</option>
                       <option value="1">Publish</option>
                       <option value="0">Unpublish</option>
                    </select>
                 </div>
              </div>
           </div>
           <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-warning" name="submit" id="submit">Submit</button>
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
           <h4>Menu List<button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Menu Add</button>
           </h4>
           <table class="table table-bordered">
              <thead>
                 <tr>
                    <th>Sl</th>
                    <th>Menu Name</th>
                    <th>Menu Link</th>
                    <th>Position</th>
                    <th>Status</th>
                    <th>Action</th>
                 </tr>
              </thead>
              @php $i=1 @endphp

              <tbody>
                @foreach($menu_infos as $data)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$data->menu_name}}</td>
                  <td>{{$data->menu_link}}</td>
                  <td>{{$data->position}}</td>
                  <td>
                    <?php
                       if ($data->publication_status == 1) { ?>
                    <span class="badge badge-info">Publish</span>
                    <?php }else{ ?>
                    <span class="badge badge-danger">Unpublish</span>
                    <?php } ?>
                  </td>
                  <td>
                      <a href="{{url('menu-edit')}}/{{$data->id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>
                          <a  href="{{url('menu-delete')}}/{{$data->id}}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a></td>
                   </tr>

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
      $('.main_menu').hide();
      $('#slug').hide();
        $(function() {
          $('select[name="menu_type"]').on('click', function() {
              if ($(this).val() == '0') {
                  $('#slug').show();
                  $('.main_menu').hide();
              }else if($(this).val() == '1'){
                  $('.main_menu').show();
                  $('#slug').hide();
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
