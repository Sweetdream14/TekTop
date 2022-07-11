
<h2 class="doitac">Đối tác của chúng tôi</h2> 
                             
                            <div class="owl-carousel owl-theme">
                            @foreach($doitac as $key => $dota)
                            
                             

                                <div class="item" style="padding-left:0 !important;">
                                    <a target="_blank" href="{{$dota->link_doitac}}"><p><img width="100%" src="{{asset('public/uploads/icons/'.$dota->image_doitac)}}"></p></a>
                                    <h4 class="doitac_name">{{$dota->name_doitac}}</h4>

                                </div>


                            @endforeach
                            </div>   
                            