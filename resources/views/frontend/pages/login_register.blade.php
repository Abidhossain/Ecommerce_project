@extends('frontend.master')
@section('title','Seba Pharmacy')
@section('content')
  <!-- customer login start -->
  <div class="login_page_bg">
      <div class="container">
          <div class="customer_login">
              <div class="row">
                  <!--login area start-->
                  <div class="col-lg-6 col-md-6">
                      <div class="account_form login">
                          <h2>login</h2>
                          <form action="{{url('customer-login-check')}}" method="post">
                              @csrf
                              <p>
                                  <label>Email <span>*</span></label>
                                  <input type="email" name="customer_email" placeholder="Email Id">
                              </p>
                              <p>
                                  <label>Passwords <span>*</span></label>
                                  <input type="password" name="password" placeholder="Password">
                              </p>
                              <div class="login_submit">
                                  <a href="#">Lost your password?</a>
                                  <label for="remember">
                                      <input id="remember" type="checkbox">
                                      Remember me
                                  </label>
                                  <button type="submit">login</button>

                              </div>

                          </form>
                      </div>
                  </div>
                  <!--login area start-->

                  <!--register area start-->
                  <div class="col-lg-6 col-md-6">
                      <div class="account_form register">
                          <h2>Register</h2>
                          <form action="{{route('customer.store')}}" method="post">
                            @csrf
                              <p>
                                  <label>Full Name <span>*</span></label>
                                  <input type="text" name="full_name" placeholder="Full Name">
                              </p>
                              <p>
                                  <label>Email address <span>*</span></label>
                                  <input type="text" name="customer_email" placeholder="Email">
                              </p>
                              <p>
                                  <label>Customer Phone <span>*</span></label>
                                  <input type="number" name="customer_phone" placeholder="Phone">
                              </p>
                              <p>
                                  <label>Passwords <span>*</span></label>
                                  <input type="password" name="password" placeholder="Password">
                              </p>
                              <div class="login_submit">
                                  <button type="submit">Register</button>
                              </div>
                          </form>
                      </div>
                  </div>
                  <!--register area end-->
              </div>
          </div>
      </div>
  </div>

  <!-- customer login end -->
@endsection
@section('custom_script')
    <script>
    @if(Session::has('success'))
        // alert('ccksjn');
            Notiflix.Notify.Success('You are registered successfully!');
    @endif
    @if(Session::has('error'))
    // alert('error');
            Notiflix.Notify.Info('Opps Something Wrong!');
    @endif
    @if(Session::get('customer_logout'))
    // alert('error');
    Notiflix.Notify.Failure('Logout success');
      @endif
</script>
@endsection

