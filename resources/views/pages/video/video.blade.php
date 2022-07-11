@extends('layout')
@section('content')
 <div class="features_items"><!--features_items-->
                        <h2 class="title text-center"></h2>
                        @foreach($all_video as $key => $video)
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                             <style type="text/css">
                            .single-products.single-products-video {
                                height: 480px;
                            }
                             </style>
                             <form>
                                @csrf
                                <div class="single-products single-products-video">
                                        <div class="productinfo text-center">
                                           <form>
                                                @csrf
                                           

                                            <a href="">
                                                <img src="{{asset('public/uploads/videos/'.$video->video_image)}}" alt="{{$video->video_title}}" />
                                                <h2>{{$video->video_title}}</h2>
                                                <p>{{$video->video_desc}}</p>

                                             
                                             </a>
                                           <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-primary watch-video" data-toggle="modal" data-target="#modal_video" id="{{$video->video_id}}">
                                              Xem video
                                            </button>
                                            </form>
                                        </div>
                                      
                                </div>
                           </form>
                            </div>
                        </div>
                        @endforeach
                    </div><!--features_items-->
                     <center><ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$all_video->links()!!}
                      </ul></center>
                    <!--/recommended_items-->

                    <!-- Modal xem video -->
                    <div class="modal fade" id="modal_video" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content" style="margin-top: 110px;">
                          <div class="modal-header">
                            <h5 class="modal-title" id="video_title"> </h5>
                           
                          </div>
                          <div class="modal-body">
                            
                            <div id="video_link">
                                
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng video</button>
                           
                          </div>
                        </div>
                      </div>
                    </div>
                    @endsection