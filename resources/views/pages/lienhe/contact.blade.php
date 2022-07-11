@extends('layout')
@section('content')
 <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Liên hệ với chúng tôi</h2>
                       <div class="row">
                        @foreach($contact as $key => $cont)
                       		<div class="col-md-12">
                            <h4>Bản đồ</h4>
                            {!!$cont->info_map!!}
                            </div>

                            <div class="col-md-6">
                                <h4>Thông tin liên hệ:</h4>
                              <div class="contact">
                                {!!$cont->info_contact!!}
                              </div>
                              </div>

                            <div class="col-md-4 " style="margin-left: 140px">
                       			<h4>Fanpage:</h4>
                            <div class="Fanpage">
                            {!!$cont->info_fanpage!!}
                          </div>
                       	</div>


                           		
                       
                       @endforeach
                        
                    <!--features_items-->
                     {{-- <center><ul class="pagination pagination-sm m-t-none m-b-none">
                       {!!$all_product->links()!!}
                      </ul></center> --}}
                    <!--/recommended_items-->
                    @endsection