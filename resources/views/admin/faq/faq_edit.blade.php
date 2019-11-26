@extends('admin.admin_master')
@section('title','Ecommerce | Faq Edit')
@section('content')
<div class="row">
  <div class="col-md-2"></div>
  <div class="col-md-8">
     <div class="tile">
        <div class="tile-body">
           <div class="modal-content">
              <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Faq Update</h5>
                 </button>
              </div>
              <div class="modal-body">
                 <form action="{{url('faq-update-process')}}" method="post">
                    @csrf
                    <input type="hidden" name="faq_id" value="{{$get_by_id->id}}">
                    <div class="form-group">
                       <label for="faq_question" class="col-form-label">Faq Question</label>
                       <input type="text" class="form-control" name="faq_question" id="faq_question" placeholder="Social Name" value="{{$get_by_id->faq_question}}" required>
                    </div>
                    <div class="form-group">
                       <label for="color_name" class="col-form-label">Faq Answer</label>
                        <textarea name="faq_answer" class="form-control" rows="8" cols="80" required>{{$get_by_id->faq_answer}}</textarea>
                    </div>
              </div>
              <div class="modal-footer">
              <button type="submit" class="btn btn-sm btn-warning text-white" name="submit" id="submit">Update</button>
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
   document.forms['edit_form'].elements['publication_status'].value={{$get_by_id->publication_status}}
</script>
@endsection
