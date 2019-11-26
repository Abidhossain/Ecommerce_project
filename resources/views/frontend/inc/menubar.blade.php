<div class="off_canvars_overlay"></div>
<div class="Offcanvas_menu">
   <div class="row">
      <div class="col-12">
         <div class="canvas_open">
            <a href="javascript:void(0)"><i class="ion-navicon"></i></a>
         </div>
         <div class="Offcanvas_menu_wrapper">
            <div class="canvas_close">
               <a href="javascript:void(0)"><i class="ion-android-close"></i></a>
            </div>
            <div class="antomi_message">
               <p>Get free shipping – Free 30 day money back guarantee</p>
            </div>
            <div class="header_top_settings text-right">
               <ul>
                  <li><a href="#">Store Locations</a></li>
                  <li><a href="#">Track Your Order</a></li>
                  <li>Hotline: <a href="tel:+(012)800456789">(012) 800 456 789 </a></li>
                  <li>
                    <?php
                      if(!empty(Session::get('id'))){ ?>
                        <a href="{{url('customer-logout')}}">Logout</a>
                    <?php }else{ ?>
                        <a href="{{route('customer.index')}}">Login</a> | <a href="{{route('customer.index')}}">Register</a>
                    <?php } ?>
                  </li>
               </ul>
            </div>
            <div class="header_configure_area">
               <div class="header_wishlist">
                  <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>
                  <span class="wishlist_count">3</span>
                  </a>
               </div>
               <div class="mini_cart_wrapper">
                  <a href="javascript:void(0)">
                  <i class="fa fa-shopping-bag"></i>
                  <span class="cart_price">$152.00 <i class="ion-ios-arrow-down"></i></span>
                  <span class="cart_count">2</span>
                  </a>
                  <!--mini cart-->
                  <div class="mini_cart">
                     <div class="mini_cart_inner">
                        <div class="cart_item">
                           <div class="cart_img">
                              <a href="#"><img src=" " alt=""></a>
                           </div>
                           <div class="cart_info">
                              <a href="#">Sit voluptatem rhoncus sem lectus</a>
                              <p>Qty: 1 X <span> $60.00 </span></p>
                           </div>
                           <div class="cart_remove">
                              <a href="#"><i class="ion-android-close"></i></a>
                           </div>
                        </div>
                        <div class="cart_item">
                           <div class="cart_img">
                              <a href="#"><img src=" "
                                 alt=""></a>
                           </div>
                           <div class="cart_info">
                              <a href="#">Natus erro at congue massa commodo</a>
                              <p>Qty: 1 X <span> $60.00 </span></p>
                           </div>
                           <div class="cart_remove">
                              <a href="#"><i class="ion-android-close"></i></a>
                           </div>
                        </div>
                        <div class="mini_cart_table">
                           <div class="cart_total">
                              <span>Sub total:</span>
                              <span class="price">$138.00</span>
                           </div>
                           <div class="cart_total mt-10">
                              <span>total:</span>
                              <span class="price">$138.00</span>
                           </div>
                        </div>
                     </div>
                     <div class="mini_cart_footer">
                        <div class="cart_button">
                           <a href="cart.html">View cart</a>
                        </div>
                        <div class="cart_button">
                           <a href="checkout.html">Checkout</a>
                        </div>
                     </div>
                  </div>
                  <!--mini cart end-->
               </div>
            </div>
            <div class="search_container">
               <form action="#">
                  <div class="hover_category">
                     <select class="select_option" name="select" id="categori1">
                        <option selected value="1">All Categories</option>
                        <option value="2">Accessories</option>
                        <option value="3">Accessories & More</option>
                        <option value="4">Butters & Eggs</option>
                        <option value="5">Camera & Video</option>
                        <option value="6">Mornitors</option>
                        <option value="7">Tablets</option>
                        <option value="8">Laptops</option>
                        <option value="9">Handbags</option>
                        <option value="10">Headphone & Speaker</option>
                        <option value="11">Herbs & botanicals</option>
                        <option value="12">Vegetables</option>
                        <option value="13">Shop</option>
                        <option value="14">Laptops & Desktops</option>
                        <option value="15">Watchs</option>
                        <option value="16">Electronic</option>
                     </select>
                  </div>
                  <div class="search_box">
                     <input placeholder="Search product..." type="text">
                     <button type="submit">Search</button>
                  </div>
               </form>
            </div>
            <div id="menu" class="text-left ">
               <ul class="offcanvas_main_menu">
                  <li class="menu-item-has-children active">
                     <a href="{{ url('/') }}">Home</a>
                  </li>
                  {{--
                  <li class="menu-item-has-children">
                     --}}
                     {{--                            <a href="#">Category</a>--}}
                     {{--
                     <ul class="sub-menu">
                        --}}
                        {{--
                        <li class="menu-item-has-children">
                           --}}
                           {{--                                    <a href="#">Shop Layouts</a>--}}
                           {{--
                           <ul class="sub-menu">
                              --}}
                              {{--
                              <li><a href="#">shop</a></li>
                              --}}
                              {{--
                              <li><a href="#">Full Width</a></li>
                              --}}
                              {{--
                              <li><a href="#">Full Width list</a></li>
                              --}}
                              {{--
                              <li><a href="#">Right Sidebar </a></li>
                              --}}
                              {{--
                              <li><a href="#"> Right Sidebar list</a></li>
                              --}}
                              {{--
                              <li><a href="#">List View</a></li>
                              --}}
                              {{--
                           </ul>
                           --}}
                           {{--
                        </li>
                        --}}
                        {{--
                        <li class="menu-item-has-children">
                           --}}
                           {{--                                    <a href="#">other Pages</a>--}}
                           {{--
                           <ul class="sub-menu">
                              --}}
                              {{--
                              <li><a href="#">cart</a></li>
                              --}}
                              {{--
                              <li><a href="#">Wishlist</a></li>
                              --}}
                              {{--
                              <li><a href="#l">Checkout</a></li>
                              --}}
                              {{--
                              <li><a href="#">my account</a></li>
                              --}}
                              {{--
                              <li><a href="#">Error 404</a></li>
                              --}}
                              {{--
                           </ul>
                           --}}
                           {{--
                        </li>
                        --}}
                        {{--
                        <li class="menu-item-has-children">
                           --}}
                           {{--                                    <a href="#">Product Types</a>--}}
                           {{--
                           <ul class="sub-menu">
                              --}}
                              {{--
                              <li><a href="product-details.html">product details</a></li>
                              --}}
                              {{--
                              <li><a href="product-sidebar.html">product sidebar</a></li>
                              --}}
                              {{--
                              <li><a href="#">product grouped</a></li>
                              --}}
                              {{--
                              <li><a href="#">product variable</a></li>
                              --}}
                              {{--
                              <li><a href="#">product countdown</a></li>
                              --}}
                              {{--
                           </ul>
                           --}}
                           {{--                                    #--}}
                           {{--
                        </li>
                        --}}
                        {{--
                     </ul>
                     --}}
                     {{--
                  </li>
                  --}}
                  <li class="menu-item-has-children">
                     <a href="#">pages </a>
                     <ul class="sub-menu">
                        <li><a href="privacy-policy.html">privacy policy</a></li>
                        <li><a href="login.html">login</a></li>
                        <li><a href="404.html">Error 404</a></li>
                     </ul>
                  </li>
               </ul>
            </div>
            <div class="Offcanvas_footer">
               <span><a href="#"><i class="fa fa-envelope-o"></i> info@yourdomain.com</a></span>
               <ul>
                  <li class="facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
                  <li class="twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
                  <li class="pinterest"><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                  <li class="google-plus"><a href="#"><i class="fa fa-google-plus"></i></a></li>
                  <li class="linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
               </ul>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<!--Offcanvas menu area end-->
<!--header area start-->
<header>
   <div class="main_header">
      <div class="container">
         <!--header top start-->
         <div class="header_top">
            <div class="row align-items-center">
               <div class="col-lg-4 col-md-5">
                  <div class="antomi_message">
                     <p>Get free shipping – Free 30 day money back guarantee</p>
                  </div>
               </div>
               <div class="col-lg-8 col-md-7">
                  <div class="header_top_settings text-right">
                     <ul>
                        <li><a href="#">Store Locations</a></li>
                        <li>
                           <div class="header_bigsale">
                              <a href="{{url('/prescription')}}">Upload Pescription</a>
                           </div>
                        </li>
                        <li>Hotline: <a href="tel:+(012)800456789">{{!empty($company->phone_1)?$company->phone_1:''}} </a></li>
                        <li>
                            <?php
                            if(!empty(Session::get('id'))){ ?>
                            <a href="{{url('customer-logout')}}">Logout</a>
                            <?php }else{ ?>
                            <a href="{{route('customer.index')}}">Login</a> | <a href="{{route('customer.index')}}">Register</a>
                            <?php } ?>
                        </li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
         <!--header top start-->
         <!--header middel start-->
         <div class="header_middle sticky-header">
            <div class="row align-items-center">
               <div class="col-lg-3 col-md-6">
                  <div class="logo">
                     <a href="{{url('/')}}"><img
                     src="{{ url("/") }}/{{!empty($company->company_logo)?$company->company_logo:''}}"
                     alt=""></a>
                  </div>
               </div>
               <div class="col-lg-7 col-md-12 mt-4 mt-lg-0">
                  <div class="search_box">
                     <input placeholder="Search product..." type="text">
                     <button type="submit">Search</button>
                  </div>
               </div>
               <div class="col-lg-2">
                  <div class="header_configure_area">
                     <!--                                <div class="header_wishlist">-->
                     <!--                                    <a href="wishlist.html"><i class="ion-android-favorite-outline"></i>-->
                     <!--                                        <span class="wishlist_count">3</span>-->
                     <!--                                    </a>-->
                     <!--                                </div>-->
                     <?php
                        $cart_contents = Cart::content();
                       $cart = Cart::count();
                     ?>
                   <div class="cart_content">
                        <div class="mini_cart_wrapper">
                        <a href="javascript:void(0)">
                        <i class="fa fa-shopping-bag"></i>
                        <span class="cart_price">৳{{Cart::subtotal()}} <i class="ion-ios-arrow-down"></i></span>
                        <span class="cart_count">{{Cart::content()->count()}}</span>
                        </a>
                        <!--mini cart-->
                        <div class="mini_cart">
                           <div class="mini_cart_inner">

                             @foreach($cart_contents as $items)
                              <div class="cart_item">
                                 <div class="cart_img">
                                    <a href="#"><img height="40px;" width="40px;" class="img img-responsive" src="{{url('/')}}/{{$items->options->images}}" alt=""></a>
                                 </div>
                                 <div class="cart_info">
                                    <a href="#">{{$items->name}}</a>
                                    <p>Qty: {{$items->qty}} X <span>৳ {{$items->price}} </span></p>
                                 </div>

                  <div class="cart_remove">
                      <input type="hidden" class="item_remove" name="row_id"  value="{{$items->rowId}}">
                     <a href="#" onclick="event.preventDefault(); removeCart($(this))"><i class="ion-android-close"></i></a>
                  </div>
                              </div>
                             @endforeach
                              <div class="mini_cart_table">
                                 <div class="cart_total">
                                    <span>Sub total:</span>
                                    <span class="price">৳{{Cart::subtotal()}}</span>
                                 </div>
                                {{--  <div class="cart_total mt-10">
                                    <span>total:</span>
                                    <span class="price">৳{{Cart::subtotal()}}</span>
                                 </div> --}}
                              </div>
                           </div>
                           <div class="mini_cart_footer">
                              <div class="cart_button">
                                 <a href="{{url('shopping/cart/')}}">View cart</a>
                              </div>
                              <div class="cart_button">
                                 <a href="{{url('/cart/place-order')}}">Checkout</a>
                              </div>
                           </div>
                        </div>
                        <!--mini cart end-->
                     </div>
                   </div>
                  </div>
               </div>
            </div>
         </div>
         <!--header middel end-->
         <!--header bottom satrt-->
         <div class="header_bottom">
            <div class="row align-items-center">
               <div class=" col-lg-12 ">
                  <div class="search_container">
                     <form action="#">
                        <!--                                    <div class="hover_category">-->
                        <!--                                        <select class="select_option" name="select" id="categori2">-->
                        <!--                                            <option selected value="1">All Categories</option>-->
                        <!--                                            <option value="2">Accessories</option>-->
                        <!--                                            <option value="3">Accessories & More</option>-->
                        <!--                                            <option value="4">Butters & Eggs</option>-->
                        <!--                                            <option value="5">Camera & Video </option>-->
                        <!--                                            <option value="6">Mornitors</option>-->
                        <!--                                            <option value="7">Tablets</option>-->
                        <!--                                            <option value="8">Laptops</option>-->
                        <!--                                            <option value="9">Handbags</option>-->
                        <!--                                            <option value="10">Headphone & Speaker</option>-->
                        <!--                                            <option value="11">Herbs & botanicals</option>-->
                        <!--                                            <option value="12">Vegetables</option>-->
                        <!--                                            <option value="13">Shop</option>-->
                        <!--                                            <option value="14">Laptops & Desktops</option>-->
                        <!--                                            <option value="15">Watchs</option>-->
                        <!--                                            <option value="16">Electronic</option>-->
                        <!--                                        </select>-->
                        <!--                                    </div>-->
                        <div class="main_menu menu_position text-right">
                           <nav>
                              <ul>
                                 <li><a href="{{ url('/') }}">home</a></li>
                                 @php
                                 $categories = \App\Model\Category::orderBy('id', 'ASC')->get()->take(8);
                                 @endphp
                                 @if (!$categories->isEmpty())
                                 @foreach($categories as $category)
                                 <li class="mega_items">
                                    <a
                                       href="{{url('medicine/list/')}}/{{$category->id}}">{{ $category->name }} @if (!$category->sub_categories->isEmpty())
                                    <i class="fa fa-angle-down"></i>
                                    @endif</a>
                                    @if (!$category->sub_categories->isEmpty())
                                    <div class="mega_menu">
                                       <ul class="mega_menu_inner">
                                          @php
                                          $sub_categories = \App\Model\Sub_category::where('category_id', $category->id)->orderBy('id', 'ASC')->get();
                                          @endphp
                                          @if (!$sub_categories->isEmpty())
                                          <li>
                                             <ul class="row">
                                                @foreach($sub_categories as $sub_category)
                                                <li class="col-lg-4">
                                                   <a href="{{url('medicine/list/')}}/{{$sub_category->id}}">{{ $sub_category->name }}</a>
                                                </li>
                                                @endforeach
                                             </ul>
                                          </li>
                                          @endif
                                          {{--                                                                    @php--}}
                                          {{--                                                                        $targeted_sub_categories = \App\Model\Sub_category::orderBy('id', 'ASC')->get()->take(12);--}}
                                          {{--                                                                        $except_sub_categories = [];--}}
                                          {{--                                                                        foreach ($targeted_sub_categories as $sub_category){--}}
                                          {{--                                                                            $except_sub_categories[] = $sub_category->id;--}}
                                          {{--                                                                        }--}}
                                          {{--                                                                        $sub_categories = \App\Model\Sub_category::where('category_id', $category->id)->orderBy('id', 'ASC')->get()->except($except_sub_categories)->take(8);--}}
                                          {{--                                                                    @endphp--}}
                                          {{--                                                                    @if (!$sub_categories->isEmpty())--}}
                                          {{--
                                          <li>
                                             --}}
                                             {{--
                                             <ul>
                                                --}}
                                                {{--                                                                                @foreach($sub_categories as $sub_category)--}}
                                                {{--
                                                <li>--}}
                                                   {{--                                                                                        <a href="#">{{ $sub_category->name }}</a>--}}
                                                   {{--
                                                </li>
                                                --}}
                                                {{--                                                                                @endforeach--}}
                                                {{--
                                             </ul>
                                             --}}
                                             {{--
                                          </li>
                                          --}}
                                          {{--                                                                    @endif--}}
                                          {{--                                                                    @php--}}
                                          {{--                                                                        $targeted_sub_categories = \App\Model\Sub_category::orderBy('id', 'ASC')->get()->take(16);--}}
                                          {{--                                                                        $except_sub_categories = [];--}}
                                          {{--                                                                        foreach ($targeted_sub_categories as $sub_category){--}}
                                          {{--                                                                            $except_sub_categories[] = $sub_category->id;--}}
                                          {{--                                                                        }--}}
                                          {{--                                                                        $sub_categories = \App\Model\Sub_category::where('category_id', $category->id)->orderBy('id', 'ASC')->get()->except($except_sub_categories)->take(8);--}}
                                          {{--                                                                    @endphp--}}
                                          {{--                                                                    @if (!$sub_categories->isEmpty())--}}
                                          {{--
                                          <li>
                                             --}}
                                             {{--
                                             <ul>
                                                --}}
                                                {{--                                                                                @foreach($sub_categories as $sub_category)--}}
                                                {{--
                                                <li>--}}
                                                   {{--                                                                                        <a href="#">{{ $sub_category->name }}</a>--}}
                                                   {{--
                                                </li>
                                                --}}
                                                {{--                                                                                @endforeach--}}
                                                {{--
                                             </ul>
                                             --}}
                                             {{--
                                          </li>
                                          --}}
                                          {{--                                                                    @endif--}}
                                       </ul>
                                    </div>
                                    @endif
                                 </li>
                                 @endforeach
                                 @endif
                                 @php
                                 $targeted_categories = \App\Model\Category::orderBy('id', 'ASC')->get()->take(8);
                                 $except_categories = [];
                                 foreach ($targeted_categories as $category){
                                 $except_categories[] = $category->id;
                                 }
                                 $categories = \App\Model\Category::orderBy('id', 'ASC')->get()->except($except_categories);
                                 @endphp
                                 @if (!$categories->isEmpty())
                                 <li>
                                    <a class="" href="#">Others <i class="fa fa-angle-down"></i></a>
                                    <ul class="sub_menu pages">
                                       @foreach($categories as $category)
                                       <li class="mega_items">
                                          <a
                                             href="#">{{ $category->name }} @if (!$category->sub_categories->isEmpty())
                                          <i class="fa fa-angle-down"></i>
                                          @endif</a>
                                          @if (!$category->sub_categories->isEmpty())
                                          <div class="mega_menu">
                                             <ul class="mega_menu_inner">
                                                @php
                                                $sub_categories = \App\Model\Sub_category::where('category_id', $category->id)->orderBy('id', 'ASC')->get();
                                                @endphp
                                                @if (!$sub_categories->isEmpty())
                                                <li>
                                                   <ul class="row">
                                                      @foreach($sub_categories as $sub_category)
                                                      <li class="col-lg-4">
                                                         <a href="#">{{ $sub_category->name }}</a>
                                                      </li>
                                                      @endforeach
                                                   </ul>
                                                </li>
                                                @endif
                                             </ul>
                                          </div>
                                          @endif
                                       </li>
                                       @endforeach
                                    </ul>
                                 </li>
                                 @endif
                              </ul>
                           </nav>
                        </div>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <!--header bottom end-->
      </div>
   </div>
</header>

<!--header area end
