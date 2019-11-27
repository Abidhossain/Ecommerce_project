@extends('admin.admin_master')
@section('title','Order Details | Bread & Beyond')
@section('custom_css')
<style>
    .tk{
        font-weight: 600;
    }
    .table td, .table th, .table tr {
    padding: 0px 2px 6px 8px;
    vertical-align: bottom;
    border-top: 1px solid #dee2e6;
    }

    td{
    padding-left: 5px!important;
    }
    table{
    font-size: 14px!important;
    }
    td{
    padding-top: -8px!important;
    }
</style>
@endsection
@section('content')
    <div class="tile">
        <div class="row" id="web_section">
            <div class="col-md-12">
                <img src="{{url('/')}}/{{$web_data->company_logo}}" style="float:right;height: 70px;width: 250px;">
            </div>
            <div class="col-md-12">
                <p class="text-right">{{$web_data->company_email}}</p>
                <p class="text-right">{{$web_data->phone_1?$web_data->phone_1:$web_data->phone_2}}</p>
                <p class="text-right">{{$web_data->company_address}}</p>
            </div>
        </div>
        <h3 class="tile-title"><small>Order Information</small></h3>
        <div class="row">
            <div class="col-md-6">
           <table class="table table-bordered">
             <tr>
               <th>Order ID:</th>
               <td>{{$order_details->id}}</td>
             </tr>
             <tr>
                <th>Order Date</th>
                <td>
                @php
                  echo date('F j Y',strtotime($order_details->order_date)).' / '.strtoupper($order_details->order_take_deliver_time);
                @endphp
               </td>
             </tr>
             <tr>
               <th>Billing Number:</th>
               <td>{{$order_details->shipping->billing_phone}}</td>
             </tr>
             <tr>
               <th width="35%">Billing Name</th>
               <td>{{$order_details->shipping->billing_name}}</td>
             </tr>
             <tr>
               <th width="35%">Mail Address</th>
               <td>{{(!empty($order_details->customer->customer_email)?$order_details->customer->customer_email:'')}}</td>
             </tr> 
               <tr>
                   <th width="35%">Shipping Name</th>
                   <td>{{$order_details->shipping->shipping_name}}</td>
               </tr>
               <tr>
                   <th width="35%">Shipping Address</th>
                   <td>{{$order_details->shipping->shipping_address}}</td>
               </tr> 
               <tr>
                   <th>Shippinig Number:</th>
                   <td>{{$order_details->shipping->shipping_phone}}</td>
               </tr>
           </table>
         </div>
         <div class="col-md-6">
           <table class="table table-bordered">
             <tr>
               <th>Payment Method :</th>
               <td>N/A</td>
             </tr>
             <tr>
               <th>Payment Status :</th>
               <td>N/A</td>
             </tr>
             <tr>
               <th>Delivery Charge</th>
               <td> <span class="tk">৳</span>{{$order_details->delivery_charge}}</td>
             </tr>
               <tr>
                 <th>Discount</th>
                 <td><span class="tk">৳</span>{{$order_details->discount}}</td>
               </tr>
            @php($sum=0)
            @foreach($product_order as $price)
               <?php
                $sum = $sum+($price->item_price*$price->item_qty);
               ?>
             @endforeach
              <tr>
               <th>Sub Total :</th>
               <td> <span class="tk">৳</span>{{(($sum+$order_details->delivery_charge)-$order_details->discount)}}</td>
             </tr>
            </table>
         </div>
            <div  style="font-size: 14px;"  class="col-md-12">
                <div class="row">
                    @foreach($product_order as $details)
                        <div class="col-md-4">
                            <img style="height: 150px;width: 100%;" src="{{url('/')}}/{{$details->image_path}}" alt="{{$details->image_path}}">
                        </div>
                        <div class="col-md-8 print_design">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-6 design">
                                        <b>Item Name :</b> {{$details->item_name}}
                                    </div>
                                    <div class="col-md-6 design">
                                        <b>Item Price :</b>  <span class="tk">৳</span>{{$details->item_price}}
                                    </div>
                                    <div class="col-md-6 design">
                                        <b>Item Qty :</b> {{$details->item_qty}}
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->top_layer_flavour)){
                                            echo '<b>Top Tire Flavor : </b>'.$details->top_layer_flavour;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->middle_layer_flavour)){
                                            echo '<b>Middle Tire Flavor : </b>'.$details->middle_layer_flavour;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->bottom_layer_flavour)){
                                            echo '<b>Bottom Tire Flavor : </b>'.$details->bottom_layer_flavour;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->non_tire_cake_flavour)){
                                            echo '<b>Non Tire Flavor : </b>'.$details->non_tire_cake_flavour;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->first_layer_sponge)){
                                            echo '<b>1st Layer : </b>'.$details->first_layer_sponge;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->second_layer_sponge)){
                                            echo '<b>2nd Layer: </b>'.$details->second_layer_sponge;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->third_layer_sponge)){
                                            echo '<b>3rd Layer: </b>'.$details->third_layer_sponge;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->first_layer_cream)){
                                            echo '<b>1st Layer Cream : </b>'.$details->first_layer_cream;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->second_layer_cream)){
                                            echo '<b>2nd Layer Cream : </b>'.$details->second_layer_cream;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->fruit_filling_name)){
                                            echo '<b>Fruit Feeling : </b>'.$details->fruit_filling_name;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->message_color)){
                                            echo '<b>Message Color : </b>'.$details->message_color;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->message_on_cake)){
                                            echo '<b>Message On Cake : </b>'.$details->message_on_cake;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <?php
                                        if(!empty($details->cake_total_size)){
                                            echo '<b>Cake Size : </b>'.$details->cake_total_size;
                                        }
                                        ?>
                                    </div>
                                    <div class="col-md-6 design">
                                        <span><b>Total :</b> <span class="tk">৳</span>{{$details->item_price*$details->item_qty}}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <?php
                if($order_details->order_status == 1){ ?>
            <form  action="{{url('go-for-shipping')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$order_details->id}}">
                <div class="col-md-3"></div>
                <div class="col-md-3"><br>
                    <label for=""><input autofocus type="text" name="delivered_by" class="from-control d-print-none" placeholder="Deliver by" required></label>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-sm btn-success d-print-none">Go for shipping</button>

                    <a href="{{url('cancel-order')}}/{{$order_details->id}}" class="btn btn-sm btn-danger d-print-none">Cancel Order</a>

                    <a onclick="myFunction()" target="_blank" class="btn btn-sm btn-primary text-white d-print-none"><i class="fa fa-fw fa-lg fa-print"></i>Print</a>
                </div>
            </form>
               <?php }elseif($order_details->order_status == 2){ ?>
            <div class="col-md-12"><br>
                <button type="submit" class="btn btn-sm btn-success d-print-none">Ship Procesing...</button>

                <a href="{{url('cancel-order')}}/{{$order_details->id}}" class="btn btn-sm btn-danger d-print-none">Cancel Order</a>

                <a onclick="myFunction()" target="_blank" class="btn btn-sm btn-primary text-white d-print-none"><i class="fa fa-fw fa-lg fa-print"></i>Print</a>

                    <span id="customer_signature"> Customer Signature :</span>

            </div>
                <?php } ?>

        </div>
    </div>

            <?php
                if($order_details->order_status == 1){ ?>
            <form  action="{{url('go-for-shipping')}}" method="post">
                @csrf
                <input type="hidden" name="id" value="{{$order_details->id}}">
                <div class="col-md-3"></div>
                <div class="col-md-3"><br>
                    <label for=""><input autofocus type="text" name="delivered_by" class="from-control d-print-none" placeholder="Deliver by" required></label>
                </div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-sm btn-success d-print-none">Go for shipping</button>

                    <a href="{{url('cancel-order')}}/{{$order_details->id}}" class="btn btn-sm btn-danger d-print-none">Cancel Order</a>

                    <a onclick="myFunction()" target="_blank" class="btn btn-sm btn-primary text-white d-print-none"><i class="fa fa-fw fa-lg fa-print"></i>Print</a>
                </div>
            </form>
               <?php }elseif($order_details->order_status == 2){ ?>
            <div class="col-md-12"><br>
                <button type="submit" class="btn btn-sm btn-success d-print-none">Ship Procesing...</button>

                <a href="{{url('cancel-order')}}/{{$order_details->id}}" class="btn btn-sm btn-danger d-print-none">Cancel Order</a>

                <a onclick="myFunction()" target="_blank" class="btn btn-sm btn-primary text-white d-print-none"><i class="fa fa-fw fa-lg fa-print"></i>Print</a>

                    <span id="customer_signature"> Customer Signature :</span>

            </div>
                <?php } ?>

        </div>
    </div>
@endsection


@section('custom_script')
    @if(Session::has('success'))
        <script>
            swal({
                title: "Order On Ship!!",
                text: "",
                type: "success",
                // timer: 1000
            });
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            swal({
                title: "Order Canceled!!",
                text: "",
                type: "error",
                // timer: 1000
            });
        </script>
    @endif
    <script>
        $('#customer_signature').hide();
        $('#web_section').hide();
        function myFunction() {
            $('#customer_signature').show();
            $('#web_section').show();
            window.print();
        }
        window.onafterprint = function(){
            $('#customer_signature').show();
            $('#customer_signature').hide();
            $('#web_section').hide();
        }
    </script>
@endsection
 