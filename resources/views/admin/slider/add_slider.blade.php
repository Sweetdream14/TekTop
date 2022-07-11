@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm Slide
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
                                <form role="form" action="{{URL::to('/insert-slider')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên Slider</label>
                                    <input type="text" required name="slider_name" class="form-control" id="exampleInputEmail1" placeholder="Tên Slider">
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả Slider</label>
                                    <textarea style="resize: none" rows="8" required class="form-control" name="slider_desc" id="exampleInputPassword1" placeholder="Mô tả Slider"></textarea>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">Hình ảnh</label>
                                    <input type="file" name="slider_image" class="form-control" id="exampleInputEmail1" placeholder="Slider">
                                </div>
                              
                              
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="slider_status" class="form-control input-sm m-bot15">
                                            <option value="1">Ẩn</option>
                                            <option value="0">Hiển thị</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_slider" class="btn btn-info">Thêm slider</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection