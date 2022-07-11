@extends('layout')
@section('content')
 <div class="features_items"><!--features_items-->
                    
                        <h2 class="title text-center">{{$meta_title}}</h2>
                      
                          
                            <div class="product-image-wrapper">

                               @foreach($PostFooter_by_id as $key => $postfoot)
                                <div class="single-products" style=" margin: 10px 0; padding: 2px;">
                                      {!!$postfoot->post_footer_content!!}
                                       
                                </div>
                                @endforeach
                           
                            </div>
                            
                        </div><!--features_items-->
                        
                     
                   
                    @endsection