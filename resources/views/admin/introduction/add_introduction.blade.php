@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm giới thiệu
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
                                <form role="form" action="{{URL::to('/save-introduction')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Mô tả giới thiệu</label>
                                    <textarea style="resize: none" rows="8" required class="form-control" name="introduction_desc"  id="ckeditor7"></textarea>
                                </div>     
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                      <select name="introduction_status" class="form-control input-sm m-bot15">
                                            <option value="0">Hiển thị</option>
                                            <option value="1">Ẩn</option>
                                            
                                    </select>
                                </div>
                               
                                <button type="submit" name="add_introduction" class="btn btn-info">Thêm giới thiệu</button>
                                </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection