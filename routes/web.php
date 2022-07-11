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
 Route::group(['prefix' => 'laravel-filemanager', 'middleware'], function () {
     \UniSharp\LaravelFilemanager\Lfm::routes();
 });

//Frontend 
Route::get('/','HomeController@index' );
Route::get('/trang-chu','HomeController@index');
Route::post('/tim-kiem','HomeController@search');
Route::post('/autocomplete-ajax','HomeController@autocomplete_ajax');

//Liên hệ trang
Route::get('/lien-he','ContactController@lien_he' );
Route::get('/add-information','ContactController@add_information');
Route::post('/save-info','ContactController@save_info');

Route::get('/all-information','ContactController@all_information');
Route::get('/edit-information/{info_id}','ContactController@edit_information');
Route::get('/delete-information/{info_id}','ContactController@delete_information');

Route::post('/update-info/{info_id}','ContactController@update_info');
Route::get('/list-doitac','ContactController@list_doitac');
Route::get('/delete-icons','ContactController@delete_icons');
Route::get('/list-nut','ContactController@list_nut');
Route::get('/delete-doitac','ContactController@delete_doitac');
Route::post('/add-nut','ContactController@add_nut');
Route::post('/add-doitac','ContactController@add_doitac');

//introduction
Route::get('/add-introduction','IntroductionController@add_introduction');
Route::post('/save-introduction','IntroductionController@save_introduction');
Route::get('/all-introduction','IntroductionController@all_introduction');
Route::get('/edit-introduction/{introduction_id}','IntroductionController@edit_introduction');
Route::post('/update-introduction/{introduction_id}','IntroductionController@update_introduction');

Route::get('/unactive-introduction/{introduction_id}','IntroductionController@unactive_introduction');
Route::get('/active-introduction/{introduction_id}','IntroductionController@active_introduction');

Route::get('/delete-introduction/{introduction_id}','IntroductionController@delete_introduction');





//Danh muc san pham trang chu
Route::get('/danh-muc/{slug_category_product}','CategoryProduct@show_category_home');
Route::get('/thuong-hieu/{brand_slug}','BrandProduct@show_brand_home');
Route::get('/chi-tiet-san-pham/{product_slug}','ProductController@details_product');
Route::post('/load-comment','ProductController@load_comment');
Route::post('/send-comment','ProductController@send_comment');
Route::get('/comment','ProductController@list_comment');
Route::post('/allow-comment','ProductController@allow_comment');
Route::post('/reply-comment','ProductController@reply_comment');



//Bai viet
Route::get('/danh-muc-bai-viet/{post_slug}','PostController@danh_muc_bai_viet');
Route::get('/bai-viet/{post_slug}','PostController@bai_viet');


//Backend
Route::get('/admin','AdminController@index');
Route::get('/dashboard','AdminController@show_dashboard');
Route::get('/logout','AdminController@logout');
Route::post('/filter-by-date','AdminController@filter_by_date');
Route::get('/order-date','AdminController@order_date');
Route::post('/days-order','AdminController@days_order');
Route::post('/admin-dashboard','AdminController@dashboard');
Route::post('/dashboard-filter','AdminController@dashboard_filter');

//Category Product
Route::get('/add-category-product','CategoryProduct@add_category_product');
Route::get('/edit-category-product/{category_product_id}','CategoryProduct@edit_category_product');
Route::get('/delete-category-product/{category_product_id}','CategoryProduct@delete_category_product');
Route::get('/all-category-product','CategoryProduct@all_category_product');
Route::post('/product-tabs','CategoryProduct@product_tabs');
//Ckeditor

//Ckeditor
Route::post('/uploads-ckeditor','ProductController@ckeditor_image');
Route::get('/file-browser','ProductController@file_browser');

Route::get('/unactive-category-product/{category_product_id}','CategoryProduct@unactive_category_product');
Route::get('/active-category-product/{category_product_id}','CategoryProduct@active_category_product');


