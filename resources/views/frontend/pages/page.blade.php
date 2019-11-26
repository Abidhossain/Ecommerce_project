
@extends('frontend.master')
@section('title','Seba Pharmacy')
@section('content')
    <!--about bg area start-->
    <div class="about_bg_area">
        <div class="container">


            <!--chose us area start-->
            <div class="choseus_area" data-bgimg="assets/img/about/about-us-policy-bg.jpg">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <article class="single_gallery_section">
                            <figure>

                                <figcaption class="about_gallery_content">
                                    <h3>{{ !empty($page_information->page_title)?$page_information->page_title:'' }}</h3>
                                    {!! !empty($page_information->page_description)?$page_information->page_description:'' !!}
                                </figcaption>
                            </figure>
                        </article>
                    </div>
                </div>
            </div>

            <!--chose us area end-->
        </div>
    </div>

    <!--about bg area end-->
@endsection

