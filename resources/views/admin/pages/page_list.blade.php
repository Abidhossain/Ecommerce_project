@extends('admin.admin_master')
@section('title','Ecommerce | Page List')
@section('custom_css')
<link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
<script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
<style>
  .badge{
  border-radius: 0px;
  padding: 5%;
  }
</style>
@endsection
@section('content')
<div class="row">
  <div class="col-md-12">
     <div class="tile">
        <div class="tile-body">
              @error('category_slug')
              <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
              </span>
              @enderror
           </h4>
           <table class="table table-bordered">
              <thead>
                 <tr>
                    <th>Sl</th>
                    <th>Page Name</th>
                    <th>Page Title</th>
                    <th>Page Slug</th> 
                    <th>Action</th>
                 </tr>
              </thead>
              @php $i=1 @endphp
              <tbody>
                @foreach($page_infos as $data)
                  <tr>
                    <td>{{$i++}}</td>
                    <td>{{$data->page_name}}</td>
                    <td>{{$data->page_title}}</td>
                    <td>{{$data->page_slug}}</td> 
                    <td>
                      <a href="{{url('page-edit')}}/{{$data->id}}"><i class="fa fa-edit btn btn-sm btn-success" aria-hidden="true"></i></a>
                      <a href="{{url('page-delete')}}/{{$data->id}}" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash btn btn-sm btn-danger" aria-hidden="true"></i></a></td>
                  </tr>
                @endforeach
              </tbody>
           </table>
        </div>
     </div>
  </div>
</div>
<script>
$('.summernote').summernote({
  placeholder: 'Write short description about your products',
  tabsize: 2,
  height: 100,
   airMode: true
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
