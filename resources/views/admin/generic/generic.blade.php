@extends('admin.admin_master')
@section('title','Ecommerce | Generic List')
@section('custom_css')
@endsection
@section('content')
    <!-- modal -->
    <div class="row">
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-body">
                    <h4>Generic Add</h4>
                    <form action="{{url('generic-add')}}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="generic_name" class="col-form-label">Generic Name</label>
                                    <input type="text" class="form-control @error('generic_name') is-invalid @enderror" name="generic_name" id="generic_name" placeholder="Generic Name" required>
                                    <small class="text-danger">{{ $errors->first('generic_name') }}</small>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-sm btn-success text-white" id="submit">Submit</button>
                        <button type="reset" class="btn btn-sm btn-danger" data-dismiss="modal">Reset</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="tile">
                <div class="tile-body">
                    <h4>Generic List</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Generic Name</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @php $i=1 @endphp
                        <tbody>
                        @foreach($generic_list as $data)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$data->generic_name}}</td>
                                <td>
                                    <a  href="{{url('generic-delete')}}/{{$data->id}}" class="delete btn btn-sm btn-danger text-white" data-toggle="tooltip" data-placement="top" title="Delete" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
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
