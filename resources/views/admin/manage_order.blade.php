@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê đơn hàng
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
            
            <th>Thứ tự</th>
            <th>Mã đơn hàng</th>
            <th>Ngày tháng đặt hàng</th>
            <th>Tình trạng đơn hàng</th>
            <th>Lý do hủy</th>
            <th>Quản lý</th>
            <th style="width:30px;"></th>
            
           
          </tr>
        </thead>
        <tbody>
          @php
          $i = 0;
          @endphp
          @foreach($getorder as $key => $ord)
          @php
          $i++;
          @endphp
          <tr>
            <td><i>{{$i}}</i></label></td>
            <td>{{$ord->order_code}}</td>
            <td>{{$ord->created_at}}</td>

            <td>@if($ord->order_status==1)
                    <span class="text text-success">Đơn hàng mới</span>
                @elseif($ord->order_status==2)
                    <span class="text text-primary">Đơn hàng đã giao hàng</span>
                @else
                    <span class="text text-danger">Đơn hàng đã huỷ</span>
                @endif
             </td>
              <td>
                @if($ord->order_destroy==3)
                {{$ord->order_destroy}}
                @endif
              </td>

            
            
           
            <td colspan="2">
              <a href="{{URL::to('/view-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-eye text-success text-active"></i></a>
             
                
              </a>
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
            {!!$getorder->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection