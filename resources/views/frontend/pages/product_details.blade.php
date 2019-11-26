@extends('frontend.master')
@section('title',!empty($product_details->product_name)?$product_details->product_name:'')
@section('content') 
  
  <div class="product_page_bg">
      <div class="container">
          <div class="product_details_wrapper mb-55">
              <!--product details start-->
              <div class="product_details">
                  <div class="row">
                      <div class="col-lg-5 col-md-6">
                          <div class="product-details-tab">
                              <div id="img-1" class="zoomWrapper single-zoom">
                                 <a href="#"> 
                                    @php($i = 0)
                                    @foreach($product_details->product_images->take(1) as $photo) 
                                           <img id="zoom1" src="{{url('/')}}/{{$photo->product_image}}" data-zoom-image="{{url('/')}}/{{$photo->product_image}}" alt="big-1">
                                     </a> 
                                    @php($i++)
                                    @endforeach
                                </a>
                              </div>
                              <div class="single-zoom-thumb">
                                  <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                                       @php($i = 0)
                                       @foreach($product_details->product_images as $photo)  
                                        <li>
                                            <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{url('/')}}/{{$photo->product_image}}" data-zoom-image="{{url('/')}}/{{$photo->product_image}}">
                                                <img src="{{url('/')}}/{{$photo->product_image}}" alt="zo-th-1" />
                                            </a>

                                        </li>   
                                       @endforeach 
                                  </ul>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-7 col-md-6">
                          <div class="product_d_right">
                              

                                  <h3><a href="#">{{$product_details->product_name}}</a></h3>
                                  <div class="product_nav">
                                     {{--  <ul>
                                          <li class="prev"><a href="product-details.html"><i class="fa fa-angle-left"></i></a></li>
                                          <li class="next"><a href="variable-product.html"><i class="fa fa-angle-right"></i></a></li>
                                      </ul> --}}
                                  </div>
                                 
                                  <div class="price_box">
 
                                      <span class="current_price">৳ {{$product_details->price}}</span>
                                  </div>
                                  <div class="product_desc">
                                      <p>{!! $product_details->description !!} </p>
                                  </div> 
                                  <div class="product_variant quantity">
                                      <label>quantity</label>
                                      <form id="item_form" method="post">
                                        @csrf
                                         <input type="hidden" id="id" name="id" value="{{$product_details->id}}">

                                      <input min="1" value="1" name="qty" type="number" id="qty"> 

                                      <button class="button" id="submit" type="submit"> Add To Cart</button>
                                      </form>
         
                                  </div>
                                  <div class=" product_d_action">
                                    
                                  </div>
                                  <div class="product_meta">
                                      <span>Category: <a href="#">{{!empty($product_details->categories->name)?$product_details->categories->name:''}} {{!empty($product_details->sub_categories->name)?', '.$product_details->sub_categories->name:''}}</a></span>
                                  </div>
                             
                              <div class="priduct_social">
                                  <ul>
                                    {{--   <li><a class="facebook" href="#" title="facebook"><i class="fa fa-facebook"></i> Like</a></li>
                                      <li><a class="twitter" href="#" title="twitter"><i class="fa fa-twitter"></i> tweet</a></li>
                                      <li><a class="pinterest" href="#" title="pinterest"><i class="fa fa-pinterest"></i> save</a></li>
                                      <li><a class="google-plus" href="#" title="google +"><i class="fa fa-google-plus"></i> share</a></li>
                                      <li><a class="linkedin" href="#" title="linkedin"><i class="fa fa-linkedin"></i> linked</a></li> --}}
                                  </ul>
                              </div>

                          </div>
                      </div>
                  </div>
              </div>
              <!--product details end-->

              <!--product info start-->
              <div class="product_d_info">
                  <div class="row">
                      <div class="col-12">
                          <div class="product_d_inner">
                              <div class="product_info_button">
                                  <ul class="nav" role="tablist">
                                      <li>
                                          <a class="active" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Description</a>
                                      </li>
                                     {{--  <li>
                                          <a data-toggle="tab" href="#sheet" role="tab" aria-controls="sheet" aria-selected="false">Specification</a>
                                      </li>
                                      <li>
                                          <a data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false">Reviews (1)</a>
                                      </li> --}}
                                  </ul>
                              </div>
                              <div class="tab-content">
                                  <div class="tab-pane fade show active" id="info" role="tabpanel">
                                      <div class="product_info_content">
                                          <p>{!! $product_details->description !!}</p>
                                      </div>
                                  </div>
                                 {{--  <div class="tab-pane fade" id="sheet" role="tabpanel">
                                      <div class="product_d_table">
                                        
                                              <table>
                                                  <tbody>
                                                      <tr>
                                                          <td class="first_child">Compositions</td>
                                                          <td>Polyester</td>
                                                      </tr>
                                                      <tr>
                                                          <td class="first_child">Styles</td>
                                                          <td>Girly</td>
                                                      </tr>
                                                      <tr>
                                                          <td class="first_child">Properties</td>
                                                          <td>Short Dress</td>
                                                      </tr>
                                                  </tbody>
                                              </table>
                                       
                                      </div>
                                      <div class="product_info_content">
                                          <p>Fashion has been creating well-designed collections since 2010. The brand offers feminine designs delivering stylish separates and statement dresses which have since evolved into a full ready-to-wear collection in which every item is a vital part of a woman's wardrobe. The result? Cool, easy, chic looks with youthful elegance and unmistakable signature style. All the beautiful pieces are made in Italy and manufactured with the greatest attention. Now Fashion extends to a range of accessories including shoes, hats, belts and more!</p>
                                      </div>
                                  </div> --}}
                               </div>
                          </div>
                      </div>
                  </div>
              </div>
              <!--product info end-->
          </div>

          <!--product area start-->
          <section class="product_area related_products">
              <div class="row">
                  <div class="col-12">
                      <div class="section_title">
                          <h2>Related Products </h2>
                      </div>
                  </div>
              </div>
              <div class="product_carousel product_style product_column5 owl-carousel">
                  @foreach($related_products as $related)
                  <article class="single_product">
                      <figure> 
                          <div class="product_thumb">
                                @php($i = 0)
                                    @foreach($related->product_images->take(2) as $photo)  
                                       <a href="{{url('medicine-details')}}/{{$related->product_slug}}" class="{{ $i== 0 ? 'primary_img' : 'secondary_img' }}">
                                         <img src="{{url('/')}}/{{$photo->product_image}}" alt="{{$related->product_name}}">
                                     </a> 
                                    @php($i++)
                                    @endforeach
                           {{--    <div class="label_product">
                                  <span class="label_sale">Sale</span>
                              </div> --}}
                              <div class="action_links">
                                  <ul>
                                    {{--   <li class="wishlist"><a href="wishlist.html" title="Add to Wishlist"><i class="ion-android-favorite-outline"></i></a></li>
                                      <li class="compare"><a href="#" title="Add to Compare"><i class="ion-ios-settings-strong"></i></a></li> --}}
                                      <li class="quick_button"><a href="#" data-toggle="modal" data-target="#modal_box" title="quick view"><i class="ion-ios-search-strong"></i></a></li>
                                  </ul>
                              </div>
                          </div>
                          <div class="product_content">
                              <div class="product_content_inner">
                                  <h4 class="product_name"><a href="{{url('medicine-details')}}/{{$related->product_slug}}">{{$related->product_name}}</a></h4>
                                  <div class="price_box"> 
                                      <span class="current_price">{{$related->price}}</span>
                                  </div>
                              </div>
                              <div class="add_to_cart">
                                    <a  href="#" onclick="event.preventDefault(); addCart($(this))" title="Add to cart">Add to cart</a>

          <input type="hidden" class="add_item" value="{{$related->id}}">
                              </div> 
                          </div>
                      </figure>
                  </article>
                  @endforeach
                 
              </div>

          </section>
          <!--product area end-->
      </div>
  </div>
@endsection
@section('custom_script')
<script>
   $('#item_form').on('submit',function(e){
            e.preventDefault();
            var data = $(this).serialize();
            $.ajax({
                url : "{{url('add-item')}}",
                method: 'post',
                data: data,
                dataTpye: 'json',
                success:function(data){ 
                $(".cart_content").load(location.href + ' .cart_content'); 
                    Notiflix.Notify.Success('Product Added To Cart !');
                }, 
                error:function (response) {
                    console.log(response);
                    Notiflix.Notify.Success('Product Added To Cart !');
                }
            })
        }); 
</script>
@endsection

