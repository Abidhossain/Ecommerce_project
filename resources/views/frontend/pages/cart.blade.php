@extends('frontend.master')
@section('title','Seba Pharmacy')
@section('content')
<div class="cart_c">
    <!--shopping cart area start -->
    <div class="cart_page_bg">
        <div class="container">
            <div class="shopping_cart_area">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="table_desc">
                                <div class="cart_page table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="product_remove">Delete</th>
                                                <th class="product_thumb">Image</th>
                                                <th class="product_name">Product</th>
                                                <th class="product-price">Price</th>
                                                <th class="product_quantity">Quantity</th>
                                                <th class="product_total">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                            $total = 0;
                                                $cart_items = Cart::content();
                                            @endphp
        @foreach($cart_items as $item)
        <tr>
        <input type="hidden" name="product_id[]" value="{{$item->id}}">
            <td class="product_remove"><a href="#" onclick="event.preventDefault(); removeCart($(this))"><i class="fa fa-trash-o"></i></a>
                <input type="hidden" class="item_remove" name="rowId[]"  value="{{$item->rowId}}">
            </td>
            <td class="product_thumb"><a href="#"><img src="{{url('/')}}/{{$item->options->images}}" alt=""></a></td>
            <td class="product_name"><a href="#">{{$item->name}}</a></td>
            <td class="product-price">৳{{$item->price}}</td>
            <td class="product_quantity">
                <label>Quantity</label>
                <input min="1" max="100" name="qty[]" class="qty" value="{{$item->qty}}" type="number">
                 <input type="hidden" class="item_id" value="{{$item->rowId}}">
                    <a href="" onclick="event.preventDefault(); updateCart($(this))" class="btn btn-success">
                        <i style="margin-top: 4px!important;" class="fa fa-refresh"></i>
                    </a>
                                    </label>
            </td>
            <td class="product_total">৳{{$item->price*$item->qty}}</td>
            <?php
                $total +=($item->price*$item->qty);
            ?>
        </tr>
        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--coupon code area start-->
                    <div class="coupon_area">
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code left">
                                    <h3>Coupon</h3>
                                    <div class="coupon_inner">
                                        <p>Enter your coupon code if you have one.</p> 
                                            <label for="">
                                                <input placeholder="Coupon code" name="cupon_code" id="cupon_code" type="text">
                                            </label>
                                            <input type="text" placeholder="Discount amount" value="{{Session::get('discount_amount')}}" disabled>
                                            <button type="submit" onclick="cuponCode()" id="cupon_btn">Apply coupon</button> 
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="coupon_code right">
                                    <h3>Cart Totals</h3>
                                    <div class="coupon_inner">
                                        <div class="cart_subtotal">
                                            <p>Subtotal</p>
                                            <p class="cart_amount">৳{{$total}}</p>
                                        </div> 

                                        <div class="cart_subtotal ">
                                            <p>Discount</p>
                                            <p class="cart_amount"><span></span>৳ {{Session::get('discount_amount')}}</p>
                                        </div>

                                        <div class="cart_subtotal">
                                            <p>Total</p>
                                            @php
                                                $discount = 0;
                                                $discount = Session::get('discount_amount');
                                                $total = $total-$discount;
                                            @endphp
                                            <p class="cart_amount">৳{{$total}}</p>
                                        </div>
                                        <div class="checkout_btn">
                                            <a href="{{url('cart/place-order')}}">Proceed to Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <!--coupon code area end-->
            </div>
        </div>
    </div>
    <!--shopping cart area end -->
</div>
@endsection
@section('custom_script')
<script>
     function updateCart(el){
         var pera = el.siblings('.item_id').val();

         var qty = el.siblings('.qty').val();
         // alert(qty);
        // console.log(pera);
         $.ajax({
             type: 'get',
             url: "{{url('update-cart')}}/"+qty+'/'+pera,
             success: function () {
            $(".cart_content").load(location.href + ' .cart_content');
            $(".cart_page_bg").load(location.href + ' .cart_page_bg');
            Notiflix.Notify.Info('Updated Cart!');

             }, error: function (response) {
                 console.log(response);
                 Notiflix.Notify.Info('Opps Something Wrong!');

             }
         });
    }
     function updateCart(el){
         var pera = el.siblings('.item_id').val();

         var qty = el.siblings('.qty').val();
         // alert(qty);
        // console.log(pera);
         $.ajax({
             type: 'get',
             url: "{{url('update-cart')}}/"+qty+'/'+pera,
             success: function () {
            $(".cart_content").load(location.href + ' .cart_content');
            $(".cart_page_bg").load(location.href + ' .cart_page_bg');
            Notiflix.Notify.Info('Updated Cart!');

             }, error: function (response) {
                 console.log(response);
                 Notiflix.Notify.Info('Opps Something Wrong!');

             }
         });
    } 
    function cuponCode(){
        let cupon_code = $('#cupon_code').val();
        // alert(cupon_code);
           $.ajax({
            url : "{{url('get-discount')}}/"+cupon_code,
            type: 'get', 
            success:function(data){
            $(".cart_c").load(location.href + ' .cart_c');
              Notiflix.Report.Success( 'WOW Get Cupon', '"Do not try to become a person of success but try to become a person of value." <br><br>Live Pharmacy', 'Click' ); 
               // $('#contact_form')[0].reset();
            }, 
            error:function (response) {
             console.log(response); 
               Notiflix.Report.Failure( 'Cupon Failure', '"We are sorry which cupon you entered has no credentials" <br><br>Live Pharmacy', 'Click' ); 
            }
        }) 
    }
</script>
@endsection

