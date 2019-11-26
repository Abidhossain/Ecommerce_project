@extends('admin.admin_master')
@section('title','Ecommerce | User Registration')
@section('custom_css')
    <style media="screen">
        .form-control {
            border-radius: 0px;
        }

        /* Style all input fields */
        input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-top: 6px;
            margin-bottom: 16px;
        }

        /* Style the submit button */
        input[type=submit] {
            background-color: #4CAF50;
            color: white;
        }


        /* Style the container for inputs */
        .container {
            background-color: #f1f1f1;
            padding: 20px;
        }

        /* The message box is shown when the user clicks on the password field */
        #message {
            /* display:none; */
            /* background: #f1f1f1; */
            color: #000;
            position: relative;
            /* padding: 10px 35px; */
            font-size: 18px;
        }

        #message p {
            padding: 7px 11px;
            font-size: 18px;
        }

        /* Add a green text color and a checkmark when the requirements are right */
        .valid {
            color: green;
        }

        .valid:before {
            position: relative;
            left: -7px;
            content: "\f00c";
        }

        /* Add a red text color and an "x" icon when the requirements are wrong */
        .invalid {
            color: red;
        }

        .invalid:before {
            position: relative;
            left: -7px;
            content: "\f071";
        }

        form-control {
            border-radius: 0px;
        }

    </style>
@endsection
@section('content')
    <div class="row clearfix">
        <div class="col-md-8">
            <div class="tile">
                <div class="tile-body">
                    <form method="POST" action="{{ route('footer-title-store') }}">
                        @csrf
                        <h5 class="login-head"><i class="fa fa-lg fa-fw fa-user text-success"></i>Footer Title </h5>

                        <div class="row">

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label" for="name">Footer Title</label>
                                    <input id="footer_title" name="footer_title" type="text"
                                           class="form-control @error('footer_title') is-invalid @enderror"
                                           footer_title="footer_title" value="{{ old('footer_title') }}"
                                           autocomplete="footer_title" placeholder="Enter Footer title">
                                    @error('footer_title')
                                    <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                  </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group btn-container">
                                    <button class="btn btn-success btn-sm">Add Footer Title</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



    </div>
@endsection
@section('custom_script')
    @if(Session::has('success'))
        <script>
            swal({
                title: "Success!",
                text: "{{Session::get('success')}}",
                type: "success",
            });
        </script>
    @endif
    @if(Session::has('error'))
        <script>
            swal('error', '{{Session::get('error')}}', 'error');
        </script>
    @endif
@endsection
