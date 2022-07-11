@extends('layout')
@section('content')
 <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">{{$meta_title}}</h2>
                     
                          
                            <div class="product-image-wrapper">
                               @foreach($post_by_id as $key => $p)
                                <div class="single-products" style=" margin: 10px 0; padding: 2px;">
                                        <div class="text-center">
         
                                                <img style="float: left;width: 30%;padding: 5px;height: 150px;" src="{{asset('public/uploads/post/'.$p->post_image)}}" alt="{{$p->post_slug}}" />
                                               
                                                <h4 style="color: #000;padding: 5px;text-align: left;">{{$p->post_title}}</h4>
                                               </div>
                                                <p>{!!$p->post_desc!!}</p>
                                             
                                        <div class="text-right">
                                        <a href="{{url('/bai-viet/'.$p->post_slug)}}" class="btn btn-default btn-sm">Xem chi tiết</a>
                                      </div>
                                </div>
                           <div class="clearfix"></div>
                                @endforeach
                            </div>
                            
                        </div>
                        
                    <!--features_items-->
                     <center><ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$post_by_id->links()!!}
                      </ul></center>
                    <!--/recommended_items-->
                    @endsection