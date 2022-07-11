@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm mã giảm giá
                        </header>
                              <div class="message">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                          </div>
   
                        <div class="panel-body">

                            <div class="position-center">
                                <form role="form" action="{{URL::to('/insert-coupon-code')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên mã giảm giá</label>
                                    <input type="text" required name="coupon_name" class="form-control" id="exampleInputEmail1">
                                </div>  
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày bắt đầu</label>
                                    <input type="text" required name="coupon_date_start" class="form-control" id="start_coupon">
                                </div>  
                                 <div class="form-group">
                                    <label for="exampleInputEmail1">Ngày kết thúc</label>
                                    <input type="text"  name="coupon_date_end" class="form-control" id="end_coupon">
                                </div>  
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mã giảm giá</label>
                                     <input type="text" name="coupon_code" class="form-control" id="exampleInputEmail1">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Số lượng mã</label>
                                    <input type="text" name="coupon_time" required class="form-control" id="exampleInputEmail1">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tính năng mã</label>
                                    <select name="coupon_condition" class="form-control input-sm m-bot15">
                                            <option value="0">-----Chọn-----</option>
                                            <option value="1">Giảm theo phần trăm</option>
                                            <option value="2">Giảm theo tiền</option>
                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Lựa chọn khách hàng</label>
                                    <select name="coupon_vip" class="form-control input-sm m-bot15">
                                            <option value="0">-----Chọn-----</option>
                                            <option value="1">Khách vip</option>
                                            <option value="2">Khách thường</option>
                                            
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Nhập số phần trăm hoặc tiền mặt</label>
                                    <input type="text" name="coupon_number" required  data-validation="length" data-validation-length="min2" data-validation-error-msg="Làm ơn điền phần trăm hoặc tiền mặt" class="form-control" id="exampleInputEmail1" >
                                </div>                        
        
                                <button type="submit" name="add_category_product" class="btn btn-info">Thêm mã giảm giá</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection