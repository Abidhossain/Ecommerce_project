@extends('admin.admin_master')
@section('title','Ecommerce | Page Add')
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
  .back_btn{
    margin-left: 10%!important;
  }
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
     <div class="tile">
        <div class="tile-body">
            <h4>Page Add <a href="{{url('page-list')}}" class="btn btn-sm btn-primary pull-right back_btn">Page List</a></h4>
           <form action="{{url('page-add-process')}}" method="post">
              @csrf
              <div class="row container-fluid">
                 <div class="col-md-6">
                    <div class="form-group">
                       <label for="page_name" class="col-form-label">Page Name </label>
                       <input type="text" class="form-control  @error('page_name') is-invalid @enderror" name="page_name" id="page_name" placeholder="Page Name" value="{{old('page_name')}}">
                       @error('page_name')
                       <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                    </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                       <label for="page_title" class="col-form-label">Page Title </label>
                       <input type="text" class="form-control  @error('page_title') is-invalid @enderror" name="page_title" id="page_title" placeholder="Page Title" value="{{old('page_title')}}" >
                       @error('page_title')
                       <span class="invalid-feedback" role="alert">
                       <strong>{{ $message }}</strong>
                       </span>
                       @enderror
                     </div>
                 </div>
           
                 <div class="col-md-6">
                    <div class="form-group">
                       <label for="page_position" class="col-form-label">Page Position <span class="text">*</span> </label>
                        <select class="form-control" name="page_position" id="page_position" required>
                          <option value="">---Select Status---</option>
                          <option value="1">Division 1</option>
                          <option value="2">Division 2</option>
                          <option value="3">Division 3</option>
                        </select>
                      </div>
                 </div>
                 <div class="col-md-6">
                    <div class="form-group">
                       <label for="publication_status" class="col-form-label">Publication Status <span class="text">*</span></label>
                        <select class="form-control" name="publication_status" id="publication_status" required>
                          <option value="">---Select Status---</option>
                          <option value="1">Publish</option>
                          <option value="2">Un-publish</option>
                        </select>
                      </div>
                 </div>
                 <div class="col-md-12">
                    <div class="form-group">
                       <label for="summernote" class="control-label">Page Description  </label>
                       <textarea  class="form-control summernote" name="page_description"  rows="4">{{old('page_description')}}</textarea>
                    </div>
                 </div>
              </div>
        </div>
        <div class="modal-footer">
        <button type="submit" class="btn btn-sm btn-success">Submit</button>
        <button type="reset" class="btn btn-sm btn-danger" >Reset</button>
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
@endsection
