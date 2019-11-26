<!doctype html>
<html class="no-js" lang="en"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
      <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')
        @php
        echo !empty($company->company_name)?$company->company_name:'';
        @endphp
    </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets')}}/img/favicon.ico">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/plugins.css">
    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('assets')}}/css/style.css">
 
<link  rel="stylesheet" href="{{asset('assets/Minified/notiflix-1.9.1.min.css')}}">
<script src="{{asset('assets/Minified/notiflix-1.9.1.min.js')}}"></script> 
<script src="{{asset('assets/js/jquery.min.js')}}"></script> 
    @yield('custom_css')
</head> 
<body> 
    <!--header area start-->
    @include('frontend.inc.menubar')
    <!--header area end--> 

    <!--slider area start-->
   
    <!--slider area end-->
    <!--shipping area start-->

    <!--shipping area end-->
    @yield('content')
    <!--footer area start-->
   @include('frontend.inc.footer')
    <!--footer area end--> 
    <!-- modal area start-->
    <!--news letter popup start--> 
    <!-- Plugins JS -->
    <script src="{{asset('assets')}}/js/plugins.js"></script>

    <!-- Main JS -->
    <script src="{{asset('assets')}}/js/main.js"></script> 
<span id="b_send"></span>
<script>
      $.ajaxSetup({
              headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
          }); 
    function addCart(el) {
       var id = el.siblings('.add_item').val();
       // alert(id);
       $.ajax({
           type: 'get',
           url: "{{url('add-cart')}}/"+id,  
           success: function () {               
            $(".cart_content").load(location.href + ' .cart_content'); 
             Notiflix.Notify.Success('Product Added To Cart !');
           }, error: function (response) {
               console.log(response);
              Notiflix.Notify.Failure('Qui timide rogat docet negare');
           }, 
       });
   }

 //cart delete
   function removeCart(el) {
       var id = el.siblings('.item_remove').val();
       // alert(id);
       $.ajax({
           type: 'get',
           url: "{{url('delete-item')}}/" + id,
           success: function () {
            $(".cart_content").load(location.href + ' .cart_content'); 
            $(".cart_page_bg").load(location.href + ' .cart_page_bg');
            $(".cart_c").load(location.href + ' .cart_c'); 
           Notiflix.Notify.Success('Remeve From Cart !');
           }, error: function (response) {
               console.log(response);
                Notiflix.Notify.Failure('Qui timide rogat docet negare');
           }
       });
   } 
</script> 
    @yield('custom_script')
</body> 
</html>