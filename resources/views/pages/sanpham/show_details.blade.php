@extends('layout')

@section('view')
    @include('pages.include.view')
@endsection

@section('content')
@foreach($product_details as $key => $value)


	<input type="hidden" id="product_viewed_id" value="{{$value->product_id}}">



	<input type="hidden" id="viewed_productname{{$value->product_id}}" value="{{$value->product_name}}">
	<input type="hidden" id="viewed_producturl{{$value->product_id}}" value="{{url('/chi-tiet-san-pham/'.$value->product_slug)}}">
	
	<input type="hidden" id="viewed_productimage{{$value->product_id}}" value="{{asset('public/uploads/product/'.$value->product_image)}}">
    <input type="hidden" id="viewed_productprice{{$value->product_id}}" value="{{number_format($value->product_price,0,',','.')}} VNĐ">
   


<div class="product-details"><!--product-details-->
						<style type="text/css">
							.lSSlideOuter .lSPager.lSGallery img {
							    display: block;
							    height: 140px;
							    max-width: 100%;
							}
							

					</style>
						<nav aria-label="breadcrumb">
						  <ol class="breadcrumb"  style="background: none;">
						    <li class="breadcrumb-item"><a href="{{url('/')}}">Trang chủ</a></li>
						    <li class="breadcrumb-item"><a href="{{url('/danh-muc/'.$cate_slug)}}">{{$product_cate}}</a></li>
						    <li class="breadcrumb-item active" aria-current="page">{{$meta_title}}</li>
						    
						   
						  </ol>
						</nav>

						<div class="col-sm-5">

							<ul id="imageGallery">
							@foreach($gallery as $key => $gal)
							  <li data-thumb="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" data-src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}">
							    <img width="100%" alt="{{$gal->gallery_name}}"  src="{{asset('public/uploads/gallery/'.$gal->gallery_image)}}" />
							  </li>
							 @endforeach
							  
							 
							</ul>

						</div>
						<div class="col-sm-7">

							<div class="product-information"><!--/product-information-->
							
								<h2>{{$value->product_name}}</h2>
								<p>Mã ID: {{$value->product_id}}</p>
								
								<p>Product rating : {{$rating}}/5 </p>
								
								<form action="{{URL::to('/save-cart')}}" method="POST">
									@csrf



                                            <input type="hidden" id="product_viewed{{$value->product_id}}" value="{{$value->product_name}}" class="cart_product_name_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_image}}" class="cart_product_image_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_quantity}}" class="cart_product_quantity_{{$value->product_id}}">

                                            <input type="hidden" value="{{$value->product_price}}" class="cart_product_price_{{$value->product_id}}">
                                          
								<span>
									<span>{{number_format($value->product_price,0,',','.').' VNĐ'}}</span>
								
									<label>Số lượng:</label>
									<input name="qty" type="number" min="1" class="cart_product_qty_{{$value->product_id}}"  value="1" />
									<input name="productid_hidden" type="hidden"  value="{{$value->product_id}}" />
								</span>
								<input type="button" value="Thêm giỏ hàng" class="btn btn-primary btn-sm add-to-cart" data-id_product="{{$value->product_id}}" name="add-to-cart">
								</form>

								<p><b>Tình trạng:</b> Còn hàng</p>
								<p><b>Điều kiện:</b> Mơi 100%</p>
								<p><b>Số lượng kho còn:</b> {{$value->product_quantity}}</p>
								<p><b>Thương hiệu:</b> {{$value->brand_name}}</p>
								<p><b>Danh mục:</b> {{$value->category_name}}</p>
								<style type="text/css">
									a.tags_style {
									    margin: 3px 2px;
									    border: 1px solid;
									  
									    height: auto;
									    background: #428bca;
									    color: #ffff;
									    padding: 0px;
									  
									}
									a.tags_style:hover {
									    background: black;
									}
								</style>
								
								
							</div><!--/product-information-->
						</div>
