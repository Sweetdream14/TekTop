@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                           Thêm thông tin liên hệ
                        </header>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif      
                        <div class="panel-body">            
                            <div class="position-center">                
                                    <form role="form" action="{{URL::to('/save-info')}}" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Thông tin liên hệ</label>
                                        <textarea style="resize: none"  rows="8" class="form-control" name="info_contact" id="ckeditor" ></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Bản đồ</label>
                                        <textarea style="resize: none" rows="8" required class="form-control" name="info_map" id="exampleInputPassword1"></textarea>
                                    </div>
                                     <div class="form-group">
                                        <label for="exampleInputPassword1">Fanpage</label>
                                        <textarea style="resize: none" rows="8" required class="form-control" name="info_fanpage" id="exampleInputPassword1" placeholder="Mô tả danh mục"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh logo</label>
                                        <input type="file" name="info_image" class="form-control" id="exampleInputEmail1">
                                    </div>
                                   
                                    <button type="submit" name="add_info"  class="btn btn-info">Thêm thông tin</button>
                                    </form>        
                                                          </div>                
                        </div>
                    </section>

                    <section class="panel">
                        <header class="panel-heading">
                           Thêm mạng xã hội
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
                                    <form role="form" id="from-nut">
                                        {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên mạng xã hội</label>
                                        <input type="text" name="name_icons" id="name_icons" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Link</label>
                                        <input type="text" name="link_icons" id="link_icons" class="form-control">

                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh</label>
                                        <input type="file" name="info_image" class="form-control" id="image_nut">
                                        
                                    </div>
                                   
                                    <button type="button" name="add_info" class="btn btn-info add-nut">Thêm mạng xã hội</button>
                                    </form>        
                                 </div>
                                <div class="position-center">  
                                 <div id="list_nut"></div> 
                                 </div>              
                        </div>
                    </section>

                       <section class="panel">
                        <header class="panel-heading">
                           Thêm đối tác
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
                                    <form role="form" id="from-nut">
                                        {{ csrf_field() }}

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Tên đối tác</label>
                                        <input type="text" name="name_doitac" id="name_doitac" class="form-control">

                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">Link đối tác</label>
                                        <input type="text" name="link_doitac" id="link_doitac" class="form-control">

                                       
                                    </div>
                                    
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Hình ảnh đối tác</label>
                                        <input type="file" name="info_image" class="form-control" id="image_doitac">
                                        
                                    </div>
                                   
                                    <button type="button" name="add_info" class="btn btn-info add-doitac">Thêm đối tác</button>
                                    </form>        
                                 </div>
                                <div class="position-center">  
                                 <div id="list_doitac"></div> 
                                 </div>              
                        </div>
                    </section>


            </div>
@endsection