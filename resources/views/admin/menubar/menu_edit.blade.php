@extends('admin.admin_master')
@section('title','Ecommerce | Menu Edit')
@section('custom_css')
<style>
  .badge{
  border-radius: 0px;
  padding: 5%;
  }
  strong{
    font-size: 14px;
  }
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
     <div class="tile">
        <div class="tile-body">
          <h4>Menu Edit</h4>
           <form action="{{url('menu-update-process')}}" name="edit_form" method="post">
              @csrf
              <div class="row">
                 <div class="col-md-6">
                   <div class="form-group">
                      <label for="menu_name" class="col-form-label">Menu Name</label>
                      <input type="hidden" class="form-control" name="menu_id" value="{{$get_by_id->id}}">
                      <input type="text" class="form-control" name="menu_name" id="menu_name" placeholder="Enter menu name" required value="{{$get_by_id->menu_name}}">
                   </div>
                 </div>
                 <div class="col-md-6">
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
                    <input type="text" class="form-control" name="menu_link"  placeholder="Menu Link" value="{{$get_by_id->menu_link}}">
                 </div>
              </div>
              <div class="col-md-6">
                 <div class="form-group">
                    <label for="position" class="col-form-label">Position</label>
                    <input type="number" class="form-control" name="position" id="position"  placeholder="Position" required value="{{$get_by_id->position}}">
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
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-warning">Update</button>
        </div>
        </form>
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
document.forms['edit_form'].elements['publication_status'].value={{$get_by_id->publication_status}}
document.forms['edit_form'].elements['menu_type'].value={{$get_by_id->menu_type}}
</script>
@endsection
