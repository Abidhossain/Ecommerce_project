@extends('admin.admin_master')
@section('title','Ecommerce | Footer Title List')
@section('custom_css')
@endsection
@section('content')

    <!-- modal -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    {{--  <a>Member List  <button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target=".bd-example-modal-lg">Member Add</button>
                     </a> --}}
                    <a href="{{ route('footer-title-add') }}" class="btn btn-sm btn-success pull-right mb-2">Add Footer Title</a>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @php $i=1 @endphp
                        @foreach($footer_titles as $footer_title)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$footer_title->footer_title}}</td>
                                <td class="d-flex">
                                    <a href="{{ route('footer-title-edit',$footer_title->id) }}" class="mr-2 btn btn-info btn-sm" data-toggle="tooltip" data-placement="left" title="Edit"><i class="fa fa-edit"></i></a>



                                    <form id="delete-form" method="post" action="{{ route('footer-title-delete') }}"
                                          >
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $footer_title->id }}">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="if(!confirm('Are you sure to delete?')) return false;"><i class="fa fa-trash"></i></button>
                                    </form>
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
@endsection