</div><!--/product-details-->

					<div class="category-tab shop-details-tab"><!--category-tab-->
						<div class="col-sm-12">
							<ul class="nav nav-tabs">
								<li ><a href="#details" data-toggle="tab">Mô tả</a></li>
								<li><a href="#companyprofile" data-toggle="tab">Chi tiết sản phẩm</a></li>
							
								<li class="active"><a href="#reviews" data-toggle="tab">Đánh giá</a></li>
							</ul>
						</div>
						<div class="tab-content">
							<div class="tab-pane " id="details" >
								<p>{!!$value->product_desc!!}</p>
								
							</div>
							
							<div class="tab-pane fade" id="companyprofile" >
								<p>{!!$value->product_content!!}</p>
								
						
							</div>
							
							<div class="tab-pane fade active in" id="reviews" >
								<div class="col-sm-12">
									<ul>
										<li><a href=""><i class="fa fa-user"></i>Admin</a></li>
										<li><a href=""><i class="fa fa-clock-o"></i>12:41 PM</a></li>
										<li><a href=""><i class="fa fa-calendar-o"></i>16.09.2020</a></li>
									</ul>
									<style type="text/css">
										.style_comment {
										    border: 1px solid #ddd;
										    border-radius: 10px;
										    background: #F0F0E9;
										}
									</style>
									<form>
										 @csrf
										<input type="hidden" name="comment_product_id" class="comment_product_id" value="{{$value->product_id}}">
										 <div id="comment_show"></div>
									
									</form>
									<style type="text/css">
											.rating_stars {
											    display: inline-block;
											    position: relative;
											    height: 50px;
											    line-height: 50px;
											    font-size: 30px;
											  }
											  
											  .rating_stars label {
											    position: absolute;
											    top: 0;
											    left: 0;
											    height: 100%;
											    cursor: pointer;
											  }
											  
											  .rating_stars label:last-child {
											    position: static;
											  }
											  
											  .rating_stars label:nth-child(1) {
											    z-index: 5;
											  }
											  
											  .rating_stars label:nth-child(2) {
											    z-index: 4;
											  }
											  
											  .rating_stars label:nth-child(3) {
											    z-index: 3;
											  }
											  
											  .rating_stars label:nth-child(4) {
											    z-index: 2;
											  }
											  
											  .rating_stars label:nth-child(5) {
											    z-index: 1;
											  }
											  
											  .rating_stars label input {
											    position: absolute;
											    top: 0;
											    left: 0;
											    opacity: 0;
											  }
											  
											  .rating_stars label .icon {
											   
											    color: transparent;
											   
											  }
											  
											  .rating_stars label:last-child .icon {
											    color: #000;
											  }
											  
											  .rating_stars:not(:hover) label input:checked~.icon,
											  .rating:hover label:hover input~.icon {
											    color: red;
											  }
											  
											  .rating_stars label input:focus:not(:checked)~.icon:last-child {
											    color: red;
											    text-shadow: 0 0 5px #5046c1;
											  }
									</style>
									<p><b>Viết đánh giá của bạn</b></p>

									
									  <div class="rating_stars mb-4">
                                    <label>
                                        <input type="radio" name="stars" class="stars" value="1" />
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" class="stars" value="2" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" class="stars" value="3" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" class="stars" value="4" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                    <label>
                                        <input type="radio" name="stars" class="stars" value="5" />
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                        <span class="icon">★</span>
                                    </label>
                                </div>                                        
									<form action="#" id="send_comment">
										<input type="hidden" name="rating" class="rating_value"  id="rating_value" >
										<input type="hidden" name="product_id" value="{{$value->product_id}}">

										<span>
											<input style="width:100%;margin-left: 0" type="text" class="comment_name" name="comment_name" placeholder="Tên bình luận"/>
												
										</span>
										<textarea name="comment" class="comment_content" placeholder="Nội dung bình luận" required></textarea>
										<div id="notify_comment"></div>
										
										<button type="submit" class="btn btn-default pull-right send-comment">
											Gửi bình luận
										</button>

									</form>
								</div>
							</div>
							
						</div>
					</div><!--/category-tab-->
	@endforeach
					<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">Sản phẩm liên quan</h2>
						
						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">
							@foreach($relate as $key => $lienquan)
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											 <div class="single-products">
		                                        <div class="productinfo text-center product-related">
		                                            <img src="{{URL::to('public/uploads/product/'.$lienquan->product_image)}}" alt="" />
		                                            <h2>{{number_format($lienquan->product_price,0,',','.').' '.'VNĐ'}}</h2>
		                                            <p>{{$lienquan->product_name}}</p>
		                                         
		                                        </div>
		                                      
                                			</div>
										</div>
									</div>
							@endforeach		

								
								</div>
									
							</div>
									
						</div>
					</div><!--/recommended_items-->
					{{--   <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$relate->links()!!}
                      </ul> --}}

@endsection
