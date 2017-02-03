@foreach($salons['salon'] as $key=>$salon)

    <div class="row-item">
        <div class="inner">
            <div class="row">
                <div class="col-lg-4 col-md-5 col-sm-5">
                    <div class="picture">
                        <div class="image-slider">
                            <a href="{{action('UsersController@getSalonServiceCategory',$salon->id)}}" class="slide">
                                @if($salon->image == null)
                                    <img src="/assets/user/images/img1-md.jpg" style="height:191px" alt=""/>
                                @else
                                    <img style="height:191px" src="/assets/salon_images/{{$salon->image}}">
                                @endif 
                            </a>
                            <div class="cycle-pager"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-md-7 col-sm-7">
                    <div class="content-inner offers_salon"  data-id="{{$salon->id}}">
                        <h3>
                            <a href="{{action('UsersController@getSalonServiceCategory',$salon->id)}}">{{$salon->name}}</a>
                        </h3>
                  {{--       <div class="subtitle">DPF Active</div> 
                        <div class="price">$16,999</div>   --}}
                        <div class="description">
                        <p>{{$salon->description}}</p>
                        </div><!-- /.description -->     
                    </div>
                </div>
            </div>
        </div>
    </div>
@endforeach

@if(count($salons['salon']) < 4)
@else
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <br><br>
                <button style="display:none" class="btn btn-info btn-md loading_button_a1"><i class="fa fa-spinner fa-spin"></i>{{trans('common.loading')}}</button>
                <button class="btn btn-info show_more_salon1">{{trans('common.show_more')}}</button>
            </div>
        </div>
    </div>
@endif