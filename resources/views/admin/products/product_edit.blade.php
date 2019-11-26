@extends('admin.admin_master')

@section('title', 'Ecommerce | Product Edit')

@section('custom_css')
    <!-- include summernote css/js -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.css" rel="stylesheet">
    <script src="http://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote.js"></script>
    <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet">

    <style type="text/css">
        select.form-control:not([size]):not([multiple]) {
            height: calc(2.0625rem + 16px);
        }
        .text-danger{
            color: red;
            font-size: 18px;
            font-weight: 600;
        }
        .ms-choice {
            height: 36px!important;
        }
        .btn-danger{
            border-radius: 0px;
            height: 40px;
        }
    </style>
@endsection

@section('content')
    <div class="row">
        <div class="col-md-1"></div>
        <div class="col-md-10">
            <div class="tile">
                <div class="tile-body">
                    <div class="modal-header">
                        <h3 class="modal-title" id="exampleModalLabel">Product Update</h3>
                         <a href="{{url('product-list')}}" class="pull-right btn btn-sm btn-info">Back</a>
                    </div>
                    <div class="modal-body">
                        <form id="insert_form" action="{{ route('product-update',$product->id) }}" method="post" name="edit_form" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="product_id" value="{{$product->id}}">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="product_name" class="col-form-label">Product Name <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="product_name" id="product_name" placeholder="Product Name" value="{{$product->product_name}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="main_cat" class="col-form-label">Category <span class="text-danger">*</span></label>
                                        <select class="form-control dynamic"  name="category_id" id="main_cat">
                                            <option value="">----- Choose Categorey -----</option>
                                            @foreach($categories as $category)
                                                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                         <div class="form-group">
                                            <label for="sub_category" class="col-form-label">Sub Category</label>
                                            <select class="form-control sub_category" name="sub_category_id" id="sub_category">
                                             <option value="">----- Choose Sub Categorey -----</option>
                                             @foreach($sub_categories as $sub_category)
                                             <option value="{{ $sub_category->id }}"  {{ $product->sub_category_id == $sub_category->id ? 'selected' : '' }}>{{ $sub_category->name }}</option>
                                             @endforeach
                                           </select>
                                         </div>
                                       </div>


                              <div class="col-md-6">
                                     <div class="form-group">
                                        <label for="main_cat" class="col-form-label">Product Brand <span class="text-danger"> <?php
                                        if(!empty($product->brand_id)){ ?>
                                            *
                                        <?php }else{} ?></span></label>
                                       <select class="form-control dynamic"  name="brand_id" id="main_cat"
                                       <?php
                                        if(!empty($product->brand_id)){ ?>
                                            required
                                        <?php }else{} ?>
                                       >
                                        <option value="">--Select Brand--</option>
                                         @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ $product->brand_id == $brand->id ? 'selected' : '' }}>{{ $brand->name }}</option>
                                         @endforeach
                                       </select>
                                     </div>
                                   </div>

                              <div class="col-md-6">
                                <div class="form-group">
                                <label for="home_page_visiblity" class="col-form-label">Home Page Visiblity</label>
                                <select class="form-control"  name="home_page_visiblity" id="home_page_visiblity">
                                  <option value="">----- Choose Brand -----</option>
                                  <option value="9999">Feature Product</option>
                                  <option value="99999">Category Product</option>
                                </select>
                                </div>
                              </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="generic_id" class="col-form-label">Generic List</label>
                                        <select class="form-control"  name="generic_id" id="generic_id">
                                            <option value="">----- Choose Generic -----</option>
                                            @foreach($generic_info as $generic)
                                                <option value="{{$generic->id}}">{{$generic->generic_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="price" class="col-form-label">Product Price <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control" name="price" id="price" placeholder="Enter Product Price" value="{{$product->price}}" >
                                    </div>
                                </div>

                                <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="discount" class="col-form-label">Discount</label>
                                    <input type="texg" class="form-control" name="discount" id="discount" placeholder="Enter discount" value="{{ $product->discount}}">
                                 </div>
                               </div>


                                     <div class="row container-fluid  add_item">

                                         <div class='form-group col-md-11'>
                                            <div class="form-group">

                                            @foreach($product->product_images as $images)
                                             <img src="{{url('/')}}/{{$images->product_image}}" height="50px" width="50px">
                                             <a href="{{url('delete-single-image/')}}/{{$images->id}}"  type="submit"  class="btn btn-danger ml-2 submit"><i class="fa fa-trash"></i></a>
                                             @endforeach

                                        </div>
                                  <?php
                                      if(Session::get('deleted')){ ?>
                                        <label for='product_image' class='col-form-label'>Update Image <span class="text-danger">*</span></label>&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;" class="text-danger"><i>Image Size Must Be 508 x 600 pixels</i></span>
                                        <input class='form-control' min="1" name='product_image' type='file' id='product_image'>
                                  <?php }else{ ?>
                                  <label for='product_image' class='col-form-label'>Product Image <span class="text-danger">*</span></label>&nbsp;&nbsp;&nbsp;<span style="font-size: 14px;" class="text-danger"><i>Image Size Must Be 508 x 600 pixels</i></span>
                                  <input class='form-control' min="1" name='product_image' type='file' id='product_image'>
                                 <?php } ?>
                                         </div>
                                     </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="summernote2" class="control-label">Description </label>
                                        <textarea  class="form-control summernote" name="description"  rows="4" >{!! $product->description !!}</textarea>
                                    </div>
                                </div>


                    </div>
                    <div class="modal-footer ">
                        <input type="submit" class="btn btn-sm btn-success submit" name="submit"  value="Update">
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

    </div>
@endsection

@section('custom_script')
    <script src="{{asset('admin/assets/js/')}}/multiple-select.min.js"></script>

    <script>
        //select one option
        document.forms['edit_form'].elements['main_cat'].value= '{{$product->category_id}}';
        document.forms['edit_form'].elements['generic_id'].value= '{{$product->generic_id}}';
        document.forms['edit_form'].elements['home_page_visiblity'].value= '{{$product->home_page_visiblity}}';
    </script>

<script>

</script>

@if(Session::has('success'))
<script>
  swal({
    title: "Updated!",
    text: "Product Updated",
    type: "success",
    timer: 1000
    });
</script>
@endif
@if(Session::has('error'))
<script>
  swal('error','{{Session::get('error')}}','error');
</script>
@endif
@endsection
