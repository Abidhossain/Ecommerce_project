@extends('admin.admin_master')
@section('title','Ecommerce | Discount List')
@section('custom_css')
@endsection
@section('content')
{{--    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-lg">--}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
            <div class="modal-content container-fluid">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Cupon Add</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    @if ($errors->any())
                        {{ implode('', $errors->all('<div>:message</div>')) }}
                    @endif
                </div>
                <form id="cupon_form" action="{{url('cupon-create')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cupon_code" class="col-form-label">Cupon Code</label>
                                <input type="text" class="form-control @error('cupon_code') is-invalid @enderror" name="cupon_code" id="cupon_code" placeholder="Cupoon Code" required>
                                @error('cupon_code')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="discount_type" class="col-form-label">Discount Type</label>
                                <select name="discount_type" id="discount_type" class="form-control">
                                    <option value="1">Sum</option>
                                    <option value="2">Percentage</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="start_date" class="col-form-label">From</label>
                                <input class="form-control" id="start_date" name="start_date"  type="text" placeholder="Start Date">
                                @error('from')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="expire_date" class="col-form-label">To</label>
                                <input class="form-control" name="expire_date" id="expire_date"  type="text" placeholder="Expire Date">
                                @error('expire_date')
                                <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                                @enderror
                            </div>
                        </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="discount_amount" class="col-form-label">Discount</label>
                            <input name="discount_amount" id="discount_amount" class="form-control" placeholder="Enter Discount">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-sm btn-success">Submit</button>
                        <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Close</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- modal -->
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <h4>Cupon List<button type="button" class="btn btn-sm btn-success pull-right" data-toggle="modal" data-target="#exampleModal">Cupon Add</button>
                    </h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Cupon Code</th>
                            <th>Cupon Type</th>
                            <th>Discount Amount</th>
                            <th>Start Date</th>
                            <th>Expire Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @php
                            $i=1
                        @endphp
                        <tbody>
                        @foreach($cupons as $data)
                            <tr>
                            <td>{{$i++}}</td>
                                <td>{{$data->cupon_code}}</td>
                                <td>
                                    @php
                                        if($data->discount_type == 1){
                                        echo 'SUM';
                                        }else{
                                        echo 'Parcentage';
                                        }
                                    @endphp
                                </td>
                                <td>
                                    @php
                                        if($data->discount_type == 1){
                                        echo $data->discount_amount.' Tk';
                                        }elseif($data->discount_type == 2){
                                         echo $data->discount_amount.'%';
                                        }
                                    @endphp
                                </td>
                                <td>
                                @php
                                    echo date('F j Y', strtotime($data->start_date))
                                @endphp
                                </td>
                                <td>
                                @php
                                    echo date('F j Y', strtotime($data->expire_date))
                                @endphp
                                </td>
                                <td>
                                    <a href="{{url('cupon-delete')}}/{{$data->id}}" class="btn btn-sm- btn-danger" onclick="return confirm('Are you sure you want to Delete?')"><i class="fa fa-trash"></i></a>
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
    $('#start_date').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
    $('#expire_date').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });
</script>
@if(Session::has('success'))
<script>
    swal({
        title: "Success!",
        text: "",
        type: "success",
        timer: 1000
    });
</script>
@endif
@endsection
