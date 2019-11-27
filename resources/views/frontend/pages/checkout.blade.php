@extends('frontend.master')
@section('title','Seba Pharmacy')
@section('content')
    <!--Checkout page section-->
    <div class="cart_c"> 
    <div class="checkout_page_bg">
        <div class="container">
            <div class="Checkout_section">
                <div class="row">
                    <div class="col-12">
                        <div class="user-actions">
                            <h3>
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                Returning customer?
                                <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_login" aria-expanded="true">Click here to login</a>

                            </h3>
                            <div id="checkout_login" class="
                                <?php 
                                    if(Session::get('id')){ ?>
                                        collapse show
                                    <?php }else{?>
                                    collapse
                                <?php } ?>
                            " data-parent="#accordion">
                                <div class="checkout_info">
                                    <p>If you have shopped with us before, please enter your details in the boxes below. If you are a new customer please proceed to the Billing & Shipping section.</p>
                          <form action="{{url('checkout-login-check')}}" method="post">
                              @csrf
                                <div class="form_group">
                                    <label for="customer_email">Email <span>*</span></label>
                                    <input type="email" name="customer_email" id="customer_email" placeholder="Email Address" value="{{Session::get('customer_email')}}" required>
                                </div>
                                <div class="form_group">
                                    <label for="password">Password <span>*</span></label>
                                    <input type="text" name="password" id="password" placeholder="Password" required>
                                </div>
                                <div class="form_group group_3 ">
                                    <button type="submit">Login</button>
                                    <label for="remember_box">
                                        <input id="remember_box" type="checkbox" >
                                        <span> Remember me </span>
                                    </label>
                                </div>
                                <a href="{{route('customer.index')}}">Create Account</a>
                            </form>
                                </div>
                            </div>
                        </div>
                        <div class="user-actions">
                            <h3>
                                <i class="fa fa-file-o" aria-hidden="true"></i>
                                Returning customer?
                                <a class="Returning" href="#" data-toggle="collapse" data-target="#checkout_coupon" aria-expanded="true">Click here to enter your code</a> 
                            </h3>
                            <div id="checkout_coupon" class="
                            <?php 
                                if(Session::get('discount_amount')){ ?>
                                collapse show
                                <?php }else{ ?>
                                collapse
                            <?php } ?>
                            " data-parent="#accordion">
                                <div class="checkout_info"> 
                                        <label for="">
                                            <input placeholder="Coupon code" name="cupon_code" id="cupon_code" type="text" value="{{Session::get('cupon_code')}}">
                                        </label>
                                        @if(Session::has('discount_amount')) 
                                        <input type="text" placeholder="Discount amount" value="৳{{Session::get('discount_amount')}}" disabled>
                                        @endif
                                        <button type="submit" onclick="cuponCode()">Apply coupon</button> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="checkout_form">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout_form_left">
                                <form action="{{url('place-order')}}" method="post" enctype="multipart/form-data">
                                    @csrf
            <input type="hidden" name="customer_id" value="{{Session::get('id')}}">
                                    <h3>Billing Details</h3>
                                    <div class="row"> 
                                        <div class="col-lg-6 mb-20">
                                            <label for="billing_name">Billing Name <span>*</span></label>
                                            <input type="text" name="billing_name" id="billing_name" placeholder="Billing Name" required>
                                        </div> 
                                        <div class="col-lg-6 mb-20">
                                            <label for="billing_phone">Phone<span>*</span></label>
                                            <input type="number" name="billing_phone" id="billing_phone" placeholder="Billing Phone" required>

                                        </div>
                                        <div class="col-lg-6 mb-20">
                                            <label for="billing_email">Email <span></span></label>
                                            <input type="email" name="billing_email" placeholder="Billing Email">

                                        </div>  
                                        <div class="col-lg-6 mb-20">
                                            <label for="billing_address">Address <span>*</span></label>
                                            <input placeholder="House number and street name" type="text" id="billing_address" name="billing_address" required>
                                        </div>  
                                        <div class="col-12 mb-20">
                                            <input id="address" type="checkbox" data-target="createp_account" required>
                                            <label class="righ_0" for="address" data-toggle="collapse" data-target="#collapsetwo" aria-controls="collapseOne">Ship to a different address?</label> 
                                            <div id="collapsetwo" class="collapse one" data-parent="#accordion">
                                                <div class="row">
                                                    <div class="col-lg-6 mb-20">
                                                        <label for="shipping_name">Name <span>*</span></label>
                                                        <input type="text" name="shipping_name" id="shipping_name" placeholder="Shipping Name" required>
                                                    </div>  
                                                    <div class="col-lg-6 mb-20">
                                                        <label for="shipping_phone">Phone<span>*</span></label>
                                                        <input type="number" name="shipping_phone" placeholder="Shipping Phone" id="shipping_phone" required> 
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <label for="shipping_email">Email <span></span></label>
                                                        <input type="email" placeholder="Shipping Email" name="shipping_email" id="shipping_email">
                                                    </div> 
                                                    <div class="col-lg-6 mb-20">
                                                        <label for="district">District<span>*</span></label> 
                                                        <select class="form-control district" name="district" id="district" required>
                                                            <option value="">---Select District---</option>
                                                            <option value="1">Inside Dhaka</option>
                                                            <option value="2">Outside Dhaka</option>
                                                        </select> 
                                                    </div>
                                                    <div class="col-12 mb-20">
                                                        <label for="shipping_address">Address <span>*</span></label>
                                                        <input placeholder="House number and street name" type="text" name="shipping_address" id="shipping_address" required>
                                                    </div> 
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="order-notes">
                                                <label for="order_note">Upload Prescription</label>
                                               <input type="file" name="prescription" class="form-control" onchange="ValidateSize(this)">
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="order-notes">
                                                <label for="order_note">Order Notes</label>
                                                <input id="order_note" class="form-control" placeholder="Notes about your order, e.g. special notes for delivery." name="order_note">
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6">
                            <div class="checkout_form_right"> 
                                    <h3>Your order</h3>
                                    <div class="order_table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            @php
                                                $total = 0;
                                                $cart_items = Cart::content();
                                            @endphp
                                            <tbody> 
    @foreach($cart_items as $item)
        <input type="text" name="item_id[]" placeholder="Item id" value="{{$item->id}}">
        <input type="hidden" name="item_name[]" placeholder="Item Name" value="{{$item->name}}">
        <input type="hidden" name="item_price[]" placeholder="Item Price" value="{{$item->price}}">
        <input type="hidden" name="item_qty[]" placeholder="Item Qty" value="{{$item->qty}}"> 
        <input type="hidden" name="item_image[]" placeholder="Item Image" value="{{$item->options->images}}">
            <tr>
                <td class="text-left">
                        <a href="#" style="font-size: 10px;border-radius: 50%;" class="btn btn-sm btn-danger" onclick="event.preventDefault(); removeCart($(this))"><i class="fa fa-remove"></i></a>&nbsp;&nbsp;&nbsp;
                    <input type="hidden" class="item_remove" name="rowId[]"  value="{{$item->rowId}}">  
                    {{$item->name}} <strong> × {{$item->qty}}</strong>
                </td>
                <td width="10%"> ৳{{$item->price*$item->qty}}</td>
            </tr> 
            @php 
                $total +=($item->price*$item->qty);
                $subtotal = $total;
            @endphp
                @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-right">Cart Subtotal</th>
                        <td>৳{{$subtotal}}</td>
                    </tr>
                    <tr>
                        <th class="text-right">Shipping</th>
                        <td>
                            <strong id="shipping_amount"></strong> 
                        </td>
                    </tr>
                    <tr>
                        <th class="text-right">Discount</th>
                        <td><strong>৳{{Session::get('discount_amount')}}</strong></td>
                    </tr>
                    @php 
                        $discount = 0;
                        $discount = Session::get('discount_amount'); 
                        $total = $total-$discount;
                    @endphp
