@extends('layout')

@section('wishlist')
    @include('pages.include.wishlist')
@endsection

@section('view')
    @include('pages.include.view')
@endsection

@section('dota')
    @include('pages.include.dota')
@endsection

@section('content')
 <div class="features_items"><!--features_items-->
     <div class="category-tab"><!--category-tab-->
                        <div class="col-sm-12">
                            <ul class="nav nav-tabs">
                                @php 
                                    $i = 0;
                                @endphp
                               

                                @foreach($cate_pro_tabs as $key => $cat_tab)
                                    @php 
                                    $i++;
                                    @endphp
                                <li class="tabs_pro {{$i==1 ? 'active' : ''}}" data-id="{{$cat_tab->category_id}}"><a href="#tshirt" data-toggle="tab">{{$cat_tab->category_name}}</a></li>

                                @endforeach

                            </ul>
                        </div>

                        <div id="tabs_product"></div>

                    </div>

                        <h2 class="title text-center">Sản phẩm mới nhất</h2>
                        @foreach($all_product as $key => $product)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                             
                                <div class="single-products">
                                        <div class="productinfo text-center">
                                           <form>
                                                @csrf
                                            <input type="hidden" value="{{$product->product_id}}" class="cart_product_id_{{$product->product_id}}">

                                            <input type="hidden" id="wishlist_productname{{$product->product_id}}" value="{{$product->product_name}}" class="cart_product_name_{{$product->product_id}}">

                                            <input type="hidden" value="{{$product->product_image}}" class="cart_product_image_{{$product->product_id}}">

                                             <input type="hidden" value="{{$product->product_quantity}}" class="cart_product_quantity_{{$product->product_id}}">

                                            <input type="hidden" id="wishlist_productprice{{$product->product_id}}" value="{{$product->product_price}}" class="cart_product_price_{{$product->product_id}}">

                                            <input type="hidden" value="1" class="cart_product_qty_{{$product->product_id}}">

                                            <a id="wishlist_producturl{{$product->product_id}}" href="{{URL::to('/chi-tiet-san-pham/'.$product->product_slug)}}">
                                                <img id="wishlist_productimage{{$product->product_id}}" src="{{URL::to('public/uploads/product/'.$product->product_image)}}" alt="" />
                                                <h2>{{number_format($product->product_price,0,',','.').' VNĐ'}}</h2>
                                                <p>{{$product->product_name}}</p>

                                             
                                             </a>
                                            <input type="button" value="Thêm giỏ hàng" class="btn btn-default add-to-cart" data-id_product="{{$product->product_id}}" name="add-to-cart">

                                             
                                            </form>
                                        </div>
                                      
                                </div>
                           
                                <div class="choose">
                                    <ul class="nav nav-pills nav-justified">
                                        <style type="text/css">
                                            ul.nav.nav-pills.nav-justified li{
                                                text-align: center;
                                                font-size: 13px;
                                            }
                                            .button_wishlist{
                                                border: none;
                                                background: #ffff;
                                                color: #B3AFA8;
                                            }
                                            ul.nav.nav-pills.nav-justified i{
                                                color: #B3AFA8;
                                            }
                                            .button_wishlist span:hover{
                                                color: #FE980F;
                                            }
                                            .button_wishlist:focus{
                                                border: none;
                                                outline: none;
                                            }
                                        </style>
                                        <li>
                                            <i class="fa fa-plus-square"></i>
                                            <button class="button_wishlist" id="{{$product->product_id}}" onclick="add_wistlist(this.id);"><span>Yêu thích</span></button>
                                        </li>
                                        <li><a style="cursor: pointer;" onclick="add_compare({{$product->product_id}})"><i class="fa fa-plus-square"></i>So sánh</a></li>

                                          <!-- Modal -->
                                              <div class="modal fade" id="sosanh" role="dialog">
                                                <div class="modal-dialog">
                                                
                                                  <!-- Modal content-->
                                                  <div class="modal-content" style="width: 900px";>
                                                    <div class="modal-header">
                                                      
                                                      <h4 class="modal-title"><span id="title-compare"></span></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                       
                                                        <table class="table table-hover" id="row_compare">
                                                            <thead>
                                                              <tr>
                                                                <th style=" width: 180px;">Tên sản phẩm</th>
                                                                <th>Giá</th>
                                                                <th>Hình ảnh</th>
                                                                <th>Thông số kỹ thuật</th>
                                                                <th>Xem chi tiết</th>
                                                                <th>Xoá</th>
                                                              </tr>
                                                            </thead>
                                                            <tbody>

                                                           
                                                            </tbody>
                                                          </table>
                                                    </div>
                                                    <div class="modal-footer">
                                                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>
                                                  </div>
                                                  
                                                </div>
                                              </div>
                                              
                                            
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div><!--features_items-->
                     <center><ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$all_product->links()!!}
                      </ul></center>
                    <!--/recommended_items-->
                    @endsection