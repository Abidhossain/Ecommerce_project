<!DOCTYPE html>
   <meta http-equiv="content-type" content="text/html;charset=utf-8" />
   <head>
      <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <meta property="og:type" content="website">
     {{--  @php
         $logo = DB::table('website_configs')->firstOrFail();


      @endphp --}}
{{-- @dd($logo) --}}
      <link rel="icon" type="image/x-icon" href="{{url('/')}}/{{!empty($company->company_logo)?$company->company_logo:''}}" >
      <title>{{!empty( $company->company_name)? $company->company_name:'' }} @yield('title')</title>

      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      @include('admin.inc.header')
      @yield('custom_css')
   </head>
   <body class="app sidebar-mini rtl">
      <!-- Navbar-->
      <header class="app-header">
         @include('admin.inc.top-header')
      </header>
      <!-- Sidebar menu-->
      @include('admin.inc.sidebar')
      <!-- End Sidebar menu -->
      <main class="app-content">
         @yield('content')
      </main>
      @include('admin.inc.footer-script')
      @yield('custom_script')
   </body>
</html>
