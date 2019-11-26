<footer class="footer_widgets" style="background: #333745;color: white;">

    <div class="footer_top">
        <div class="container">
            <div class="row">

                <div class="col-lg-2 col-md-3 col-sm-5">
                    <div class="widgets_container widget_menu">
                        <h3>Information</h3>
                        <div class="footer_menu">
                            <ul>
                                @php
                                    $information_pages = \App\Model\Page::where('page_position', 1)->get();
                                @endphp
                                @if ($information_pages)
                                    @foreach($information_pages as $information_page)
                                        <li><a href="{{ url($information_page->page_slug) }}">{{ !empty($information_page->page_title)? $information_page->page_title:'' }}</a></li>
                                    @endforeach
                                @endif
                                <li><a href="{{url('contact-us')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>My Account</h3>
                        <div class="footer_menu">
                            <ul>
                                @php
                                    $my_acc_pages = \App\Model\Page::where('page_position', 2)->get();
                                @endphp
                                @if ($my_acc_pages)
                                    @foreach($my_acc_pages as $my_acc_page)
                                        <li><a href="{{ url('page',  $my_acc_page->page_slug) }}">{{ !empty($my_acc_page->page_title)? $my_acc_page->page_title:'' }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-5 col-sm-6">
                    <div class="widgets_container widget_menu">
                        <h3>Customer Service</h3>
                        <div class="footer_menu">
                            <ul>
                                @php
                                    $cust_serv_pages = \App\Model\Page::where('page_position', 3)->get();
                                @endphp
                                @if ($cust_serv_pages)
                                    @foreach($cust_serv_pages as $cust_serv_page)
                                        <li><a href="{{ url('page',  $cust_serv_page->page_slug) }}">{{ !empty($cust_serv_page->page_title)? $cust_serv_page->page_title:'' }}</a></li>
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-7 col-sm-12">
                    <div class="widgets_container">
                        <h3>CONTACT INFO</h3>
                        <div class="footer_contact">
                            @php
                                $contact = \App\Model\WebsiteConfig::first();
                            @endphp
                            <div class="footer_contact_inner">
                                <div class="contact_icone">
                                    <img src="{{asset('assets')}}/img/icon/icon-phone.png" alt="">
                                </div>
                                <div class="contact_text">
                                    <p>Hotline Free 24/24: <br>
                                        <strong>{{ !empty($contact->phone_1)?$contact->phone_1:'' }}</strong></p>
                                </div>
                            </div>
                            <p>{{ !empty($contact->company_address)?$contact->company_address:'' }}
                                . {{ !empty($contact->company_email)?$contact->company_email:'' }}</p>
                        </div>

                        <div class="footer_social">
                            <ul>
                                @php
                                    $social = \App\Model\Social::first();
                                @endphp
                                <li><a target="_blank" class="facebook"
                                       href="{{ !empty($social->facebook)?$social->facebook:'' }}"><i
                                            class="fa fa-facebook"></i></a></li>
                                <li><a target="_blank" class="instagram"
                                       href="{{ !empty($social->instagram)?$social->instagram:'' }}"><i
                                            class="fa fa-instagram"></i></a></li>
                                <li><a target="_blank" class="youtube"
                                       href="{{ !empty($social->youtube)?$social->youtube:'' }}"><i
                                            class="fa fa-youtube-square"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="widgets_container">
                        <h3>Payment</h3>
                        <img src="{{asset('assets')}}/img/icon/SSL_Commerz_Pay.png" alt="">

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="footer_bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6">
                    <div class="copyright_area">
                        <p>Copyright &copy; 2019 <a href="{{ URL::to('/') }}">Live Pharmacy</a> All Right Reserved.</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="footer_payment text-right">
                        <p>Develop By Smart soft Ltd</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