Route::post('/save-category-product','CategoryProduct@save_category_product');
Route::post('/update-category-product/{category_product_id}','CategoryProduct@update_category_product');



//Brand Product
Route::get('/add-brand-product','BrandProduct@add_brand_product');
Route::get('/edit-brand-product/{brand_product_id}','BrandProduct@edit_brand_product');
Route::get('/delete-brand-product/{brand_product_id}','BrandProduct@delete_brand_product');
Route::get('/all-brand-product','BrandProduct@all_brand_product');

Route::get('/unactive-brand-product/{brand_product_id}','BrandProduct@unactive_brand_product');
Route::get('/active-brand-product/{brand_product_id}','BrandProduct@active_brand_product');

Route::post('/save-brand-product','BrandProduct@save_brand_product');
Route::post('/update-brand-product/{brand_product_id}','BrandProduct@update_brand_product');

//Product
Route::get('/add-product','ProductController@add_product');
Route::get('/edit-product/{product_id}','ProductController@edit_product');
Route::get('/delete-product/{product_id}','ProductController@delete_product');
Route::get('/all-product','ProductController@all_product');


Route::get('/unactive-product/{product_id}','ProductController@unactive_product');
Route::get('/active-product/{product_id}','ProductController@active_product');

Route::post('/save-product','ProductController@save_product');
Route::post('/update-product/{product_id}','ProductController@update_product');
Route::post('/delete-document','ProductController@delete_document');

Route::post('/insert-rating','ProductController@insert_rating');

//Coupon
Route::post('/check-coupon','CartController@check_coupon');

Route::get('/unset-coupon','CouponController@unset_coupon');
Route::get('/insert-coupon','CouponController@insert_coupon');
Route::get('/delete-coupon/{coupon_id}','CouponController@delete_coupon');
Route::get('/list-coupon','CouponController@list_coupon');
Route::post('/insert-coupon-code','CouponController@insert_coupon_code');




//Cart
Route::post('/update-cart','CartController@update_cart');
Route::post('/save-cart','CartController@save_cart');
Route::post('/add-cart-ajax','CartController@add_cart_ajax');

Route::get('/gio-hang','CartController@gio_hang');
Route::get('/del-product/{session_id}','CartController@del_product');
Route::get('/del-all-product','CartController@del_all_product');
Route::get('/show-cart','CartController@show_cart');


//Checkout
Route::post('/confirm-order','CheckoutController@confirm_order');
Route::get('/login-checkout','CheckoutController@login_checkout');
Route::get('/del-free','CheckoutController@del_free');
Route::get('/logout-checkout','CheckoutController@logout_checkout');
Route::post('/add-customer','CheckoutController@add_customer');
Route::post('/order-place','CheckoutController@order_place');
Route::post('/login-customer','CheckoutController@login_customer');
Route::get('/checkout','CheckoutController@checkout');
Route::get('/payment','CheckoutController@payment');
Route::post('/save-checkout-customer','CheckoutController@save_checkout_customer');
Route::post('/calculate-free','CheckoutController@calculate_free');
Route::post('/select-delivery-home','CheckoutController@select_delivery_home');

//Order
Route::get('/view-history-order/{order_code}','OrderController@view_history_order');
Route::get('/history','OrderController@history');
Route::get('/print-order/{checkout_code}','OrderController@print_order');
Route::get('/manage-order','OrderController@manage_order');
Route::get('/view-order/{order_code}','OrderController@view_order');
Route::post('/update-order-qty','OrderController@update_order_qty');
Route::post('/update-qty','OrderController@update_qty');
Route::post('/huy-don-hang','OrderController@huy_don_hang');

//Delivery
Route::get('/delivery','DeliveryController@delivery');
Route::post('/select-delivery','DeliveryController@select_delivery');
Route::post('/insert-delivery','DeliveryController@insert_delivery');
Route::post('/select-freeship','DeliveryController@select_freeship');
Route::post('/update-delivery','DeliveryController@update_delivery');

