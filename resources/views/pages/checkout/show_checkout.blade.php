@extends('layout')
@section('content')

<section id="cart_items">
		<div class="container">
			<div class="breadcrumbs">
				<ol class="breadcrumb">
				  <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
				  <li class="active">Thanh toán giỏ hàng</li>
				</ol>
			</div>

			

			<div class="shopper-informations">

						<div class="bill-to">

							<p>Điền thông tin gửi hàng</p>
							
							<div class="form-one">
								
								
								<form method="POST">
									@csrf
									<input type="text" name="shipping_name" class="shipping_name" placeholder="Họ và tên">
									<input type="text" name="shipping_address" class="shipping_address" placeholder="Địa chỉ">
									<input type="text" name="shipping_email" class="shipping_email" placeholder="Email">
									<input type="text" name="shipping_phone" class="shipping_phone" placeholder="Phone">
									<textarea name="shipping_notes" class="shipping_notes" placeholder="Ghi chú đơn hàng của bạn" rows="5"></textarea>
									
								
								   
								   	@if(Session::get('free'))
								   		<input type="hidden" name="order_free" class="order_free" value="{{Session::get('free')}}">
								   	@else
								   		<input type="hidden" name="order_free" class="order_free" value="10000">
								   	@endif	

								   	@if(Session::get('coupon'))
								   		@foreach(Session::get('coupon') as $key => $cou)
								   		<input type="hidden" name="order_coupon" class="order_coupon" value="{{$cou['coupon_code']}}">
								   		@endforeach
								   	@else 
								   		<input type="hidden" name="order_coupon" class="order_coupon" value="No">
								   	@endif
								   		
								   
								   <div class="">
										<div class="form-group" style="margin-top: 15px;">
                                    		<label for="exampleInputPassword1">Chọn hình thức thanh toán</label>
                                        <select name="payment_select" class="form-control input-sm m-bot15 payment_select">
                                            <option value="0">Thanh toán bằng chuyển khoản</option>
                                            <option value="1">Thanh toán bằng tiền mặt</option>  
                                        </select>
                                </div>
									</div>
									<input type="button" value="Xác nhận đơn hàng" name="send_order" class="btn btn-primary btn-sm send_order">
								</form>
								
								<form>
                                     @csrf
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn thành phố</label>
                                        <select name="city" id="city" class="form-control input-sm m-bot15 choose city">
                                            <option value="">---Chọn thành phố---</option> 
                                        @foreach($city as $key => $ci)
                                            <option value="{{$ci->matp}}">{{$ci->name_city}}</option>
                                        @endforeach              
                                        </select>

                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn quận huyện</label>
                                        <select name="province" id="province" class="form-control input-sm m-bot15 choose province">
                                            <option value="">---Chọn quận huyện---</option>  
                                        </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Chọn xã phường</label>
                                        <select name="wards" id="wards" class="form-control input-sm m-bot15 wards">
                                            <option value="">---Chọn xã phường---</option>
                                        </select>                          
                                </div>
                               
                              
                                
								
									
									<input type="button" value="Tính phí vận chuyển" name="calculate_order" class="btn btn-primary btn-sm calculate_delivery">
								</form> 
								
								
							</div>
							
							
						</div>
				<div class="row">

					<div class="col-sm-12 clearfix">

						@if(session()->has('message'))
		                    <div class="alert alert-success">
		                        {{ session()->get('message') }}
		                    </div>  
		          		@elseif(session()->has('error'))
		                     <div class="alert alert-danger">
		                        {{ session()->get('error') }}
		                    </div>
		                @endif
						<div class="table-responsive cart_info" style="width: 868px;">

							<form action="{{url('/update-cart')}}" method="POST">
								@csrf
							<table class="table table-condensed"  >
								<thead>
									<tr class="cart_menu">
										<td class="image">Hình ảnh</td>
										<td class="description">Tên sản phẩm</td>
										<td class="price">Giá sản phẩm</td>
										<td class="quantity">Số lượng</td>
										<td class="total">Thành tiền</td>
										<td></td>
									</tr>
								</thead>
								<tbody>
									@if(Session::get('cart')==true)
									@php
											$total = 0;
									@endphp
									@foreach(Session::get('cart') as $key => $cart)
										@php
											$subtotal = $cart['product_price']*$cart['product_qty'];
											$total+=$subtotal;
										@endphp

									<tr>
										<td class="cart_product">
											<img src="{{asset('public/uploads/product/'.$cart['product_image'])}}" width="90" alt="{{$cart['product_name']}}" />
										</td>
										<td class="cart_description">
											<h4><a href=""></a></h4>
											<p>{{$cart['product_name']}}</p>
										</td>
										<td class="cart_price">
											<p>{{number_format($cart['product_price'],0,',','.')}} VNĐ</p>
										</td>
										<td class="cart_quantity">
											<div class="cart_quantity_button">
											
											
												<input class="cart_quantity" type="number" min="1" name="cart_qty[{{$cart['session_id']}}]" value="{{$cart['product_qty']}}"  >
											
												
											</div>
										</td>
										<td class="cart_total">
											<p class="cart_total_price">
												{{number_format($subtotal,0,',','.')}} VNĐ
												
											</p>
										</td>
										<td class="cart_delete">
											<a class="cart_quantity_delete" href="{{url('/del-product/'.$cart['session_id'])}}"><i class="fa fa-times"></i></a>
										</td>
									</tr>
									
									@endforeach
									<tr>
										<td colspan="3"><input type="submit" value="Cập nhật giỏ hàng" name="update_qty" class="check_out btn btn-default btn-sm">
										<a class="btn btn-default check_out" href="{{url('/del-all-product')}}">Xóa tất cả</a>
										@if(Session::get('coupon'))
										<a class="btn btn-default check_out" href="{{url('/unset-coupon')}}">Xóa mã khuyến mãi</a>
										@endif
									</td>
										
										
										<td colspan="2">
										Tổng tiền: <span>{{number_format($total,0,',','.')}} VNĐ</span><br>
										@if(Session::get('free'))
										
											
										@endif
										@if(Session::get('coupon'))
												
												@foreach(Session::get('coupon') as $key => $cou)
													@if($cou['coupon_condition']==1)
														Mã giảm: {{$cou['coupon_number']}} %
														
															@php 
															$total_coupon = ($total*$cou['coupon_number'])/100;
															
															@endphp
														
														 
														 	@php
														 $total_after_coupon = $total-$total_coupon
														 @endphp
														<br>
													@elseif($cou['coupon_condition']==2)
														Mã giảm: {{number_format($cou['coupon_number'],0,',','.')}} VNĐ
														<br>
															@php 
															$total_coupon = $total - $cou['coupon_number'];
															
															@endphp
														
														@php
															$total_after_coupon = $total_coupon;
														@endphp

													@endif

												@endforeach
											


										
										<a class="cart_quantity_delete" href="{{url('/del-free')}}"></a>
										Phí vận chuyển: <span>{{number_format(Session::get('free'),0,',','.')}} VNĐ</span><br>
										<?php $total_after_free = $total - Session::get('free'); ?>
									
										
										@endif 

										
											Tổng còn:
										   @php 
											if(Session::get('free') && !Session::get('coupon')){
												$total_after_free = 0;
												$total_after = $total_after_free; 
												echo number_format($total_after,0,',','.').' VNĐ';
												}elseif(!Session::get('free') && Session::get('coupon')){
											 	$total_after = $total_after_coupon;
												echo number_format($total_after,0,',','.').' VNĐ';
												}elseif(Session::get('free') && Session::get('coupon')){
												$total_after = $total_after_coupon;
											 	$total_after = $total_after - Session::get('free');
											 	echo number_format($total_after,0,',','.').' VNĐ';
											}elseif(!Session::get('free') && !Session::get('coupon')){
											 	$total_after = $total;
											 	echo number_format($total_after,0,',','.').' VNĐ';
											 }

										@endphp 
										  
										
											
										

										

										
										
										

									</td>
									</tr>
									 @else

									<tr>
										<td colspan="5"><center style="color: green; font-size: 17px; width: 100%; font-weight: bold;">
										@php 
										echo 'Làm ơn thêm sản phẩm vào giỏ hàng';
										@endphp
										</center></td>
									</tr>
									@endif
								</tbody>

							</form>
							@if(Session::get('cart'))
							<tr><td >
								<form method="POST" action="{{url('/check-coupon')}}">
									@csrf
												<input type="type" class="form-control" name="coupon" placeholder="Nhập mã giảm giá" style="width: 140px"><br>
												<input type="submit" class="btn btn-default check_coupon" name="check_coupon" value="Tính mã giảm giá" style="width: 140px">
											</form>
										</td>
							</tr>
							@endif
						</table>
								</div>		
							</div>
						</div>
			

			
			
		</div>
					
					
					
					
	</section> <!--/#cart_items-->

@endsection