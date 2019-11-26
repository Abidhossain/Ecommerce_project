@extends('admin.admin_master')
@section('title','Order List | Bread & Beyond')
@section('custom_css')
@endsection
@section('content')
    <!-- modal -->
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <h4>Order List</h4>
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Order Date</th>
                            <th>Order By</th>
                            <th>Sub Total</th>
                            <th>Payment status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @php $i=1 @endphp
                        <tbody>
                        @foreach($order_info as $data)
                            <tr>
                                <td>{{$i++}}</td>
                                <td>{{$data->order_date}}</td>
                                <td>{{$data->order_by}}</td>
                                <td>{{$data->sub_total}}</td>
                                <td width="10%">
                                    <?php
                                    if($data->order_status == 0){ ?>
                                    <span style="padding: 5px!important;color: #ffffff" class="badge badge-warning">Pending</span>
                                    <?php }elseif($data->order_status == 1){ ?>
                                    <span style="padding: 5px!important;" class="badge badge-info">Order Processing</span>
                                    <?php }elseif($data->order_status == 2){?>
                                    <span style="padding: 5px!important;" class="badge badge-success">Order Complete</span>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="{{url('delivered-order-view')}}/{{$data->id}}" class="btn btn-info btn-sm" data-toggle="tooltip" data-placement="top" title="Order Details"><i class="fa fa-eye"></i></a>
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
