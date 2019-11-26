<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
 
Route::group(['namespace' => 'Cart'], function () { 	

Route::get('shopping/cart/', 'CartController@shoppingCart');
Route::get('add-cart/{id}', 'CartController@addCart');	
Route::get('add-cart/{id}', 'CartController@addCart');	
Route::post('add-item', 'CartController@addItem');	
Route::get('update-cart/{rowId}/{qty}', 'CartController@cart_update');	
Route::get('delete-item/{id}', 'CartController@cart_destroy');	
 });

Route::group(['namespace' => 'Frontend'], function () { 

Route::get('/', 'FrontEndController@index'); 
Route::get('medicine/list/{id}', 'FrontEndController@product_list');  
//contact-us route
Route::get('/contact-us', 'FrontEndController@contact');
Route::post('send/contact/email', 'MailController@sendemail');

//search for medicine 
Route::get('prescription','FrontEndController@prescription');


//cart section   
Route::get('/page/{page_slug}', 'PagesController@page_show');
Route::get('/cart', 'OtherPagesController@cart')->name('cart');
Route::get('cart/place-order','OrderController@index'); 
Route::get('get-discount/{cupon_code}','OrderController@discount_method'); 

//product details route 
Route::get('medicine-details/{product_slug}','FrontEndController@product_details');
// for product type
Route::get('/product_details', 'OtherPagesController@product_details')->name('product_details');
Route::get('/product_sidebar', 'OtherPagesController@product_sidebar')->name('product_sidebar');
Route::get('/product_grouped', 'OtherPagesController@product_grouped')->name('product_grouped');
Route::get('/product_variable', 'OtherPagesController@product_variable')->name('product_variable');
Route::get('/product_countdown', 'OtherPagesController@product_countdown')->name('product_countdown');

//customer profile route
Route::resource('customer', 'CustomerController');  
Route::post('customer-login-check', 'CustomerController@customer_login');
Route::get('customer-logout', 'CustomerController@logout')->name('c_logout');

//checkout section   
Route::post('place-order', 'OrderController@get_order_info');
Route::post('checkout-login-check', 'OrderController@customer_login');
//

});
Auth::routes();