<!--input-->
<input type="hidden" name="delivery_charge" id="ship_amount" placeholder="shipping amount">
<input type="text" name="sub_total" id="subtotal" placeholder="subtotal" value="{{$subtotal}}">
<input type="text" name="discount" id="discount" placeholder="discount" value="{{$discount}}">
<!--input-->
                    <tr class="order_total">
                        <th class="text-right">Order Total</th>
                        <td><strong>৳{{$total}}</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div> 
            <div class="form_group group_3 "> 
                        <label for="remember_box">
                            <input type="checkbox">
<span>I Accept <a target="_blank" href="{{url('page/')}}/{{'terms-conditions'}}">Terms & Conditions</a></span>
                        </label>
                    </div>
                    <div class="payment_method">
                        <div class="panel-default">
                            <input id="payment" name="check_method" type="radio" data-target="createp_account" value="1" required/>
                            <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Cash On Delivery</label>

                            <div id="method" class="collapse one" data-parent="#accordion"> 
                            </div>
                        </div>
                        <div class="panel-default">
                            <input id="payment_defult" name="check_method" type="radio" data-target="createp_account" value="2" required/>
                            <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult">PayNow <img alt=""></label> 
                            <div id="collapsedefult" class="collapse one" data-parent="#accordion"> 
                            </div>
                        </div>
                        <div class="order_button">
                            <button type="submit">Process To Order</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
