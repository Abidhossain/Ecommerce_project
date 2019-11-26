@extends('admin.admin_master')
{{-- @dd() --}}
@section('title')
    {{ !empty($web_infos->company_name)?$web_infos->company_name:"" }}
@endsection
@section('custom_css')
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">
    <style>
        select.form-control:not([size]):not([multiple]) {
            height: calc(2.25rem + 14px);
        }

        .badge {
            border-radius: 0px;
            padding: 5%;
        }

        strong {
            font-size: 14px;
        }

        .back_btn {
            margin-left: 10% !important;
        }
    </style>
@endsection
@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <h3 class="tile-title">Update Web Configuration</h3>
                <div class="tile-body">

            <form action="{{url('website-update')}}" method="post" enctype="multipart/form-data">
                @csrf 
                        <input type="hidden" name="id" value="{{!empty($web_infos->id)?$web_infos->id:''}}">
                        
                        <div class="form-group">
                            <label for="company_name">Company Name</label>
                            <input class="form-control" id="company_name" name="company_name" type="text"
                                   placeholder="Enter Company Name"
                                   value="{{!empty($web_infos->company_name)?$web_infos->company_name:''}}">
                        </div>
                        <div class="form-group">
                            <label for="company_logo">Company Logo</label>
                            <input class="form-control" id="company_logo" name="company_logo" type="file"> <br>
                            <img src="{{url('/')}}/{{!empty($web_infos->company_logo)?$web_infos->company_logo:''}}"
                                 id="blah" height="100px" width="250px" alt="Website Logo">
                        </div>
                        <div class="form-group">
                            <label for="company_email">Company Email</label>
                            <input class="form-control" id="company_email" name="company_email" type="email"
                                   placeholder="Enter Company Email"
                                   value="{{!empty($web_infos->company_email)?$web_infos->company_email:''}}">
                        </div>
                        <div class="form-group">
                            <label for="phone_1">Hotline 1</label>
                            <input class="form-control" id="phone_1" name="phone_1" type="text"
                                   placeholder="Enter Phone Number 1"
                                   value="{{!empty($web_infos->phone_1)?$web_infos->phone_1:''}}">

                        </div>
                        <div class="form-group">
                            <label for="phone_2">Hotline 2</label>
                            <input class="form-control" id="phone_2" name="phone_2" type="text"
                                   placeholder="Enter Phone Number 2"
                                   value="{{!empty($web_infos->phone_2)?$web_infos->phone_2:''}}">
                        </div>
                        <div class="form-group">
                            <label for="company_address" class="control-label">Company Address </label>
                            <textarea class="form-control " name="company_address"
                                      rows="4">{{!empty($web_infos->company_address)?$web_infos->company_address:''}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="google_map_code" class="control-label">Google Map</label>
                            <textarea class="form-control " name="google_map_code"
                                      rows="4">{{!empty($web_infos->google_map_code)?$web_infos->google_map_code:''}}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="social_link" class="control-label">Social Link</label>
                            <textarea class="form-control " name="social_link"
                                      rows="4">{{!empty($web_infos->social_link)?$web_infos->social_link:''}}</textarea>
                        </div>


                        <div class="tile-footer">
                            <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update
                            </button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="{{url('/dashboard')}}"><i
                                    class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            $('.summernote').summernote({
                placeholder: 'Write short description about your products',
                tabsize: 2,
                height: 100
            });
        </script>
        @endsection
        @section('custom_script')
            <script>
                function readURL(input) {
                    if (input.files && input.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function (e) {
                            $('#blah').attr('src', e.target.result);
                        }
                        reader.readAsDataURL(input.files[0]);
                    }
                }

                $("#company_logo").change(function () {
                    readURL(this);
                });
            </script>
            @if(Session::has('success'))
                <script>
                    swal({
                        title: "Success!",
                        text: "{{Session::get('success')}}",
                        type: "success",
                        timer: 1000
                    });
                </script>
    @endif
@endsection
