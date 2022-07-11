@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê sản phẩm
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
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên sản phẩm</th>
            <th style="width: 120px;">Thư viện ảnh</th>
             <th style="width: 120px;">Tài liệu</th>
            <th>Slug</th>
            
            <th style="width: 100px;">Số lượng</th>
            <th>Giá bán</th>
            <th style="width: 100px;">Giá gốc</th>           
            
            <th>Hình sản phẩm</th>
            <th>Danh mục</th>
            <th style="width: 120px;">Thương hiệu</th>
            
            <th style="width: 90px;">Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>

            <td>{{ $pro->product_name }}</td>
            <td><a href="{{url('/add-gallery/'.$pro->product_id)}}">Thêm thư viên ảnh</a></td>
            @if($pro->product_file)
              <td><a target="_blank" href="{{asset('public/uploads/document/'.$pro->product_file)}}">Xem file</a></td>
            @else
            <td>Không file</td>
            @endif
            <td>{{ $pro->product_slug }}</td>
            
            <td>{{ $pro->product_quantity }}</td>
            <td>{{ number_format($pro->product_price),0,',','.' }}</td>
             <td>{{ number_format($pro->price_cost),0,',','.' }}</td>
            <td><img src="public/uploads/product/{{ $pro->product_image }}" height="100" width="100"></td>
            <td>{{ $pro->category_name }}</td>
            <td>{{ $pro->brand_name }}</td>

            <td><span class="text-ellipsis">
              <?php
               if($pro->product_status==0){
                ?>
                <a href="{{URL::to('/unactive-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-product/'.$pro->product_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
           
            <td>
              <a href="{{URL::to('/edit-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có muốn xóa sản phẩm này ko?')" href="{{URL::to('/delete-product/'.$pro->product_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
   

    <footer class="panel-footer">
      <div class="row">
        
        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$all_product->links()!!}
                      </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection