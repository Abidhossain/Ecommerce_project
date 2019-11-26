 @extends('admin.admin_master')
@section('title','Ecommerce | Brand Edit')
@section('content') 
<div class="row">
   <div class="col-md-3"></div>
   <div class="col-md-6">
      <div class="tile">
         <div class="tile-body">
            <div class="modal-content">
               <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Tags Update</h5> 
                  </button>
               </div>
               <div class="modal-body">
                  <form id="insert_form" action="{{ route('brand_update',$get_by_id->id)}}" method="post" name="edit_form" enctype="multipart/form-data">
                     @csrf
                     <input type="hidden" name="id" value="{{$get_by_id->id}}">
                     <div class="form-group">
                        <label for="tags_name" class="col-form-label">Name Name</label>
                        <input type="text" class="form-control" name="tags_name" id="tags_name"  value="{{$get_by_id->name}}">
                     </div>  
               </div>
               <div class="modal-footer">
               <button type="submit" class="btn btn-sm btn-warning" name="submit" id="submit">Update</button>  
               </div> 
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('custom_script') 
@endsection