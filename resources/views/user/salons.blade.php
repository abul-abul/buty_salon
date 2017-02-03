@extends('app-user')
@section('user-content')
@section('style')
{!! HTML::style( asset('assets/user/plugins/star/jquery.rating.css')) !!}
<div class="container content profile">      
    @include('user.header')
    <div class="container content profile">
    	<div class="row">
            <div class="col-md-3 md-margin-bottom-40">
                @include('user.navigation')
            </div>
            <div class="col-md-8">
                @if(!empty($data['salon']))
                <h3>Salons by Address</h3>
                @else
                <h3>No Salons by Address</h3>
                @endif                
                @foreach($data['salon'] as $salon)      
                    <div class="col-md-4 md-margin-bottom-40" style="margin-top:5px;" >
                        <div class="funny-boxes funny-boxes-colored funny-boxes-grey" >
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <h2><a href="{{action('UsersController@getSalonServiceCategory',$salon->id)}}">{{$salon->name}}</a></h2>
                                        <ul class="list-unstyled">
                                           <li><i class="fa-fw fa fa-map-marker"></i>{{$salon->address1}}</li>
                                        </ul>
                                        <ul class="list-unstyled funny-boxes-rating">
                                            @for($j = 1;$j <= $data['salon_rayting'][$i];$j++)
                                                <li><i data class="fa fa-star"></i></li>                                
                                            @endfor
                                            @for($j = 1; $j<= 5 - $data['salon_rayting'][$i];$j++)
                                                <li><i class="fa fa-star-o"></i></li>                                
                                            @endfor   
                                            <?php $i++;?>
                                        </ul>
                                    </center>
                                </div>
                            </div>                            
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="col-md-3 md-margin-bottom-40"></div>
            <div class="col-md-8">
                @if(!empty($data1['salon']))
                <h3>Other salons</h3>
                @else
                <h3>No Other salons</h3>
                @endif
                 @foreach($data1['salon'] as $other_salon)
                    <div class="col-md-4 md-margin-bottom-40" style="margin-top:5px;" >
                        <div class="funny-boxes funny-boxes-colored funny-boxes-grey" >
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <h2><a href="{{action('UsersController@getSalonServiceCategory',$other_salon->id)}}">{{$other_salon->name}}</a></h2>
                                        <ul class="list-unstyled">
                                           <li><i class="fa-fw fa fa-map-marker"></i>{{$other_salon->address1}}</li>
                                        </ul>
                                        <ul class="list-unstyled funny-boxes-rating">
                                            @for($k = 1;$k <= $data1['salon_rayting'][$u];$k++)
                                                <li><i data class="fa fa-star"></i></li>                                
                                            @endfor
                                            @for($k = 1; $k<= 5 - $data1['salon_rayting'][$u];$k++)
                                                <li><i class="fa fa-star-o"></i></li>                                
                                            @endfor   
                                            <?php $u++;?>
                                        </ul>
                                    </center>
                                </div>
                            </div>                            
                        </div>
                    </div>
                @endforeach
            </div>      
        </div>
    </div> 
</div>
@endsection

@section('scripts')
{!! HTML::script( asset('assets/user/plugins/star/jquery.rating.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.form.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.MetaData.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.rating.pack.js') ) !!}
{!! HTML::style( asset('assets/user/css/main.css')) !!} 
@endsection



               