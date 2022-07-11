@extends('layout')
@section('content')

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
            <th >Tình trạng đơn hàng</th>
            
            <th style="width:110px;"></th>
            
           
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
            <td>{{ $ord->order_code }}</td>
            <td>{{ $ord->created_at }}</td>
            <td>
              @if($ord->order_status==1)
                    <span class="text text-success">Đơn hàng mới</span>
                @elseif($ord->order_status==2)
                    <span class="text text-primary">Đơn hàng đã giao hàng</span>
                @else
                    <span class="text text-danger">Đơn hàng đã huỷ</span>
                @endif
             </td>
           <td>
              
              <!-- Trigger the modal with a button -->
              @if($ord->order_status!=3)
              <p><button type="button" class="btn btn-danger remove_prod" data-toggle="modal" id="{{$ord->order_code}}" data-target="#huydon">Hủy đơn hàng</button></p>
              @endif
              <!-- Modal -->
              <div id="huydon" class="modal fade" role="dialog">
                <div class="modal-dialog">
               <form>
                @csrf
                  
                  <!-- Modal content-->
                  <div class="modal-content" style="margin-top: 110px">
                    <div class="modal-header">
                      
                      <h4 class="modal-title">Lý do hủy đơn hàng</h4>
                    </div>
                    <div class="modal-body">
                      <p><textarea rows="5" class="lydohuydon" required></textarea></p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                      <button type="button"  onclick="Huydonhang(this.id)" class="btn btn-success add_order_id">Gửi lý do hủy</button>
                    </div>
                  </div>
                </form>

            
                  </div>
                </div>

              <p><a href="{{URL::to('/view-history-order/'.$ord->order_code)}}" class="active styling-edit" ui-toggle-class="">
               Xem đơn hàng</a></p>
              
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
   
    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          {{-- <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small> --}}
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