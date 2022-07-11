@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê Slider
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
            <th>Mô tả giới thiệu</th>
            
            <th>Hiển thị</th>
            <th>Quản lý</th>
            
          </tr>
        </thead>
        <tbody>
          @foreach($all_introduction as $key => $intro)
          <tr>
             <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{!!$intro->introduction_desc!!}</td>
            
            <td><span class="text-ellipsis">
              <?php
               if($intro->introduction_status==0){
                ?>
                <a href="{{URL::to('/unactive-introduction/'.$intro->introduction_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-introduction/'.$intro->introduction_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>
           
           
           
            <td>
             
                 <a href="{{URL::to('/edit-introduction/'.$intro->introduction_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có muốn xóa slide này ko?')" href="{{URL::to('/delete-introduction/'.$intro->introduction_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
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
                       
                      </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection