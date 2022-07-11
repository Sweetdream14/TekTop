@extends('layout')
@section('content')
 <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">{{$meta_title}}</h2>
                     
                          
                            <div class="product-image-wrapper">

                               @foreach($post_by_id as $key => $p)
                                <div class="single-products" style=" margin: 10px 0; padding: 2px;">
                                      {!!$p->post_content!!}
                                       
                                </div>
                                @endforeach
                           <div class="clearfix"></div>
                            </div>
                            
                        </div><!--features_items-->
                        <h2 class="title text-center">Bài viết liên quan</h2>
                        <style type="text/css">
                          ul.post_related li {
                            list-style-type: disc;
                            padding: 5px;
                            margin-left: -22px;
                          }
                          ul.post_related li a {
                            color: #000;
                          }
                          ul.post_related li a:hover{
                            color:#FE980F;
                          }
                        </style>
                      <ul class="post_related">
                        @foreach($related as $key => $post_related)
                        <li><a href="{{url('/bai-viet/'.$post_related->post_slug)}}">{{$post_related->post_title}}</a></li>
                        @endforeach
                      </ul>
                   
                    @endsection