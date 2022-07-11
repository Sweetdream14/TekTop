<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!----------seo----------->
    <meta name="description" content="{{$meta_desc}}">
    <meta name="keywords" content="{{$meta_keywords}}"/>
    <meta name="robots" content="INDEX,FOLLOW"/>
    <link  rel="canonical" href="{{$url_canonical}}" />
    <meta name="author" content="">
    <link rel="icon" href="{{asset('public/frontend/images/TekTop75.jpg')}}" type="image/gif" sizes="16x16">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <!-----//-----seo----------->
    <title>{{$meta_title}}</title>
    <link href="{{asset('public/frontend/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettyPhoto.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/price-range.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/main.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/responsive.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/sweetalert.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightgallery.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/lightslider.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/prettify.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/yBox.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/frontend/css/owl.theme.default.min.css')}}" rel="stylesheet">
     <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">
     

    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->       
    <link rel="shortcut icon" href="{{URL::to('public/frontend/images/favicon.ico')}}">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">


    <style>



    </style>

</head><!--/head-->

<body>
    <header id="header"><!--header-->
        <div class="header_top"><!--header_top-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="contactinfo">
                            <ul class="nav nav-pills">
                                <li><a><i class="fa fa-phone"></i> <span style="color: red; font-weight: bold;"> Hotline:</span> Mr.Linh | 0984.880.966</a></li>
                                <li><a><i class="fa fa-envelope"></i>  <span style="color: red; font-weight: bold;"> Email:</span> tplinkvietnam89@gmail.com</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="social-icons pull-right">
                           
                            <ul class="nav navbar-nav">
                                @foreach($icons as $key =>$ico)
                                 <li><a target="_blank" title="{{$ico->name_icons}}" href="{{$ico->link_icons}}">
                                     <img alt="{{$ico->name_icons}}" style="margin:4px" height="32px" width="32px" src="{{asset('public/uploads/icons/'.$ico->image_icons)}}"></a>
                                 </a></li>
                                 @endforeach
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header_top-->
        
        <div class="header-middle"><!--header-middle-->
            <div class="container">
                <!--code logo-->
                <div class="row" style=" padding-bottom: 0;">




                      @foreach($contact_footer as $key => $logo)
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                             <p><img src="{{asset('public/uploads/contact/'.$logo->info_image)}}" height="100" width="100" ></p>
                           {{--  {{dd(asset('public/uploads/contact/'.$logo->info_image))}} --}}
                        </div>
                        @endforeach
                        

                       
                        
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                              
                            <ul class="nav navbar-nav">
                               <?php
                                   $customer_id = Session::get('customer_id');
                                   $shipping_id = Session::get('shipping_id');
                                   if($customer_id!=NULL && $shipping_id==NULL){ 
                                 ?>
                                  <li><a href="{{URL::to('/checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                
                                <?php
                                 }elseif($customer_id!=NULL && $shipping_id!=NULL){
                                 ?>
                                 <li><a href="{{URL::to('/payment')}}"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
                                 <?php 
                                }else{
                                ?>
                                 <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-crosshairs"></i> Thanh toán</a></li>
                                <?php
                                 }
                                ?>

                               
                                
                                <li><a href="{{url('gio-hang')}}"><i class="fa fa-shopping-cart"></i> 
                                Giỏ hàng
                                   
                                        <span class="show-cart"></span>
                                          
                                </a></li>
                                
                                @php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){ 
                                @endphp
                                
                                <li>
                                    <a href="{{URL::to('/history')}}"><i class="fa fa-bell"></i> Lịch sử đơn hàng </a>
                                   

                                </li>
                                
                            
                                 
                                <?php
                                 }
                                ?>
                                <?php
                                   $customer_id = Session::get('customer_id');
                                   if($customer_id!=NULL){ 
                                 ?>
                                <li>
                                    <a href="{{URL::to('/logout-checkout')}}"><i class="fa fa-lock"></i> Đăng xuất </a>
                                    <img width="15%" src="{{Session::get('customer_picture')}}"> {{Session::get('customer_name')}}

                                </li>
                                
                                <?php
                            }else{
                                 ?>
                                 <li><a href="{{URL::to('/login-checkout')}}"><i class="fa fa-lock"></i> Đăng nhập</a></li>
                                 <?php 
                             }
                                 ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div><!--/header-middle-->
    
        <div class="header-bottom" id="navbar"><!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-7">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>
                        <div class="mainmenu pull-left " style="margin-top: 10px">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="{{URL::to('/trang-chu')}}" class="active">Home</a></li>
                               <li class="dropdown"><a href="#">Sản phẩm<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        @foreach($category as $key => $cate)
                                        @if($cate->category_parent==0)
                                            <li><a href="{{URL::to('/danh-muc/'.$cate->slug_category_product)}}">{{$cate->category_name}}</a></li>
                                            @foreach($category as $key => $cate_sub)
                                                @if($cate_sub->category_parent==$cate->category_id)
                                                <ul class="cate_sub">
                                                    <li><a href="{{URL::to('/danh-muc/'.$cate_sub->slug_category_product)}}">{{$cate_sub->category_name}}</a></li>
                                                </ul>

                                                @endif
                                            @endforeach
                                        @endif
                                        @endforeach
                                    </ul>
                                </li> 
                                <li class="dropdown"><a href="#">Tin tức<i class="fa fa-angle-down"></i></a>
                                    <ul role ="menu" class="sub-menu">
                                        @foreach($category_post as $key => $danhmucbaiviet)
                                             <li><a href="{{'/danh-muc-bai-viet/'.$danhmucbaiviet->cate_post_slug}}"> {{$danhmucbaiviet->cate_post_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                 <li><a href="{{URL::to('/gio-hang')}}">Giỏ hàng

                                        <span class="show-cart"></span>
                                   
                                 </a></li>
                                <li><a href="{{URL::to('/video-shop')}}">Video shop</a></li>
                                <li><a href="{{URL::to('/lien-he')}}">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-5">
                        <form action="{{URL::to('/tim-kiem')}}" autocomplete="off" method="POST">
                            {{csrf_field()}}
                            <div class="search_box">
                                <input type="text" style="width: 60%; margin-right: 10px" name="keywords_submit" id="keywords" placeholder="Tìm kiếm sản phẩm"/>
                                <div id="search_ajax" style="position: fixed; margin-top:40px; z-index: 999;"></div>
                                <input type="submit" style="margin-top: 0;color:#666; float: inherit;" name="search_items" class="btn btn-primary btn-sm" value="Tìm kiếm">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div><!--/header-bottom-->
    </header><!--/header-->
    
 <section id="slider"><!--slider-->
        <div class="container">
            <div class="row">
                <div class="col-sm-15">
                    <div id="slider-carousel" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
                            <li data-target="#slider-carousel" data-slide-to="1"></li>
                            <li data-target="#slider-carousel" data-slide-to="2"></li>
                        </ol>
                        
                         <div class="carousel-inner">
                            @php 
                            $i = 0;
                        @endphp
                        @foreach($slider as $key => $slide)
                            @php 
                                $i++;
                            @endphp
                            <div class="item {{$i==1 ? 'active' : '' }}">
                               
                                <div class="col-sm-12" style="margin-left: -150px;width: 1240px;">
                                    <img alt="{{$slide->slider_desc}}" src="{{asset('public/uploads/slider/'.$slide->slider_image)}}" height="400"  class="img img-responsive">
                                   
                                </div>
                            </div>
                        @endforeach  
                            
                            
                            
                        </div>
                        <a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev" style=" margin-top: -60px";>
                            <i class="fa fa-angle-left" style="margin-left: 10px;"></i>
                        </a>
                        <a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next" style="margin-top: -60px";>
                            <i class="fa fa-angle-right"style="margin-right: 10px;"></i>
                        </a>
                    </div>
                    
                </div>
            </div>
        </div>
    </section><!--/slider-->

    <!------------------------------- Attribute Section --------------------------->
    @yield('attribute')
    
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Danh mục sản phẩm</h2>
                        <div class="panel-group category-products" id="accordian"><!--category-productsr-->
                          @foreach($category as $key => $cate)
                           
                            <div class="panel panel-default">
                                @if($cate->category_parent==0)
                                <div class="panel-heading">
                                    <h4 class="panel-title">
                                        <a data-toggle="collapse" data-parent="#accordian" href="#{{$cate->slug_category_product}}">
                                        <span class="badge pull-right"></span>
                                        {{$cate->category_name}}
                                        </a>
                                    </h4>
                                </div>
                                <div id="{{$cate->slug_category_product}}" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul>
                                            @foreach($category as $key =>$cate_sub)
                                                @if($cate_sub->category_parent==$cate->category_id)
                                                    <li style="margin-top: 5px"><a href="{{URL::to('/danh-muc/'.$cate_sub->slug_category_product)}}">{{$cate_sub->category_name}}</a>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                                @endif
                            </div>
                        @endforeach
                        </div><!--/category-products-->
                    
                        <div class="brands_products"><!--brands_products-->
                            <h2>Thương hiệu sản phẩm</h2>
                            <div class="brands-name">
                                <ul class="nav nav-pills nav-stacked">
                                    @foreach($brand as $key => $brand)
                                    <li ><a href="{{URL::to('/thuong-hieu/'.$brand->brand_slug)}}"> <span class="pull-right"></span>{{$brand->brand_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div><!--/brands_products-->

                         <div class="brands_products "><!--brands_products-->
                           
                             @yield('view')
                        </div><!--/brands_products-->
                        
                     <div class="brands_products "><!--brands_products-->
                            
                            @yield('wishlist')
                        </div><!--/brands_products-->
                    
                    </div>
                </div>
                
                <div class="col-sm-9 padding-right">

                   @yield('content')
                    
                </div>
                    
                        

            
            <div class="col-md-12">
                @yield('dota')
            </div>
        </div>

    </section>
   
    

    <a href="#link1" class="yBox"> Test</a>


    <footer id="footer"><!--Footer-->
        <div class="footer-top">

            <div class="container">
                <div class="row">
                    @foreach($contact_footer as $key => $logo)
                    <div class="col-sm-2">
                        <div class="companyinfo">
                          <p><img src="{{url::to('public/uploads/contact/'.$logo->info_image)}}" height="120" width="120"></p>
                            
                        </div>
                    </div>
                        @endforeach

                        @foreach($contact_footer as $key => $contact_foo)
                       <div class="col-sm-10" style="margin-top: 10px;">
                        <div class="single-widget">
                            <h2>THÔNG TIN ĐỊA CHỈ SHOP</h2>
                            <div class="information_footer">
                                {!!$contact_foo->info_contact!!}
                           
                            </div>
                        </div>                  
                    </div>
                    @endforeach                                 
                </div>
            </div>
        </div>
        
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Giới thiệu</h2>
                            <div class="introduction">
                                @foreach($edit_introductions as $key => $introduct)
                                    {!!$introduct->introduction_desc!!}
                                @endforeach
                           
                            </div>
                        </div>
                    </div>
                   
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Dịch vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                @foreach($PostFooters as $key => $postfoo)
                                <li><a href="{{url('/bai-viet-chan-trang/'.$postfoo->post_footer_slug)}}">{{$postfoo->post_footer_title}}</a></li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @foreach($contact_footer as $key => $contact_foo)
                    <div class="col-sm-4">
                        <div class="single-widget">
                            <h2>Fanpage</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li>{!!$contact_foo->info_fanpage!!}</li>
                               
                            </ul>
                        </div>
                    </div>
                    @endforeach
                    
                   
                    
                </div>
            </div>
        </div>
        
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">Copyright © 2011 TekTop.vn</p>
                   
                </div>
            </div>
        </div>
        
    </footer><!--/Footer-->
    <script src="{{asset('public/frontend/js/jquery.js')}}"></script>
    <script src="{{asset('public/frontend/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/price-range.js')}}"></script>
    <script src="{{asset('public/frontend/js/jquery.prettyPhoto.js')}}"></script>
    <script src="{{asset('public/frontend/js/main.js')}}"></script>
    <script src="{{asset('public/frontend/js/sweetalert.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/lightgallery-all.min.js')}}"></script>
    <script src="{{asset('public/frontend/js/lightslider.js')}}"></script>
    <script src="{{asset('public/frontend/js/prettify.js')}}"></script>
    <script src="{{asset('public/frontend/js/yBox.min.js')}}"></script>
    <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <script src="{{asset('public/backend/js/simple.money.format.js')}}"></script>
    <script src="{{asset('public/frontend/js/owl.carousel.js')}}"></script>

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v12.0&appId=179595526155717&autoLogAppEvents=1" nonce="4yzBOeDH"></script>


  
   

   <script type="text/javascript">
        function remove_background(product_id)
        {
        for(var count = 1; count <= 5; count++)
        {
        $('#'+product_id+'-'+count).css('color', '#ccc');
        }
    }
    //hover chuột đánh giá sao
   $(document).on('mouseenter', '.rating', function(){
      var index = $(this).data("index");
      var product_id = $(this).data('product_id');
    
      remove_background(product_id);
      for(var count = 1; count<=index; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ffcc00');
      }
    });
   //nhả chuột ko đánh giá
   $(document).on('mouseleave', '.rating', function(){
      var index = $(this).data("index");
      var product_id = $(this).data('product_id');
      var rating = $(this).data("rating");
      remove_background(product_id);
     
      for(var count = 1; count<=rating; count++)
      {
       $('#'+product_id+'-'+count).css('color', '#ffcc00');
      }
     });

    //click đánh giá sao
    $('.rating').on('click',  function(){
          var rating = $(this).data("index");
         
          $('#rating_value').val(rating);
          console.log(rating)




          var product_id = $(this).data('product_id');
            var _token = $('input[name="_token"]').val();
          $.ajax({
           url:"{{url('insert-rating')}}",
           method:"POST",
           data:{index:index, product_id:product_id,_token:_token},
           success:function(data)
           {
            if(data == 'done')
            {
             alert("Bạn đã đánh giá "+index +" trên 5");
            }
            else
            {
             alert("Lỗi đánh giá");
            }
           }
    });
          
          
    });
</script>
     <script type="text/javascript">
        function Huydonhang(id){
            var order_code = id;
            var lydo = $('.lydohuydon').val();
            
            var _token = $('input[name="_token"]').val();
            // alert(order_code);
            // alert(lydo);
            // alert(order_status);
             $.ajax({
                    url:"{{url('/huy-don-hang')}}",
                    method:"POST",
                    data:{order_code:order_code, lydo:lydo, _token:_token},
                    success:function(data){
                            alert('Đơn hàng hủy thành công');
                            location.reload();
                        }   
                });
        }
     </script>

    <script type="text/javascript">
                // When the user scrolls the page, execute myFunction
        window.onscroll = function() {
            sticky_navbar()
        };

        // Get the navbar
        var navbar = document.getElementById("navbar");

        // Get the offset position of the navbar
        var sticky = navbar.offsetTop;

        // Add the sticky class to the navbar when you reach its scroll position. Remove "sticky" when you leave the scroll position
        function sticky_navbar() {
          if (window.pageYOffset >= sticky) {
            navbar.classList.add("sticky")
          } else {
            navbar.classList.remove("sticky");
          }
        }
    </script>
    <script type="text/javascript">
        $('.owl-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav:true,
            dots:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:3
                },
                1000:{
                    items:5
                }
            }
        })
    </script>

    

    <script type="text/javascript">
          
    function delete_compare(id){
       // console.log('this is my ID: '+id)
       
      
             if(localStorage.getItem('compare')!=null){

                 var data = JSON.parse(localStorage.getItem('compare'));

                 var index = data.findIndex(item => item.id === id);

                 data.splice(index, 1);

                localStorage.setItem('compare', JSON.stringify(data)); 
                //remove element by id
                // if(document.getElementById("row_compare"+id)){
                    
                    var ele_id = "row_compare"+id;
                    var element =  document.getElementById(ele_id)
                    element.remove();
                // }
              
               
        }
       // console.log(document.getElementById("row_compare"))
    }
   sosanh();

    function sosanh(){
            

         if(localStorage.getItem('compare')!=null){

             var data = JSON.parse(localStorage.getItem('compare'));

             console.log('my data : '+data)
             //data is empty :) 
             for(i=0;i<data.length;i++){

                var name = data[i].name;
                var price = data[i].price;
                var image = data[i].image;
                var url = data[i].url;
                var id = data[i].id;
                 $('#row_compare').find('tbody').append('<tr id="row_compare'+id+'"> <td>'+name+`</td>
                                                            <td>`+price+`</td>
                                                            <td><img width="200px" src="`+image+`"></td>
                                                            <td></td>
                                                            <td><a class ="btn btn-default add-to-cart" href="`+url+`">Xem sản phẩm</a></td>
                                                            <td><a class ="btn btn-default add-to-cart" style="cursor:pointer" onclick="delete_compare(`+id+`)">Xóa so sánh</a></td>
                                                          </tr>


                `);
            }

         }

    }
   
   
    function add_compare(product_id){
        
        document.getElementById('title-compare').innerText = 'So sánh sản phẩm';

        var id = product_id;

        var name = document.getElementById('wishlist_productname'+id).value;
        // var content = document.getElementById('wishlist_productcontent'+id).value;
        var price = document.getElementById('wishlist_productprice'+id).value;
        var image = document.getElementById('wishlist_productimage'+id).src;
        var url = document.getElementById('wishlist_producturl'+id).href;

        var newItem = {
            'url':url,
            'id' :id,
            'name': name,
            'price': price,
            'image': image
            // 'content':content
        }

        if(localStorage.getItem('compare')==null){
           localStorage.setItem('compare', '[]');
        }

        var old_data = JSON.parse(localStorage.getItem('compare'));

        var matches = $.grep(old_data, function(obj){
            return obj.id == id;
        })

        if(matches.length){
            
        }else{
            if(old_data.length<=3){

                old_data.push(newItem);
                //append to table body but the id: still row_compare
              

                $('#row_compare').find('tbody').append(`  <tr id="row_compare`+id+`">
                                                            <td>`+newItem.name+`</td>
                                                            <td>`+newItem.price+`</td>
                                                            <td><img width="200px" src="`+newItem.image+`"></td>
                                                            <td></td>
                                                            <td><a class ="btn btn-default add-to-cart" href="`+url+`">Xem chi tiết</a></td>
                                                            <td><a class ="btn btn-default add-to-cart" style="cursor:pointer" onclick="delete_compare(`+id+`)">Xóa so sánh</a></td>
                                                        </tr>

                `);
            }


        }
       
        localStorage.setItem('compare', JSON.stringify(old_data));
        $('#sosanh').modal();


    }
</script>

     <script type="text/javascript">


        $('.stars').on('click',function(){
           // console.log($(this).val())
           // console.log($("input[name=stars]").val())
           $('#rating_value').val($(this).val())
        })

        $(document).ready(function(){
           $( "#slider-range" ).slider({
                orientation: "horizontal",
                range: true,
                min:{{$min_price_range}},
                max:{{$max_price_range}},
                values: [ {{$min_price}}, {{$max_price}} ],
                slide: function( event, ui ) {
                $( "#amount_start" ).val( ui.values[ 0 ]+ '  -').simpleMoneyFormat();
                $( "#amount_end" ).val( ui.values[ 1 ]).simpleMoneyFormat();
               

                $( "#start_price" ).val(ui.values[ 0 ]);
                $( "#end_price" ).val(ui.values[ 1 ]);
            }
        });
                $( "#amount_start" ).val( $( "#slider-range" ).slider( "values", 0 ) + '  -').simpleMoneyFormat();
                 $( "#amount_end" ).val( $( "#slider-range" ).slider( "values", 1 )).simpleMoneyFormat();
        });    
    </script>

    <script type="text/javascript">
        $(document).ready(function(){

            $('#sort').on('change',function(){

                var url = $(this).val(); 
                // alert(url);
                  if (url) { 
                      window.location = url;
                  }
                return false;
            });

        }); 
    </script>

     <script type="text/javascript">
        
        function removeItemsViewed(itemID) {
            var listData = localStorage.getItem('viewed');
            listData = JSON.parse(listData);
            for (let i = 0; i < listData.length; i++) {
                if(parseInt(listData[i].id) === itemID) {
                    listData.splice(i, 1);
                    localStorage.setItem('viewed', JSON.stringify(listData));

                }
            }
            window.location.reload();
        }
    </script>

    <script type="text/javascript">
  
    function viewed(){
        
         $('#row_viewed').html("");
         if(localStorage.getItem('viewed')!=null){

             var data = JSON.parse(localStorage.getItem('viewed'));


             data.reverse();

             document.getElementById('row_viewed').style.overflow = 'scroll';
             document.getElementById('row_viewed').style.height = '500px';
            
          
                
                $(data).map((index, element) => {
                      $('#row_viewed').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+element.image+'"style="margin-left: 15px;margin-top: 20px";></div><div class="col-md-8 info_wishlist"><p>'+element.name+'</p><p style="color:#FE980F">'+element.price+'</p><a class="btn btn-default add-to-cart" href="'+element.url+'">Chi tiết</a><a class="btn btn-default delete_viewed"  data-id="'+element.id+'" onclick="removeItemsViewed('+element.id+')" style="margin-left: 10px;" >Xóa</a></div>');
                });

            
        }

    }
    viewed();
    product_viewed();
    function product_viewed(){
        //khi vừa load trang
        var id_product = $('#product_viewed_id').val();
        if(id_product != undefined){
            var id = id_product;
            var name = document.getElementById('viewed_productname'+id).value;
            var url = document.getElementById('viewed_producturl'+id).value;
            var price = document.getElementById('viewed_productprice'+id).value;
            var image = document.getElementById('viewed_productimage'+id).value;



            var newItem = {
                'url':url,
                'id' :id,
                'name': name,
                'price': price,
                'image': image
            }

            if(localStorage.getItem('viewed')==null){
               localStorage.setItem('viewed', '[]');
            }

            var old_data = JSON.parse(localStorage.getItem('viewed'));

            var matches = $.grep(old_data, function(obj){
                return obj.id == id;
            })

            if(matches.length){
               

            }else{
                //khi kích vào sản phẩm
                old_data.push(newItem);
                //thực hiện nối div
               
               viewed();
            }
           //set local với old_data
            localStorage.setItem('viewed', JSON.stringify(old_data));
            let test = localStorage.getItem('viewed');
            
        }

     
        

       
   }
