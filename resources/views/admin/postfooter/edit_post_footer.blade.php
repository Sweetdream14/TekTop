@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Sửa bài viết
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
                                <form role="form" action="{{URL::to('/update-post-footer/'.$PostFooter->post_footer_id)}}" method="post" enctype='multipart/form-data'>
                                    
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên bài viết</label>
                                    <input type="text" name="post_footer_title" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" class="form-control" onkeyup="ChangeToSlug();" value="{{$PostFooter->post_footer_title}}" id="slug" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Slug</label>
                                    <input type="text" name="post_footer_slug" value="{{$PostFooter->post_footer_slug}}" class="form-control" id="convert_slug" placeholder="Slug">
                                </div>
                              
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung bài viết</label>
                                    <textarea style="resize: none" rows="8" class="form-control" name="post_footer_content" id="ckeditor2" placeholder="Mô tả danh mục">{{$PostFooter->post_footer_content}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Meta từ khóa</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="post_footer_meta_keywords" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$PostFooter->post_footer_meta_keywords}}</textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Meta nội dung</label>
                                    <textarea style="resize: none" rows="5" class="form-control" name="post_footer_meta_desc" id="exampleInputPassword1" placeholder="Mô tả danh mục">{{$PostFooter->post_footer_meta_desc}}</textarea>
                                </div>
                               
                               
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="post_footer_status" class="form-control input-sm m-bot15">
                                        @if($PostFooter->post_footer_status==0)
                                            <option selected value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                        @else
                                            <option value="0">Hiển thị</option>
                                            <option selected value="1">Ẩn</option>
                                        @endif

                                            
                                    </select>
                                </div>
                                <button type="submit" name="add_post_footer" class="btn btn-info">Sửa bài viết</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection