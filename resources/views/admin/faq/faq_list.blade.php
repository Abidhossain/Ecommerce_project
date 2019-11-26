@extends('admin.admin_master')
@section('title','Ecommerce | Page List')
@section('custom_css') 
@endsection
@section('content')
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content container-fluid">
        <div class="modal-header">
           <h5 class="modal-title" id="exampleModalLabel">Faq Add</h5>
           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
           <span aria-hidden="true">&times;</span>
           </button>
        </div>
         <form action="{{url('faq-add-process')}}" method="post">
            @csrf
            <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="faq_question" class="col-form-label">Faq Question</label>
                     <input type="text" class="form-control" name="faq_question" id="faq_question" placeholder="Faq Question" required>

                  </div>
               </div>
               <div class="col-md-12">
                  <div class="form-group">
                     <label for="faq_answer" class="col-form-label">Faq Answer</label>
                     <textarea name="faq_answer" id="faq_answer" class="form-control" required placeholder="Faq Answer"></textarea>
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
          <h4>Faq List  <button type="button" class="btn btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Faq Add</button>
          </h4>
           <table class="table table-bordered">
              <thead>
                 <tr>
                    <th>Sl</th>
                    <th>Question</th>
                    <th>Answer</th>
                    <th width="8%">Action</th>
                 </tr>
              </thead>
              @php $i=1 @endphp
              <tbody>
                @foreach($faq_infos as $data)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$data->faq_question}}</td>
                    <td>{{$data->faq_answer}}</td>
                    <td>
                      <a href="{{url('faq-edit')}}/{{$data->id}}"><i class="fa fa-edit btn btn-sm btn-success" aria-hidden="true"></i></a>
                      <a href="{{url('faq-delete')}}/{{$data->id}}" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash btn btn-sm btn-danger" aria-hidden="true"></i></a></td>
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