Route::group(['middleware' => 'auth'], function () {
Route::resource('users', 'Auth\RegisterController');
// --------------------- User Role Route---------------------//
Route::resource('roles', 'RoleController');
Route::post('role-update', 'RoleController@update');
Route::get('role-delete/{id}', 'RoleController@destroy');
Route::resource('users', 'Auth\RegisterController');

//--------------------- Dashboard Route -------------------//

//--------------------- User Route -------------------//
//Route::get('my-profile','Auth\RegisterController@user_profile');
Route::post('my-profile-update', 'Auth\RegisterController@user_profile_update');

Route::get('change-password/', 'Security\ForgotPasswordController@change_password');
Route::post('change-password-process', 'Security\ForgotPasswordController@updateAuthUserPassword');
Route::get('user-list', 'Auth\Admin\RegisterController@user_list');
Route::get('user-edit/{user_id}', 'Auth\RegisterController@user_edit');
Route::post('user-update/', 'Auth\RegisterController@user_update');
Route::get('user-delete/{user_id}', 'Auth\RegisterController@user_delete');


Route::group(['namespace' => 'Admin'], function () {
Route::get('dashboard', 'AdminController@dashboard_index')->name('dashboard');
//-----------------------Member Route-----------------------//
Route::get('/member_form', 'MemberController@member_form')->name('member_form');
Route::post('/member_form', 'MemberController@member_store')->name('member_store');
Route::get('/member_list', 'MemberController@member_list')->name('member_list');
Route::get('/member/{id}/edit', 'MemberController@member_edit')->name('member_edit');
Route::post('/member_update/{id}', 'MemberController@member_update')->name('member_update');
Route::delete('/member_delete/{id}', 'MemberController@member_delete')->name('member_delete');

//--------------------- Location Route -------------------//
Route::get('location-list', 'LocationController@index');
Route::post('location-store', 'LocationController@store');
Route::get('location-edit/{id}', 'LocationController@edit');
Route::post('location-update', 'LocationController@update');
Route::get('location-delete/{id}', 'LocationController@destroy');

//--------------------- SiteConfiguration Route -------------------//

Route::get('web-site-configuration', 'WebConfiguration@web_site_configuration'); 
Route::post('website-update', 'WebConfiguration@web_site_update');

//--------------------- Menubars Route -------------------//
Route::get('menu-list', 'MenubarController@menubar_index');
Route::post('menu-add-procsss', 'MenubarController@menu_add_process');
Route::get('menu-edit/{menu_id}', 'MenubarController@menu_edit');
Route::post('menu-update-process', 'MenubarController@menu_update');
Route::get('menu-delete/{menu_id}', 'MenubarController@menu_delete');

//--------------------- Categories Route ----------------------//

Route::get('category-list', 'CategoryController@category_index')->name('category-list');
Route::post('category-add-procsss', 'CategoryController@category_store_process');
Route::get('category-edit/{id}', 'CategoryController@category_edit');
Route::post('category_update/{id}', 'CategoryController@category_update')->name('category_update');
Route::get('category-delete/{id}', 'CategoryController@category_delete');

///////////////=============== Sub Category Route ================///////////////////

Route::get('sub_category-list', 'Sub_CategoryController@sub_category_index')->name('sub_category-list');
Route::post('sub_category-add-procsss', 'Sub_CategoryController@sub_category_store_process');
Route::get('sub_category-edit/{id}', 'Sub_CategoryController@sub_category_edit')->name('sub_category_edit');
Route::post('sub_category_update/{id}', 'Sub_CategoryController@sub_category_update')->name('sub_category_update');
Route::get('sub_category-delete/{id}', 'Sub_CategoryController@sub_category_delete');


//--------------------- Manufacture Route -------------------//

Route::get('brand-list', 'BrandController@brand_index')->name('brand_list');
Route::post('brand-add-procsss', 'BrandController@brand_add_process')->name('brand_store');
Route::get('brand-edit/{id}', 'BrandController@brand_edit')->name('brand_edit');
Route::post('brand-update/{id}', 'BrandController@brand_update')->name('brand_update');
Route::get('brand-delete/{id}', 'BrandController@brand_delete')->name('brand_delete');

//--------------------- Gallery Route -------------------//

Route::get('gallery-list', 'GalleryController@gallery_index');
Route::post('gallery-add-procsss', 'GalleryController@gallery_add_process');
Route::get('gallery-edit/{id}', 'GalleryController@gallery_edit');
Route::post('gallery-update', 'GalleryController@gallery_update');
Route::get('gallery-delete/{id}', 'GalleryController@delete_gallery');

//--------------------- Manufacture Route -------------------//

Route::get('slider-list', 'SliderController@slider_index')->name('slider-list');
Route::post('slider-add-procsss', 'SliderController@slider_add_process');
Route::get('slider-edit/{slider_id}', 'SliderController@slider_edit')->name('slider-edit');
Route::PATCH('slider-update/{slider_id}', 'SliderController@slider_update')->name('slider-update');
Route::get('slider-delete/{slider_id}', 'SliderController@slider_delete');

//------------------------ Tags Route -----------------------//

Route::get('tags-list', 'TagsController@tags_index');
Route::post('tags-add-process', 'TagsController@tags_add_process');
Route::get('tags-edit/{tags_id}', 'TagsController@tags_edit');
Route::post('tags-update', 'TagsController@tags_update');
Route::get('tags-delete/{tags_id}', 'TagsController@tags_delete');


Route::get('size-list', 'SizeController@index');
Route::post('size-add-process', 'SizeController@store');
Route::get('size-edit/{size_id}', 'SizeController@edit');
Route::post('size-update', 'SizeController@update');
Route::get('size-delete/{size_id}', 'SizeController@destroy');

//------------------------ Color Route -----------------------//

Route::get('color-list', 'ColorController@color_index');
Route::post('color-add-process', 'ColorController@color_store');
Route::get('color-edit/{color_id}', 'ColorController@color_edit');
Route::post('color-update', 'ColorController@color_update');
Route::get('color-delete/{color_id}', 'ColorController@color_delete');


//------------------------ Deliver Route -----------------------//
Route::get('delivery-time-configuration', 'DeliveryController@deliery_time');
Route::get('time-delete/{id}', 'DeliveryController@delivery_time_delete')->name('time');
Route::post('delivery-time-add', 'DeliveryController@deliery_time_add');
Route::get('delivery-charge-and-vat-configuration', 'DeliveryController@index');
Route::post('delivery-charge-and-vat-configuration', 'DeliveryController@update');

//------------------------ Shipping Area Route -----------------------//

Route::get('shipping-area', 'ShippingController@index');
Route::post('shipping-area', 'ShippingController@store');
Route::get('shipping-area/{id}', 'ShippingController@delete');
//------------------------ NewOrders Route -----------------------//

Route::get('new-orders', 'OrderController@index');
Route::get('order-details/{id}', 'OrderController@order_details');
Route::get('accept-order/{order_id}', 'OrderController@accept_order');
Route::get('order/received', 'OrderController@received_order');
//Route::get('shipping-complete/{order_id}','OrderController@shipping_complete');
Route::post('go-for-shipping', 'OrderController@go_for_ship');
Route::get('received-order-view/{order_id}', 'OrderController@received_order_view');
Route::get('cancel-order/{order_id}', 'OrderController@cancel_order');
//delivered route
Route::get('delivered-order-view/{id}', 'OrderController@deliverd_order_view');
Route::get('delivered-order-view/', 'OrderController@deliverd_order');
Route::get('cancel-order-view/', 'OrderController@cancel_order_view');
//ship
Route::get('order/shipping/processing', 'OrderController@on_shipping_processing');
Route::get('order/shipping/view/{id}', 'OrderController@on_shipping_view');
Route::get('order/shipping/confirm/{id}', 'OrderController@on_shipping_confirm');
//------------------------ Social Route -----------------------//
Route::get('social-links-update', 'SocialController@social');
Route::post('social-links-update', 'SocialController@social_update');

//------------------------ Page Route -----------------------//
Route::get('page-add', 'PageController@page_create');
Route::post('page-add-process', 'PageController@page_store');
Route::get('page-list', 'PageController@page_list');
Route::get('page-edit/{page_id}', 'PageController@page_edit');
Route::post('page-update-process', 'PageController@page_update');
Route::get('page-delete/{page_id}', 'PageController@page_delete');

/*
* Footer Title Route
*/
Route::prefix('footer/')->group(function () {
Route::get('title-add', 'FooterController@title_add')->name('footer-title-add');
Route::post('title-store', 'FooterController@title_store')->name('footer-title-store');
Route::get('title-list', 'FooterController@title_list')->name('footer-title-list');
Route::get('title-edit/{id}', 'FooterController@title_edit')->name('footer-title-edit');
Route::post('title-update/{id}', 'FooterController@title_update')->name('footer-title-update');
Route::post('title-delete', 'FooterController@title_delete')->name('footer-title-delete');
});

//------------------------ Product Route -----------------------//
Route::get('product-list', 'ProductController@product_list')->name('product-list');
Route::get('product-add-process', 'ProductController@index');
Route::get('get-subcat-by-catid/{option}', 'ProductController@show');
Route::post('dynamic_dependent/fetch', 'ProductController@fetch')->name('dynamicdependent.fetch');
Route::post('/product-add-process', 'ProductController@StoreProduct')->name('add-product');
Route::get('/product-edit/{id}', 'ProductController@product_edit');
Route::get('/product-delete/{id}', 'ProductController@product_delete');
Route::get('/delete-single-image/{id}', 'ProductController@delete_single_image');
Route::post('/product-update/{id}', 'ProductController@product_update')->name('product-update');
//---------------------------generic route---------------------------//
Route::get('generic-list','GenericController@index');
Route::post('generic-add','GenericController@store');
Route::get('generic-delete/{id}','GenericController@delete');
//--------------------- Faq  Route -------------------//
Route::get('faq-list', 'FaqController@faq_index');
Route::post('faq-add-process', 'FaqController@faq_add_process');
Route::get('faq-edit/{faq_id}', 'FaqController@faq_edit');
Route::post('faq-update-process', 'FaqController@faq_update');
Route::get('faq-delete/{faq_id}', 'FaqController@faq_delete');

//--------------------- Faq  Route -------------------//
Route::get('banner-list', 'BannerController@banner_index');
Route::post('front-banner-add-process', 'BannerController@banner_add_process');
Route::get('banner-edit/{id}', 'BannerController@banner_edit');
Route::post('banner-update', 'BannerController@banner_update');
Route::get('banner-delete/{id}', 'BannerController@delete_banner');

//--------------------- On-site Route -------------------//
Route::get('discount', 'DiscountController@index');
Route::get('cupon-delete/{id}', 'DiscountController@delete');
Route::get('discount-edit/{id}', 'DiscountController@edit');
Route::post('cupon-create', 'DiscountController@create');
Route::post('cupon-update', 'DiscountController@update');
});
});
Route::get('/sadmin', 'Auth\LoginController@admin_login_method')->name('user_login');
Route::get('/admin_register', 'Auth\Admin\RegisterController@admin_register')->name('registration');
Route::post('/admin_register', 'Auth\Admin\RegisterController@admin_store')->name('user.store');

 