</div>
</div> 
</div>
    <!--Checkout page section end-->
@endsection

 @section('custom_script')
 <script>  
    $('#shipping_amount').text('৳0.00');
    let ship_amount = 0; 
      $('.district').change(function(){ 
            if($('.district').val() == 1){
                if({{$subtotal}}>={{$delivery_charge->free_ship_above_or_equal}}){ 
                     ship_amount = 0;
                    $('#shipping_amount').text('৳'+ship_amount);
                    $('#ship_amount').val(ship_amount);
                }else{  
                 ship_amount = {{!empty($delivery_charge->inside_dhaka)?$delivery_charge->inside_dhaka:0}};
                $('#shipping_amount').text('৳'+ship_amount);
                $('#ship_amount').val(ship_amount);
                }
            }else if($('.district').val() == 2){   
                 if({{$subtotal}}>={{$delivery_charge->free_ship_above_or_equal}}){ 
                      ship_amount = 0;
                     $('#shipping_amount').text('৳'+ship_amount);
                     $('#ship_amount').val(ship_amount);
                 }else{  
                  ship_amount = {{!empty($delivery_charge->outside_dhaka)?$delivery_charge->outside_dhaka:0}};
                 $('#shipping_amount').text('৳'+ship_amount);
                 $('#ship_amount').val(ship_amount);
                 }
            }else{
            $('#shipping_amount').text('৳0.00');
            }
         })
 </script>
<script>
    @if(Session::has('login_success'))
      Notiflix.Notify.Success("{{Session::get('full_name').' login success'}}");
    @endif
    @if(Session::has('error'))
      Notiflix.Notify.Failure("Login Failed");
    @endif 

    function cuponCode(){
        let cupon_code = $('#cupon_code').val();
        // alert(cupon_code);
           $.ajax({
            url : "{{url('get-discount')}}/"+cupon_code,
            type: 'get', 
            success:function(data){
            $(".cart_c").load(location.href + ' .cart_c');
              Notiflix.Report.Success( 'WOW Get Cupon ৳{{Session::get('discount_amount')}}.00', '"Do not try to become a person of success but try to become a person of value." <br><br>Live Pharmacy', 'Click' );  
            }, 
            error:function (response) {
             console.log(response); 
               Notiflix.Report.Failure( 'No Cupon Found', '"We are sorry which cupon you entered has no credentials" <br><br>Live Pharmacy', 'Click' ); 
            }
        }) 
    }

          function ValidateSize(file) {
                var FileSize = file.files[0].size / 1024 / 1024; // in MB
                if (FileSize >= 2) {
                    alert('File size exceeds 2 MB');
                   window.location.reload();
                } else {

                }
            }
</script>
 @endsection
