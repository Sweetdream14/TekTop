@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê bài viết chân trang
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
      <table class="table table-striped b-t b-light" id="myTable">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th>Tên bài viết</th>
           
            <th>Slug</th>
            <th>Mô tả bài viết</th>
            <th>Từ khóa bài viết</th>
            
            <th>Hiển thị</th>
            
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_post_footer as $key => $post_foo)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $post_foo->post_footer_title }}</td>
           
            <td>{{ $post_foo->post_footer_slug }}</td>
            <td>{!! $post_foo->post_footer_content !!}</td>
            <td>{{ $post_foo->post_footer_meta_keywords }}</td>
         
           
           <td><span class="text-ellipsis">
              <?php
               if($post_foo->post_footer_status==0){
                ?>
                <a href="{{URL::to('/unactive-post-footer/'.$post_foo->post_footer_id)}}"><span class="fa-thumb-styling fa fa-thumbs-up"></span></a>
                <?php
                 }else{
                ?>  
                 <a href="{{URL::to('/active-post-footer/'.$post_foo->post_footer_id)}}"><span class="fa-thumb-styling fa fa-thumbs-down"></span></a>
                <?php
               }
              ?>
            </span></td>

            <td>
              <a href="{{URL::to('/edit-post-footer/'.$post_foo->post_footer_id)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa bài viết này ko?')" href="{{URL::to('/delete-post-footer/'.$post_foo->post_footer_id)}}" class="active styling-edit" ui-toggle-class="">
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
            {!!$all_post_footer->links()!!}
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection