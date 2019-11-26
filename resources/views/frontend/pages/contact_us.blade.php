@extends('frontend.master')
@section('title','Seba Pharmacy')
@section('content')

   <div class="contact_page_bg">
       <!--contact map start-->
      
       </div>
       <!--contact map end-->
       <div class="container">
           <!--contact area start-->
           <div class="contact_area">
               <div class="row">
                   <div class="col-lg-6 col-md-12">
                       <div class="contact_message content border pt-4 pl-4 pr-4 pb-4">
                           <h3>contact us</h3>
                          
                           <ul>
                               <li><i class="fa fa-fax"></i> Address : {{!empty($company->company_address)?$company->company_address:''}}</li> 
                               <li><i class="fa fa-envelope-o"></i> <a href="#">{{!empty($company->company_email)?$company->company_email:''}}</a></li>
                               <li><i class="fa fa-phone"></i>{{!empty($company->phone_1)?$company->phone_1:!empty($company->phone_2)?$company->phone_2:''}}</li>
                              {{--  <li><i class="fa fa-globe" aria-hidden="true"></i>
0(1234) 567 890</li> --}}
                           </ul>
                       </div>
                   </div>
                   <div class="col-lg-6 col-md-12">
                       <div class="contact_message form border pl-4 pr-4 pt-4 pb-4" >
                           <h3>Tell us your project</h3>
                           <form id="contact_us" action="{{url('send/contact/email')}}" method="POST">
                            @csrf
                               <p > 
                                   <input name="name" placeholder="Name *" type="text" class="mr-3">
                               </p> 
                                <p> 
                                   <input name="phone" placeholder="Phone *" type="text">
                               </p>
                               <p> 
                                   <input name="email" placeholder="Email *" type="email" class="mr-3">
                               </p>
                               <p> 
                                   <input name="subject" placeholder="Subject *" type="text">
                               </p>
                               <div class="contact_textarea"> 
                                   <textarea placeholder="Message *" name="message" class="form-control2"></textarea>
                               </div>
                               <button type="submit"> Send</button> 
                               <p class="form-messege"></p>
                           </form>

                       </div>
                   </div>
               </div>
           </div>
           <!--contact area end-->

            <div class="contact_map">
           <div class="map-area">
               <div id="googleMap">
                  <iframe id="advanced_iframe"  name="advanced_iframe"  src="{{!empty($company->google_map_code)?$company->google_map_code:''}}"  width="100%"  height="400"  frameborder="0"  border="0"  allowtransparency="true"  style=";width:100%;height:330;" ></iframe>
               </div>
           </div>
       </div>
   </div>

@endsection
@section('custom_script') 
    <!--map js code here-->
    <script src="https://maps.google.com/maps/api/js?sensor=false&amp;libraries=geometry&amp;v=3.22&amp;key=AIzaSyChs2QWiAhnzz0a4OEhzqCXwx_qA9ST_lE"></script>
    <script src="https://www.google.com/jsapi"></script>

 
<script>  
    @if(Session::has('success'))
          Notiflix.Notify.Info('Mail has sent !!');
    @endif
    @if(Session::has('error'))
          Notiflix.Notify.Failure('Sorry mail did not sent !!');
    @endif
</script>
@endsection