 @extends('admin.admin_master')
@section('title','Order Details | Bread & Beyond')
@section('custom_css')
<style>
  .tk{
  /*font-size: 25px!important;*/
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
               <th>Order Date:</th>
               <td>
                @php
                  echo date('F j Y',strtotime($order_details->order_date)).' / '.strtoupper($order_details->order_take_deliver_time);
                @endphp
              </td>
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
               <td>{{!empty($order_details->customer->customer_email)?$order_details->customer->customer_email:'N/A'}}</td>
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
      <div style="font-size: 14px;" class="col-md-12">
         <div class="row">
          <table class="table table-bordered">
            <thead>
              <tr>
                <th>Sl.</th>
                <th class="no-print">Photo</th>
                <th>Item</th>
                <th>Price</th>  
                <th>Quantity</th>
                <th>Total</th>
              </tr>
            </thead>
            <tbody>
              @php($i=1)
            @foreach($product_order as $details)
            <tr>
                <td>{{$i++}}</td>
                <td class="no-print">
                  <img height="50px" width="50px" src="{{url('/')}}/{{$details->item_image}}" alt="{{url('/')}}/{{$details->item_image}}">
                </td>
                <td>{{$details->item_name}}<br></td>
                <td>৳{{$details->item_price}}</td> 
                <td>{{$details->item_qty}}</td>
                <td>৳{{$details->item_price*$details->item_qty}}</td>
              <td></td>
              </tr>
           @endforeach
            </tbody>
          </table> 
         </div>
      </div>
           <div class="col-md-6"> <br>
              <?php
               if($order_details->order_status == 0){ ?>
                   <a href="{{url('accept-order')}}/{{$order_details->id}}" class="btn btn-sm btn-success print">Accept Order</a>
                   <a href="{{url('cancel-order')}}/{{$order_details->id}}" class="btn btn-sm btn-danger print">Cancel Order</a>
               <?php }elseif($order_details->order_status == 1){ ?>
               <span class="btn btn-sm btn-success">Hold On Receive</span>
               <a href="{{url('cancel-order')}}/{{$order_details->id}}" class="btn btn-sm btn-danger print">Cancel Order</a>
              <?php }elseif($order_details->order_status == 2){ ?>
               <span class="btn btn-sm btn-danger">Order Canceled</span>  <?php } ?>
           </div>
           <div class="col-md-6"> <br>
           <a onclick="myFunction()" target="_blank" class="btn btn-sm btn-primary text-white print"><i class="fa fa-fw fa-lg fa-print"></i>Print</a>
           </div>
 </div>
</div>
@endsection
@section('custom_script')
@if(Session::has('success'))
<script>
   swal({
     title: "Accept Order!!",
     text: "",
     type: "success",
     // timer: 1000
     });
</script>
@endif
@if(Session::has('cancel'))
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
  $('#web_section').hide();
function myFunction() {
    $('.print').hide();
    $('#web_section').show();
    window.print();
}
window.onafterprint = function(){
      $('#web_section').hide();
}
</script>
@endsection
