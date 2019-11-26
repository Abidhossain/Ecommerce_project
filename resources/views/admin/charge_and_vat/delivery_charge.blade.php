@extends('admin.admin_master')
@section('title','Delivery cahrge & vat configuration | Bread & Beyond')
@section('custom_css') 
@endsection
@section('content')
<div class="row">
<div class="col-md-1"></div>
<div class="col-md-10">
   <div class="tile">
      <h3 class="tile-title"><h4>Delivery cahrge & vat configuration</h4></h3>
      <div class="tile-body">
         <form action="{{url('delivery-charge-and-vat-configuration')}}" method="post">
          @csrf
            <input type="hidden" name="id" value="{{!empty($config_info->id)?$config_info->id:''}}">
            @csrf  
            <div class="form-group">
               <label for="inside_dhaka">Inside Dhaka</label>
               <input type="number" class="form-control" id="inside_dhaka" name="inside_dhaka" placeholder="Inside Dhaka Delivery Cahrge" value="{{!empty($config_info->inside_dhaka)?$config_info->inside_dhaka:''}}"> 
            </div> 
                  <div class="form-group">
                     <label for="outside_dhaka">Outside Dhaka</label>
                     <input type="number" class="form-control" id="outside_dhaka" name="outside_dhaka"  placeholder="Outside Dhaka Delivery Charge"  value="{{!empty($config_info->outside_dhaka)?$config_info->outside_dhaka:''}}">
                  </div>
                  <div class="form-group">
                     <label for="free_ship_above_or_equal">Free Ship Above or Equal</label>
                     <input type="number" class="form-control" id="free_ship_above_or_equal" name="free_ship_above_or_equal"  placeholder="Free Ship Above or Equal"  value="{{!empty($config_info->free_ship_above_or_equal)?$config_info->free_ship_above_or_equal:''}}">
                  </div>
                  <div class="form-group">
                     <label for="studio_cake_price_per_kg">
                        Vat %
                     </label>
                     <input type="number" class="form-control" id="product_vat" name="product_vat" placeholder="Product vat" value="{{!empty($config_info->product_vat)?$config_info->product_vat:''}}"> 
                  </div>  
                  <div class="input-group"> 
                     <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Update</button> 
                  </div>
               </div> 
            </div>
         </form>
      </div>
   </div>
</div> 
@endsection
@section('custom_script') 
@if(Session::has('success'))
<script>
   swal({
     title: "Updated!",
     text: "Studio Cake Basic Configuration Updated",
     type: "success",
     timer: 1000
     });
</script>
@endif
@if(Session::has('error'))
<script>
   swal('error','Sorry Failed','error');
</script>
@endif
@endsection