</script>
    
    
    <script type="text/javascript">
        $(document).on('click','.delete_wishlist',function(event){
            event.preventDefault(); // những hành động mặc định của sự kiện sẽ k xảy ra
            var id = $(this).data('id');
            if (localStorage.getItem('data') != null) {
                let data = localStorage.getItem('data');
                if (data){
                    data = JSON.parse(data);
                    for(let i = 0; i<data.length;i++){
                        if(data[i].id==id){
                            data.splice(i,1); // Xóa tại vị trí nào và xóa bao nhiêu phần tử
                            break;
                        }
                    }
                }
                localStorage.setItem('data',JSON.stringify(data));
                $('#row_wishlist').html('');
                view();
                window.location.reload();
            }
        });
    </script>
    
    <script type="text/javascript">
        function view(){
            if(localStorage.getItem('data')!=null){
                var data = JSON.parse(localStorage.getItem('data'));
                data.reverse();
                document.getElementById('row_wishlist').style.overflow = 'scroll';
                document.getElementById('row_wishlist').style.height = '500px';
                $(data).map((index, elem)=>{
                    let temp = `
                    <div class="row" style="margin:10px 0">
                        <div class="col-md-4">
                            <img width="100%" src="${elem.image}" style="margin-left: 15px;margin-top: 20px;">
                        </div>
                    <div class="col-md-8 info_wishlist">
                        <p>${elem.name}</p>
                        <p style="color:#FE980F">${elem.price}</p>
                        <a class="btn btn-default add-to-cart" href="${elem.url}">Chi tiết</a>
                        <a class="btn btn-default  delete_wishlist" data-id="${elem.id}"style="margin-left: 10px;">Xóa</a>
                    </div>`;
                    $('#row_wishlist').append(temp);
                });
                
            }
        } 
        view();

    function add_wistlist(clicked_id){
        var id = clicked_id;
        var name = document.getElementById('wishlist_productname'+id).value;
        var price = document.getElementById('wishlist_productprice'+id).value;
        var image = document.getElementById('wishlist_productimage'+id).src;
        var url = document.getElementById('wishlist_producturl'+id).href;
        var newItem = {
            'url':url,
            'id':id,
            'name': name,
            'price': price,
            'image': image
        }
        if(localStorage.getItem('data')==null){
            localStorage.setItem('data', '[]');
        }
            var old_data = JSON.parse(localStorage.getItem('data'));
            var matches = $.grep(old_data, function(obj){
            return obj.id == id;
        })
        if(matches.length){
            alert('Sản phẩm bạn đã yêu thích, nên không thể thêm');
        }else{
            old_data.push(newItem);
            $('#row_wishlist').append('<div class="row" style="margin:10px 0"><div class="col-md-4"><img width="100%" src="'+newItem.image+'"style="margin-left: 15px;margin-top: 20px";></div><div class="col-md-8 info_wishlist"><p>'+newItem.name+'</p><p style="color:#FE980F">'+newItem.price+'</p><a class="btn btn-default add-to-cart" href="'+newItem.url+'">Chi tiết</a><a class="btn btn-default delete_wishlist" data-id="'+newItem.id+'" style="margin-left: 10px;">Xóa</a></div>');
            }
        localStorage.setItem('data', JSON.stringify(old_data));
        }       
    </script>
    
    <script type="text/javascript">
    $(document).ready(function(){

            var cate_id = $('.tabs_pro').data('id');
            var _token = $('input[name="_token"]').val();
            //alert(cate_id);
            $.ajax({
                url:'{{url('/product-tabs')}}',
                method:"POST",
                data:{cate_id:cate_id,_token:_token},
                success:function(data){
                    $('#tabs_product').html(data);
                   
                }

            }); 
            
        $('.tabs_pro').click(function(){

            var cate_id = $(this).data('id');
            // alert(cate_id);
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{url('/product-tabs')}}',
                method:"POST",  
                data:{cate_id:cate_id,_token:_token},

                success:function(data){
                    $('#tabs_product').html(data);
                }

            }); 

        });
       
      
         
    });
