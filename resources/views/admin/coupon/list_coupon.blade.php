@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê mã giảm giá
    </div>
    
    

                     <div class="message">
                      <?php
                            $message = Session::get('message');
                            if($message){
                                echo '<span class="text-alert">'.$message.'</span>';
                                Session::put('message',null);
                            }
                            ?>
                          </div>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            
            <th style="width: 430px;">Tên mã giảm giá</th>
            <th style="width: 190px;">Ngày bắt đầu</th>
            <th style="width: 220px;">Ngày kết thúc</th>
            <th>Mã giảm giá</th>
            <th style="width: 240px;">Số lượng</th>
            <th style="width: 310px;">Điều kiện giảm giá</th>
            <th style="width: 200px;">Số giảm</th>
            <th style="width: 340px;">Tình trạng</th>
            <th style="width: 270px;">Hạn sử dụng</th>
            <th style="width: 190px;">Quản lý</th>
            <th style="width: 130px;">Gửi mã</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($coupon as $key => $cou)
          <tr>
            
            <td>{{$cou->coupon_name}}</td>
            <td>{{$cou->coupon_date_start}}</td>
            <td>{{$cou->coupon_date_end}}</td>
            <td>{{$cou->coupon_code}}</td>
            <td>{{$cou->coupon_time}}</td>
            <td><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
               Giảm theo phần trăm
                <?php
                 }else{
                ?>  
                Giảm theo tiền
                <?php
               }
              ?>
            </span>
          </td>

             <td><span class="text-ellipsis">
              <?php
               if($cou->coupon_condition==1){
                ?>
               Giảm {{$cou->coupon_number}} %
                <?php
                 }else{
                ?>  
                Giảm {{number_format($cou->coupon_number),0,',','.'}} VNĐ
                <?php
               }
              ?>
            </span></td>
           
            

              <td><span class="text-ellipsis" >
              <?php
            
             if(strtotime(date('d-m-Y')) >= strtotime(date('d-m-Y',strtotime(str_replace('/','-',$cou->coupon_date_end))))){
              echo 'Đã khoá';

             }else{
              echo 'Đang kích hoạt';
             }
             ?>
              </span>
             

           
          </td>

           <td><span class="text-ellipsis">
              <?php
            
             if(strtotime(date('d-m-Y')) >= strtotime(date('d-m-Y',strtotime(str_replace('/','-',$cou->coupon_date_end))))){
              echo 'Hết hạn';
             }else{
              echo 'Còn hạn';
             }
             ?>

        

        <td>
           <a onclick="return confirm('Bạn có muốn xoá mã giảm giá này ko?')" href="{{URL::to('/delete-coupon/'.$cou->coupon_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
              <td>

                @if($cou->coupon_vip==1)
                  <p><a href="{{url('/send-coupon-vip',[ 
                    'coupon_time'=>$cou->coupon_time,
                    'coupon_condition'=>$cou->coupon_condition,
                    'coupon_number'=>$cou->coupon_number,
                    'coupon_code'=>$cou->coupon_code
                  ])}}" class="btn btn-primary" style="margin: 5px 0;">Gửi giảm giá khách vip</a></p>
                @elseif($cou->coupon_vip==2) 
                  <p><a href="{{url('/send-coupon',[
                    'coupon_time'=>$cou->coupon_time,
                    'coupon_condition'=>$cou->coupon_condition,
                    'coupon_number'=>$cou->coupon_number,
                    'coupon_code'=>$cou->coupon_code
                  ])}}" class="btn btn-default">Gửi giảm giá khách thường</a></p>

              @endif      
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
       <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$coupon->links()!!}
                      </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection