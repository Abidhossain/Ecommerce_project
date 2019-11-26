 @extends('frontend.master')
 @section('title','Home |')
 @section('content')
 <!--breadcrumbs area start-->
 <div class="breadcrumbs_area">
     <div class="container">
         <div class="row">
             <div class="col-12">
                 <div class="breadcrumb_content ml-4">
                     <ul>
                         <li><a href="index.html">home</a></li>
                         <li>{{!empty($category->name)?$category->name:''}}</li>
                     </ul>
                 </div>
             </div>
         </div>
     </div>
 </div>
 <!--breadcrumbs area end-->

    <!--shop  area start-->
    <div class="shop_area shop_reverse">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12">
                    <!--sidebar widget start-->
                    <aside class="sidebar_widget">
                        <div class="widget_list">
                            <h3>Feature Products</h3>
                            <div class="recent_product_container">
                                @foreach($feature_product as $feature)
                                <article class="recent_product_list">
                                    <figure>
                                        <div class="product_thumb">
                                @php($i = 0)
                                @foreach($feature->product_images->take(2) as $photo)
                                <a href="{{url('medicine-details')}}/{{$feature->product_slug}}" class="{{ $i== 0 ? 'primary_img' : 'secondary_img' }}">
                                <img src="{{url('/')}}/{{$photo->product_image}}" alt="{{$feature->product_name}}">
                                </a>
                                @php($i++)
                                @endforeach
                                        </div>
                                        <div class="product_content">
                                            <h4><a href="{{url('medicine-details')}}/{{$feature->product_slug}}">{{$feature->product_name}}</a></h4>
                                            <div class="price_box">
                                                <span class="current_price">৳ {{$feature->price}}</span>
                                            </div>
                                        </div>
                                    </figure>
                                </article>
                                @endforeach
                            </div>
                        </div>
                    </aside>
                    <!--sidebar widget end-->
                </div>
                <div class="col-lg-9 col-md-12">

                    <!--shop banner area start-->
                    <div class="shop_banner_area mb-30">
                        <div class="row">
                            <div class="col-12">
                                <div class="shop_banner_thumb">
                                  <img src="{{url('/')}}/{{!empty($category->image)?$category->image:''}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--shop banner area end-->
                    <!--shop toolbar start-->
                    <div class="shop_toolbar_wrapper">
                        <div class="shop_toolbar_btn">
                            <button data-role="grid_4" type="button" class=" btn-grid-4" data-toggle="tooltip" title="4"></button>
                            <button data-role="grid_list" type="button" class="active btn-list" data-toggle="tooltip" title="List"></button>
                        </div>
                    </div>
                    <!--shop toolbar end-->

                    <!--shop wrapper start-->
                    <div class="row no-gutters shop_wrapper grid_list">

                      @foreach($product_list as $product)
                      <div class="col-12 ">
                          <article class="single_product">
                              <figure>
                                  <div class="product_thumb">
                                    @php($i = 0)
                                    @foreach($product->product_images->take(2) as $photo)
                                    <a class="{{ $i== 0 ? 'primary_img' : 'secondary_img' }}">
                                    <img src="{{url('/')}}/{{$photo->product_image}}" alt="{{$product->product_name}}">
                                    </a>
                                    @php($i++)
                                    @endforeach
                                      <div class="label_product">
                                      </div>
                                      <div class="action_links">
                                          <ul>
                                              <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                          </ul>
                                      </div>
                                  </div>

                                  <div class="product_content grid_content">
                                      <div class="product_content_inner">
                                          <h4 class="product_name"><a href="{{url('medicine-details')}}/{{$product->product_slug}}">{{$product->product_name}}</a></h4>
                                          <div class="product_rating">
                                              <ul>
                                                  <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                  <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                  <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                  <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                                  <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                              </ul>
                                          </div>
                                          <div class="price_box">
                                              <span class="current_price">{{$product->price}}</span>
                                          </div>
                                      </div>
                                      <div class="add_to_cart">

                                            <a  href="#" onclick="event.preventDefault(); addCart($(this))" title="Add to cart">Add to cart</a>

          <input type="hidden" class="add_item" value="{{$product->id}}">
                                      </div>
                                  </div>
                                  <div class="product_content list_content">
                                      <h4 class="product_name"><a href="{{url('medicine-details')}}/{{$product->product_slug}}">{{$product->product_name}}</a></h4>
                                      <div class="product_rating">
                                          <ul>
                                              <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                              <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                              <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                              <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                              <li><a href="#"><i class="ion-android-star-outline"></i></a></li>
                                          </ul>
                                      </div>
                                      <div class="price_box">
                                          <span class="current_price">৳ {{$product->price}}</span>
                                      </div>
                                      <div class="product_desc">
                                          <p>{!!$product->description!!}</p>
                                      </div>
                                      <div class="add_to_cart">
                                            <a  href="#" onclick="event.preventDefault(); addCart($(this))" title="Add to cart">Add to cart</a>

          <input type="hidden" class="add_item" value="{{$product->id}}">
                                      </div>
                                      <div class="action_links">
                                          <ul>
                                              <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="quick view"><i class="ion-ios-search-strong"></i> quick view</a></li>
                                          </ul>
                                      </div>
                                  </div>
                              </figure>
                          </article>
                      </div>
                      @endforeach
                    </div>
                    <div class="shop_toolbar t_bottom">
                        <div class="pagination">
                            <ul>
                                {{$product_list->links()}}
                            </ul>
                        </div>
                    </div>
                    <!--shop toolbar end-->
                    <!--shop wrapper end-->
                </div>
            </div>
        </div>
    </div>
    <!--shop  area end-->

 @endsection
