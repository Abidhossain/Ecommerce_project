@extends('admin.admin_master')
@section('title','Ecommerce | Product List')
@section('custom_css')
<style>
   .badge{
   border-radius: 0px;
   padding: 5%;
   }
</style>
@endsection
@section('content')
<div class="row">
   <div class="col-md-12">
      <div class="tile">
         <div class="tile-body">
            <h4>Product List</h4>
             <h4> <a href="{{ route('add-product') }}" class="btn btn-sm btn-success pull-right mb-1">Add Product</a></h4>
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th>Sl</th>
                     <th>Product Name</th>
                     <th>Category Name</th>
                     <th>Sub Category Name</th>
                     <th>Brand Name</th>
                     <th>Product Image</th>
                     <th>Price</th>
                     <th>Discount</th>
                     <th>Action</th>
                  </tr>
               </thead>
               <tbody>
              
                   @foreach($product_infos as $key => $product) 
                <tr>
                  <td>{{ $key+1 }}</td>
                  <td>{{ $product->product_name }}</td>
                  <td>{{ !empty($product->categories->name)?$product->categories->name:'' }}</td>
                  <td>{{!empty( $product->sub_categories->name)? $product->sub_categories->name:''}}</td>
                  <td>{{ !empty($product->brands->name)?$product->brands->name:'' }}</td>
                  <td>
                    @foreach($product->product_images as $images)
                        <img src="{{url('/')}}/{{$images->product_image}}" height="40px" width="40px">
                    @endforeach
                    
                  </td>
                  <td>{{$product->price}}</td> 
                  <td>{{$product->discount}} %</td> 

                  <td>
                      <a href="{{url('product-edit')}}/{{$product->id}}" class="btn btn-info btn-sm">Edit</a>
                      <a href="{{url('product-delete')}}/{{$product->id}}" class="delete btn btn-sm btn-danger text-white" onclick="return confirm('Are you sure you want to Delete?')">Delete</a>
                  </td>   
                </tr>
                @endforeach
               </tbody>
            </table>
            {{-- {{$product_infos->links()}} --}}
            </table>
         </div>
      </div>
   </div>
</div>
@endsection
@section('custom_script')
@if(Session::has('success'))
<script>
   swal({
     title: "Deleted!",
     text: "{{Session::get('success')}}",
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
