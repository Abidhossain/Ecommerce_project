<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
   <div class="app-sidebar__user">
      <img class="app-sidebar__user-avatar" src="{{asset('admin/assets')}}/s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image">
      <div>
         <p class="app-sidebar__user-name text-capitalize"></p>
         <p class="app-sidebar__user-designation">Technology Ltd</p>
      </div>
   </div>
   <ul class="app-menu">
      <li class="treeview">
        <a class="app-menu__item" href="{{url('/')}}/"  target="_blank"><i class="app-menu__icon fa fa-globe"></i><span class="app-menu__label">Web Site View</span></a>
      </li>
      <li class="treeview">
        <a class="app-menu__item {{ request()->is('dashboard') ? 'active' : '' }}" href="{{url('dashboard')}}/"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a>
      </li>


         <li class="treeview {{ request()->is(['member_form','member_list']) ? 'is-expanded' : '' }}">
         <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Member</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">
          <li>
             <a class="treeview-item" href="{{ route('member_form') }}"><i class="icon fa fa-circle-o"></i>New Memeber </a>
          </li>
          <li>
             <a class="treeview-item" href="{{ route('member_list') }}"><i class="icon fa fa-circle-o"></i>Member List</a>
          </li>
        </ul>



      <li class="treeview {{ request()->is(['slider-list','banner-list','web-site-configuration','about-us','location-list','gallery-list']) ? 'is-expanded' : '' }}">
         <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-home"></i><span class="app-menu__label">Home Page</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">
          <li>
             <a class="treeview-item" href="{{url('slider-list')}}/"><i class="icon fa fa-circle-o"></i>Slider List</a>
          </li>
          <li>
             <a class="treeview-item" href="{{url('banner-list')}}/"><i class="icon fa fa-circle-o"></i>Banner List</a>
          </li>
          <li>
             <a class="treeview-item" href="{{url('web-site-configuration')}}/"><i class="icon fa fa-circle-o"></i>Site Config</a>
          </li>
          <li>
             <a class="treeview-item" href="{{url('location-list')}}/"><i class="icon fa fa-circle-o"></i>Branch Location</a>
          </li>
          <li>
             <a class="treeview-item" href="{{url('gallery-list')}}/"><i class="icon fa fa-circle-o"></i>Gallery List</a>
          </li>
 

         </ul>
      </li>
     <li class="treeview {{ request()->is(['new-orders','order/received','cancel-order-view','order/shipping/processing','delivered-order-view']) ? 'is-expanded' : '' }}">
         <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-truck"></i> <span class="app-menu__label">Orders</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">
          <li>
             <a class="treeview-item" href="{{url('new-orders')}}/"><i class="icon fa fa-circle-o"></i>New Orders</a>
          </li>
          <li>
             <a class="treeview-item" href="{{url('order/received')}}/"><i class="icon fa fa-circle-o"></i>Received Orders</a>
          </li>
          <li>
             <a class="treeview-item" href="{{url('order/shipping/processing')}}/"><i class="icon fa fa-circle-o"></i>On Shipping</a>
          </li>
          <li>
             <a class="treeview-item" href="{{url('delivered-order-view')}}/"><i class="icon fa fa-circle-o"></i>Delivered Orders</a>
          </li>
             <li>
                 <a class="treeview-item" href="{{url('cancel-order-view')}}/"><i class="icon fa fa-circle-o"></i>Canceled Orders</a>
             </li>
         </ul>
      </li> 
      <li class="treeview {{ request()->is(['discount']) ? 'is-expanded' : '' }}">
         <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-percent"></i> <span class="app-menu__label">Discount</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">
          <li>
             <a class="treeview-item" href="{{url('discount')}}/"><i class="icon fa fa-circle-o"></i>Discount</a>
          </li>
         </ul>
      </li> 
    <li class="treeview {{ request()->is(['delivery-charge-and-vat-configuration']) ? 'is-expanded' : '' }}">
         <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-truck"></i> <span class="app-menu__label">Delivery Issue</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">
         {{--  <li>
             <a class="treeview-item" href="{{url('delivery-time-configuration')}}/"><i class="icon fa fa-circle-o"></i>Delivery Time</a>
          </li> --}}
          <li>
             <a class="treeview-item" href="{{url('delivery-charge-and-vat-configuration')}}/"><i class="icon fa fa-circle-o"></i>Charge & Vat Config</a>
          </li>
         {{--  <li>
             <a class="treeview-item" href="{{url('shipping-area')}}/"><i class="icon fa fa-circle-o"></i>Shipping Area</a>
          </li> --}}
         </ul>
      </li> 
      <li class="treeview {{ request()->is(['product-add-process','product-list','category-list','brand-list','generic-list']) ? 'is-expanded' : '' }}">
         <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-product-hunt"></i><span class="app-menu__label">Product  </span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">

          <li>
             <a class="treeview-item" href="{{url('product-add-process')}}/"><i class="icon fa fa-circle-o"></i>Product Add</a>
          </li>
          <li>
             <a class="treeview-item" href="{{url('product-list')}}/"><i class="icon fa fa-circle-o"></i>Product List</a>
          </li>
            <li>
               <a class="treeview-item" href="{{url('category-list')}}/"><i class="icon fa fa-circle-o"></i>Category List</a>
            </li>
            <li>
               <a class="treeview-item" href="{{url('sub_category-list')}}/"><i class="icon fa fa-circle-o"></i>Sub Category List</a>
            </li>
            <li>
               <a class="treeview-item" href="{{url('generic-list')}}/"><i class="icon fa fa-circle-o"></i>Generic List</a>
            </li>
            <li>
               <a class="treeview-item" href="{{route('brand_list')}}/"><i class="icon fa fa-circle-o"></i>Brand List</a>
            </li>
         </ul>
      </li>
 

      <li class="treeview {{ request()->is(['page-add','page-list']) ? 'is-expanded' : '' }}">
         <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Pages</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">
           <li>
              <a class="treeview-item" href="{{url('page-add')}}/"><i class="icon fa fa-circle-o"></i>Page Add</a>
           </li>
           <li>
              <a class="treeview-item" href="{{url('page-list')}}/"><i class="icon fa fa-circle-o"></i>Page List</a>
           </li>
         </ul>
      </li>
       <li class="treeview {{ request()->is(['footer/title-add','footer/title-list']) ? 'is-expanded' : '' }}">
           <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-file"></i><span class="app-menu__label">Footer Manage</span><i class="treeview-indicator fa fa-angle-right"></i></a>
           <ul class="treeview-menu">
               <li>
                   <a class="treeview-item" href="{{ url('footer/title-add') }}"><i class="icon fa fa-circle-o"></i>Footer Title Add</a>
               </li>
               <li>
                   <a class="treeview-item" href="{{ url('footer/title-list') }}"><i class="icon fa fa-circle-o"></i>Footer Title List</a>
               </li>
           </ul>
       </li>
      <li class="treeview {{ request()->is(['social-list']) ? 'is-expanded' : '' }}">
         <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-object-group"></i><span class="app-menu__label">Social Media</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{url('social-links-update')}}/"><i class="icon fa fa-circle-o"></i>Social List</a>
            </li>
         </ul>
      </li>
      </li>
      <li class="treeview {{ request()->is(['user-list','create-user']) ? 'is-expanded' : '' }}">
         <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-user"></i><span class="app-menu__label">Admin</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{url('user-list')}}/"><i class="icon fa fa-circle-o"></i>User List</a>
            </li>
         </ul>
      </li>
   
      <li class="treeview {{ request()->is(['my-profile']) ? 'is-expanded' : '' }}">
         <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-male"></i><span class="app-menu__label">My Profile</span><i class="treeview-indicator fa fa-angle-right"></i></a>
         <ul class="treeview-menu">
            <li>
              <a class="treeview-item" href="{{url('my-profile')}}"><i class="icon fa fa-circle-o"></i>My Profile</a>
            </li>
         </ul>
      </li>
   </ul>
</aside>