//Slide
Route::get('/manage-slider','SliderController@manage_slider');
Route::get('/add-slider','SliderController@add_slider');
Route::post('/insert-slider','SliderController@insert_slider');
Route::get('/unactive-slider/{slider_id}','SliderController@unactive_slider');
Route::get('/active-slider/{slider_id}','SliderController@active_slider');
Route::get('/delete-slider/{slider_id}','SliderController@delete_slider');


//Tin tức
Route::get('/add-category-post','CategoryPost@add_category_post');
Route::get('/all-category-post','CategoryPost@all_category_post');
Route::get('/edit-category-post/{category_post_id}','CategoryPost@edit_category_post');


Route::post('/save-category-post','CategoryPost@save_category_post');

Route::post('/update-category-post/{cate_id}','CategoryPost@update_category_post');
Route::get('/unactive-cate-post/{cate_post_id}','CategoryPost@unactive_cate_post');
Route::get('/active-cate-post/{cate_post_id}','CategoryPost@active_cate_post');
Route::get('/delete-category-post/{cate_id}','CategoryPost@delete_category_post');

//Post
Route::get('/add-post','PostController@add_post');
Route::post('/save-post','PostController@save_post');
Route::get('/all-post','PostController@all_post');
Route::get('/unactive-post/{post_id}','PostController@unactive_post');
Route::get('/delete-post/{post_id}','PostController@delete_post');
Route::get('/edit-post/{post_id}','PostController@edit_post');
Route::post('/update-post/{post_id}','PostController@update_post');
Route::get('/active-post/{post_id}','PostController@active_post');

//Gallery
Route::get('add-gallery/{product_id}','GalleryController@add_gallery');
Route::post('select-gallery','GalleryController@select_gallery');
Route::post('insert-gallery/{pro_id}','GalleryController@insert_gallery');
Route::post('update-gallery-name','GalleryController@update_gallery_name');
Route::post('delete-gallery','GalleryController@delete_gallery');
Route::post('update-gallery','GalleryController@update_gallery');

//Video
Route::get('video','VideoController@video');
Route::post('select-video','VideoController@select_video');
Route::post('insert-video','VideoController@insert_video');
Route::post('update-video','VideoController@update_video');
Route::post('delete-video','VideoController@delete_video');
Route::get('video-shop','VideoController@video_shop');
Route::post('update-video-image','VideoController@update_video_image');
Route::post('watch-video','VideoController@watch_video');

//Send Mail
Route::get('/send-coupon-vip/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}','MailController@send_coupon_vip');
Route::get('/send-coupon/{coupon_time}/{coupon_condition}/{coupon_number}/{coupon_code}','MailController@send_coupon');
Route::get('/mail-example','MailController@mail_example');
Route::get('/quen-mat-khau','MailController@quen_mat_khau');
Route::post('/recover-pass','MailController@recover_pass');
Route::get('/update-new-pass','MailController@update_new_pass');
Route::post('/reset-new-pass','MailController@reset_new_pass');
Route::get('/send-mail','MailController@send_mail');

//Login customer by google
Route::get('/login-customer-google','AdminController@login_customer_google');
Route::get('/customer/google/callback','AdminController@callback_customer_google');

//Tin tức chân trang
Route::get('/add-post-footer','PostFooterController@add_post_footer');
Route::post('/save-post-footer','PostFooterController@save_post_footer');
Route::get('/all-post-footer','PostFooterController@all_post_footer');
Route::get('/edit-post-footer/{post_footer_id}','PostFooterController@edit_post_footer');
Route::post('/update-post-footer/{post_footer_id}','PostFooterController@update_post_footer');
Route::get('/unactive-post-footer/{post_footer_id}','PostFooterController@unactive_post_footer');
Route::get('/active-post-footer/{post_footer_id}','PostFooterController@active_post_footer');
Route::get('/delete-post-footer/{post_footer_id}','PostFooterController@delete_post_footer');

//Bai viet chan trang
Route::get('/bai-viet-chan-trang/{post_footer_slug}','PostFooterController@bai_viet_chan_trang');








