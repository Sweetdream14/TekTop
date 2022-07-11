@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê liên hệ
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
           
          </th>
            <th>Thông tin liên hệ</th>
           
            <th>Hình ảnh logo</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($contact as $key => $cont)
          <tr>
          
            <td>{!! $cont->info_contact !!}</td>
            <td><img src="{{'public/uploads/contact/'.$cont->info_image }}" height="100" width="100"></td>
           
           
            <td>
              <a href="{{URL::to('/edit-information/'.$cont->info_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có muốn xóa liên hệ này ko ?')" href="{{URL::to('/delete-information/'.$cont->info_id)}}" class="active styling-edit" ui-toggle-class="">
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
          
      </div>
    </footer>
  </div>
</div>
@endsection