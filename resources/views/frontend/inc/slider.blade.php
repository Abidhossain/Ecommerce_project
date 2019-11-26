 <section class="slider_section slider_s_one  mt-20 mb-4">
        <div class="container">
            <div class="row">
                <div class="col-lg-9 col-md-12">
                    <div class="swiper-container gallery-top">
                        <div class="slider_area swiper-wrapper">
                           @foreach($sliders as $slider)
                            <div class="single_slider swiper-slide d-flex align-items-center" data-bgimg="{{$slider->slider_image}}">
                                <div class="slider_content">
                                    <h3>{{$slider->slider_title}}</h3>
                                    <h1>{{$slider->description}}</h1>
                                        <a class="button" href="{{url('page',$slider->slider_slug)}}">DISCOVER NOW</a>
                                </div>
                            </div>
                           @endforeach
                        </div>
                        <!-- Add Arrows -->

                    </div>
                    <div class="swiper-container gallery-thumbs">

                    </div>

                </div>
                <div class="s_banner col-lg-3 col-md-12">
                    <!--banner area start-->
                    <div class="sidebar_banner_area">
                        {{-- @dd($banners) --}}
                       @foreach($banners as $banner)
                       <figure class="single_banner mb-20">
                           <div class="banner_thumb">
                               <a href="shop.html"><img src="{{url('/')}}/{{$banner->banner_image}}" alt=""></a>
                           </div>
                       </figure>
                       @endforeach
                    </div>
                    <!--banner area end-->
                </div>
            </div>
        </div>
    </section>
       <div class="shipping_area">
        <div class="container">
            <div class=" row">

                <div class="col-lg-3 col-md-3 col-12 ">
                   <div class="col-shipping-box border">
                    <div class="shipping_content pl-4 pb-4 pt-4">
                    <i class="fa fa-id-card-o float-left pr-4 fa-2x" aria-hidden="true"></i>

                        <h4 class="pt-1">Free Delivery</h4>
                        <p>For all oders over $120</p>
                    </div>
                   </div>
                </div>

               <div class="col-lg-3 col-md-3 col-12 ">
                   <div class="col-shipping-box border">
                    <div class="shipping_content pl-4 pb-4 pt-4">
                    <i class="fa fa-id-card-o float-left pr-4 fa-2x" aria-hidden="true"></i>

                        <h4 class="pt-1">Free Delivery</h4>
                        <p>For all oders over $120</p>
                    </div>
                   </div>
                </div>

                 <div class="col-lg-3 col-md-3 col-12 ">
                   <div class="col-shipping-box border">
                    <div class="shipping_content pl-4 pb-4 pt-4">
                    <i class="fa fa-id-card-o float-left pr-4 fa-2x" aria-hidden="true"></i>

                        <h4 class="pt-1">Free Delivery</h4>
                        <p>For all oders over $120</p>
                    </div>
                   </div>
                </div>

                 <div class="col-lg-3 col-md-3 col-12 ">
                   <div class="col-shipping-box border">
                    <div class="shipping_content pl-4 pb-4 pt-4">
                    <i class="fa fa-id-card-o float-left pr-4 fa-2x" aria-hidden="true"></i>

                        <h4 class="pt-1">Free Delivery</h4>
                        <p>For all oders over $120</p>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
