 @extends('frontend.master')
 @section('title','Home |')
 @section('content')
 @include('frontend.inc.slider')
    <!--home section bg area start-->
    <div class="home_section_bg mt-4">
        <!--product area start-->
        <!--product area end-->
      <div class="product_area deals_product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>Feature Product</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="Fashion" role="tabpanel">
                        <div class="product_carousel product_style product_column5 owl-carousel">
                          @foreach($features_product as $feature)
                          <article class="single_product">
                              <figure>
                                  <div class="product_thumb">
                                    @php($i = 0)
                                    @foreach($feature->product_images->take(2) as $photo)
                                       <a href="{{url('medicine-details')}}/{{$feature->product_slug}}" class="{{ $i== 0 ? 'primary_img' : 'secondary_img' }}">
                                         <img src="{{$photo->product_image}}" alt="{{$feature->product_name}}">
                                     </a>
                                    @php($i++)
                                    @endforeach

                                      {{-- <div class="label_product">
                                          <span class="label_sale">Sale</span>
                                      </div> --}}
                                      <div class="action_links">
                                          <ul>
                                              <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="product_content">
                                      <div class="product_content_inner">
                                          <h4 class="product_name"><a href="{{url('medicine-details')}}/{{$feature->product_slug}}">{{$feature->product_name}}</a></h4>
                                          <div class="price_box">
                                              {{-- <span class="old_price">$86.00</span> --}}
                                              <span class="current_price">৳ {{$feature->price}}</span>
                                          </div>
                                      <div class="add_to_cart">
                                          <a  href="#" onclick="event.preventDefault(); addCart($(this))" title="Add to cart">Add to cart</a>

          <input type="hidden" class="add_item" value="{{$feature->id}}">
                                      </div>

                                  </div>
                              </figure>
                          </article>
                          @endforeach
                        </div>
            </div>
        </div>
    </div>
    @foreach($category_product as $category)
      <div class="product_area deals_product">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="section_title">
                                <h2>{{$category->name}} Product</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="Fashion" role="tabpanel">
                        <div class="product_carousel product_style product_column5 owl-carousel">
                    <?php
                          $product_with_cat_wise = \App\Model\Product::with('product_images')->where('category_id','=',$category->id)->get();
                          //dd($product_with_cat_wise);


                    ?>
                          @foreach($product_with_cat_wise as $product)
                          <article class="single_product">
                              <figure>
                                  <div class="product_thumb">
                                    @php($i = 0)
                                    @foreach($product->product_images->take(2) as $photo)
                                       <a href="{{url('medicine-details')}}/{{$product->product_slug}}" class="{{ $i== 0 ? 'primary_img' : 'secondary_img' }}">
                                         <img src="{{$photo->product_image}}" alt="{{$product->product_name}}">
                                     </a>
                                    @php($i++)
                                    @endforeach
                                      {{-- <div class="label_product">
                                          <span class="label_sale">Sale</span>
                                      </div> --}}
                                      <div class="action_links">
                                          <ul>
                                              <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                          </ul>
                                      </div>
                                  </div>
                                  <div class="product_content">
                                      <div class="product_content_inner">
                                          <h4 class="product_name"><a href="{{url('medicine-details')}}/{{$product->product_slug}}">{{$product->product_name}}</a></h4>
                                          <div class="price_box">
                                              {{-- <span class="old_price">$86.00</span> --}}
                                              <span class="current_price">৳ {{$product->price}}</span>
                                          </div>

                                      <div class="add_to_cart">
                                            <a  href="#" onclick="event.preventDefault(); addCart($(this))" title="Add to cart">Add to cart</a>

          <input type="hidden" class="add_item" value="{{$product->id}}">
                                      </div>
                                  </div>
                              </figure>
                          </article>
                          @endforeach
                        </div>
            </div>
        </div>
    </div>
    @endforeach
    <!--home section bg area end-->
 @endsection
 @section('custom_script')
            <script>
                @if(Session::has('login_success'))
                  Notiflix.Notify.Success("{{Session::get('full_name').' login success'}}");
                @endif
            </script>
 @endsection
