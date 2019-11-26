@extends('admin.admin_master')
@section('title','Ecommerce | Page Edit')
@section('custom_css')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<style>
select.form-control:not([size]):not([multiple]) {
    height: calc(2.25rem + 14px);
}
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
  <div class="col-md-12">
     <div class="tile">
        <div class="tile-body">
          <h4>Page Add</h4>
           <form action="{{url('page-update-process')}}" name="edit_form" method="post">
              @csrf
              <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                       <label for="page_name" class="col-form-label">Page Name <span class="text">*</span></label>
                       <input type="text" class="form-control  @error('page_name') is-invalid @enderror" name="page_name" id="page_name" placeholder="Page Name" value="{{$edit_by_id->page_name}}">
                       <input type="hidden"  name="page_id" id="page_id" placeholder="Page Name" value="{{$edit_by_id->id}}">
                       @error('page_name')
                       <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                       <label for="page_title" class="col-form-label">Page Title</label>
                       <input type="text" class="form-control  @error('page_title') is-invalid @enderror" name="page_title" id="page_title" placeholder="Page Title" value="{{$edit_by_id->page_title}}">
                       @error('page_title')
                       <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                     </div>
                 </div> 
                 <div class="col-md-6">
                    <div class="form-group">
                       <label for="page_position" class="col-form-label">Page Position <span class="text">*</span></label>
                        <select class="form-control" name="page_position" id="page_position">
                          <option value="">---Select Status---</option>
                          <option value="1">Quick Links</option>
                          <option value="2">Company Terms & Conditions / Refund </option>
                          <option value="3">Others</option>
                        </select>
                      </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                       <label for="base_url" class="col-form-label">Publication Status <span class="text">*</span></label>
                        <select class="form-control" name="publication_status" required> 
                          <option value="1">Publish</option>
                          <option value="2">Un-publish</option>
                        </select>
                      </div>
                 </div>
                 <div class="col-md-12">
                    <div class="form-group">
                       <label for="summernote" class="control-label">Page Description <span class="text">*</span></label>
                       <textarea  class="form-control summernote" name="page_description"  rows="4">{{$edit_by_id->page_description}}</textarea>
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
<script>
  $('.summernote').summernote({
    placeholder: 'Write short description about your products',
    tabsize: 2,
    height: 450
  });
</script>
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
document.forms['edit_form'].elements['page_position'].value={{$edit_by_id->page_position}}
document.forms['edit_form'].elements['publication_status'].value={{$edit_by_id->publication_status}}
</script>
@endsection