</script>

</script>
   <script type="text/javascript">
        $(document).ready(function(){
            load_comment();

        function load_comment(){
            var product_id = $('.comment_product_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
              url:"{{url('/load-comment')}}",
              method:"POST",
              data:{product_id:product_id, _token:_token},
              success:function(data){
              
                $('#comment_show').html(data);
              }
            });
        }




        $('#send_comment').on('submit',function(e){
            e.preventDefault()
            
             $.ajax({
              url:"{{url('/send-comment')}}",
              method:"POST",
               headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },  
              data:$(this).serialize(),
              success:function(data){ 
                
                $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                load_comment();
                $('#notify_comment').fadeOut(5000);
                $('.comment_name').val('');
                $('.comment_content').val('');
              }
            });
        })




        $('.send-comment').click(function(){
            var product_id = $('.comment_product_id').val();
            var comment_name = $('.comment_name').val();
            var comment_content = $('.comment_content').val();
            var _token = $('input[name="_token"]').val();
            var rating = $('#rating_id').val();
             $.ajax({
              url:"{{url('/send-comment')}}",
              method:"POST",
              data:{product_id:product_id,comment_name:comment_name,comment_content:comment_content,_token:_token,rating_id:rating},
              success:function(data){ 
                
                $('#notify_comment').html('<span class="text text-success">Thêm bình luận thành công, bình luận đang chờ duyệt</span>');
                load_comment();
                $('#notify_comment').fadeOut(5000);
                $('.comment_name').val('');
                $('.comment_content').val('');
              }
            });
        }) 
    });
        
    </script>
    <script type="text/javascript">
         $('#keywords').keyup(function(){
        var query = $(this).val();
        
          if(query != '')
            {
             var _token = $('input[name="_token"]').val();

             $.ajax({
              url:"{{url('/autocomplete-ajax')}}",
              method:"POST",
              data:{query:query, _token:_token},
              success:function(data){
               $('#search_ajax').fadeIn();  
                $('#search_ajax').html(data);
              }
             });

            }else{

                $('#search_ajax').fadeOut();  
            }
    });

    $(document).on('click', '.li_search_ajax', function(){  
        $('#keywords').val($(this).text());  
        $('#search_ajax').fadeOut();  
    }); 
    </script>
      
    <script type="text/javascript">
        $(document).ready(function() {
            $('#imageGallery').lightSlider({
                gallery:true,
                item:1,
                loop:true,
                thumbItem:3,
                slideMargin:0,
                enableDrag: false,
                currentPagerPosition:'left',
                onSliderLoad: function(el) {
                    el.lightGallery({
                        selector: '#imageGallery .lslide'
                    });
                }   
            });  
        });
    </script>

    <script type="text/javascript">
        $(document).on('click','.watch-video',function(){
            var video_id = $(this).attr('id');
            var _token = $('input[name="_token"]').val();
            $.ajax({
                url:'{{url('/watch-video')}}',
                method:"POST",
                dataType:"JSON",
                data:{video_id:video_id,_token:_token},
                success:function(data){
                    $('#video_title').html(data.video_title);
                    $('#video_link').html(data.video_link);
                    console.log(data)
                    
                }
            });
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function(){
            $('.send_order').click(function(){
               swal({
                  title: "Xác nhận đơn hàng",
                  text: "Đơn hàng sẽ không được hoàn trả khi đặt, bạn muốn đặt hàng chứ ?",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  confirmButtonText: "Đặt hàng !",
                  cancelButtonText: "Huỷ đơn hàng!",
                  closeOnConfirm: false,
                  closeOnCancel: false
                },
                function(isConfirm){

                    if (isConfirm) {
                     var shipping_name = $('.shipping_name').val();
                     var shipping_address = $('.shipping_address').val();
                     var shipping_email = $('.shipping_email').val();
                     var shipping_phone = $('.shipping_phone').val();
                     var shipping_notes = $('.shipping_notes').val();
                     var shipping_method = $('.payment_select').val();
                     var order_free = $('.order_free').val();
                     var order_coupon = $('.order_coupon').val();
                     var _token = $('input[name="_token"]').val(); 
                        console.log(13 + order_coupon);
                 $.ajax({
                     url: '{{url('/confirm-order')}}',
                     method: 'POST',
                     data:{shipping_name:shipping_name,shipping_address:shipping_address,shipping_email:shipping_email,shipping_phone:shipping_phone,shipping_notes:shipping_notes,order_free:order_free,order_coupon:order_coupon,shipping_method:shipping_method,_token:_token},
                     success:function(data){
                             swal("Đơn hàng", "Đơn hàng của bạn đã được đặt thành công", "success");

                     }

                });
                    window.setTimeout(function(){
                        window.location.href = "{{url('/history')}}";
                    },3000);
                  }else{
                    swal("Đóng", "Đơn hàng của bạn được gửi chưa thành công, làm ơn hoàn tất đơn hàng", "error");
                  }
                  
                });
                 
              
            });
        });
    </script>

    <script type="text/javascript">


       
         show_cart();
 
            // show cart quantity
            function show_cart(){
                $.ajax({
                    url:'{{url('/show-cart')}}',
                    method:"GET",
                    
                    success:function(data){
                        $('.show-cart').html(data);
                       
                    }

                }); 
            }

           
        $(document).ready(function(){
            
            $('.add-to-cart').click(function(){
                var id =$(this).data('id_product');
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('Số lượng sản phẩm phải lớn hơn ' + cart_product_quantity);
                }else{
                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(data){
                                swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/gio-hang')}}";
                                });
                            show_cart();

                        }

                    });
                }
              
        });

    });
    </script>
    <script type="text/javascript">
        function Addtocart($product_id){
            var id = $product_id;
                var cart_product_id = $('.cart_product_id_' + id).val();
                var cart_product_name = $('.cart_product_name_' + id).val();
                var cart_product_image = $('.cart_product_image_' + id).val();
                var cart_product_quantity = $('.cart_product_quantity_' + id).val();
                var cart_product_price = $('.cart_product_price_' + id).val();
                var cart_product_qty = $('.cart_product_qty_' + id).val();
                var _token = $('input[name="_token"]').val();
                if(parseInt(cart_product_qty)>parseInt(cart_product_quantity)){
                    alert('Số lượng sản phẩm phải lớn hơn ' + cart_product_quantity);
                }else{
                    $.ajax({
                        url: '{{url('/add-cart-ajax')}}',
                        method: 'POST',
                        data:{cart_product_id:cart_product_id,cart_product_name:cart_product_name,cart_product_image:cart_product_image,cart_product_price:cart_product_price,cart_product_qty:cart_product_qty,_token:_token,cart_product_quantity:cart_product_quantity},
                        success:function(data){
                                swal({
                                    title: "Đã thêm sản phẩm vào giỏ hàng",
                                    text: "Bạn có thể mua hàng tiếp hoặc tới giỏ hàng để tiến hành thanh toán",
                                    showCancelButton: true,
                                    cancelButtonText: "Xem tiếp",
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Đi đến giỏ hàng",
                                    closeOnConfirm: false
                                },
                                function() {
                                    window.location.href = "{{url('/gio-hang')}}";
                                });
                                show_cart();


                        }

                    });
                }
        }
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $('.choose').on('change',function(){
            var action = $(this).attr('id');
            var ma_id = $(this).val();
            var _token = $('input[name="_token"]').val();
            var result = '';
           
            if(action=='city'){
                result = 'province';
            }else{
                result = 'wards';
            }
            $.ajax({
                url : '{{url('/select-delivery-home')}}',
                method: 'POST',
                data:{action:action,ma_id:ma_id,_token:_token},
                success:function(data){
                   $('#'+result).html(data);     
                }
            });
        });
    });
    </script>
    <script type="text/javascript">
          $(document).ready(function(){
            $('.calculate_delivery').click(function(){
                var matp = $('.city').val();
                var maqh = $('.province').val();
                var xaid = $('.wards').val();
                var _token = $('input[name="_token"]').val();
                if(matp == '' && maqh == '' && xaid == ''){
                    alert('Làm ơn chọn tính phí vận chuyển');
                }else{
                    $.ajax({
                    url : '{{url('/calculate-free')}}',
                    method: 'POST',
                    data:{matp:matp,maqh:maqh,xaid:xaid,_token:_token},
                    success:function(){
                        location.reload();
                    }        
                });
            }
        });
    });
    </script>
    <script>
        //remove product
        $('.remove_prod').on('click',function(){
            var id = $(this).attr('id');
            $('.add_order_id').attr('id',id)
            
        })
    </script>


   {{--  <!-- Messenger Plugin chat Code -->
    <div id="fb-root"></div>

    <!-- Your Plugin chat code -->
    <div id="fb-customer-chat" class="fb-customerchat">
    </div>

    <script>
      var chatbox = document.getElementById('fb-customer-chat');
      chatbox.setAttribute("page_id", "108053407331800");
      chatbox.setAttribute("attribution", "biz_inbox");
    </script>

    <!-- Your SDK code -->
    <script>
      window.fbAsyncInit = function() {
        FB.init({
          xfbml            : true,
          version          : 'v12.0'
        });
      };

      (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
    </script> --}}
</body>
</html>