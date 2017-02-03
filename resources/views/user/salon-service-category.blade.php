@extends('app-user')

@section('style')
      
{!! HTML::style( asset('assets/user/plugins/star/jquery.rating.css')) !!}
@endsection

@section('user-content')


<div class="infobar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{action('UsersController@getHome')}}">{{trans('common.home')}}</a></li>
                    <li class="active">{{$salon->name}}</li>
                </ol>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container --> 
</div><!-- /.infobar -->  
<div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <div class="title">
                            <h1>{{$salon->name}}</h1>
                            <div>
                                <div class="salon_stra_block">
                                    @for($j = 1;$j <= $raiting;$j++)
                                        <i class="glyphicon glyphicon-star"></i>
                                    @endfor
                                    @for($j = 1; $j<= 5 - $raiting;$j++)
                                        <i class="glyphicon glyphicon-star-empty"></i>
                                    @endfor   
                                    <?php $j++;?> &nbsp;&nbsp;
                                    <span class="scroll_review_a" style="font-size:20px;color:red;cursor: pointer;">{{trans('common.reviews')}}
                                   (<span class="review_count">{{$count_salon_reviews}}</span>)</span>
                                </div>
                            </div>
                        </div><!-- /.title -->
                    </div><!-- /.heading -->
                </div><!-- /.col-md-8 -->
            </div><!-- /.row -->
        </div><!-- /.container -->


    <div class="section gray-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="main">
                        <div class="car car-detail">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="gallery-wrapper">
                                                <div class="gallery">
                                                    <div class="slide active">
                                                        <div class="picture-wrapper">
                                                            @if($salon->image != null)
                                                            <img src="/assets/salon_images/{{$salon->image}}" style="width:555px;height:370px;" alt="#">
                                                            @else
                                                            <img src="/assets/salon_images/img1-md.jpg" style="width:555px;height:370px;" alt="#">
                                                            @endif
                                                        </div>
                                                    </div>
                                                    @if(count($salonImages) != 0)
                                                        @foreach($salonImages as $salonImage) 
                                                        <div class="slide">
                                                            <div class="picture-wrapper">
                                                                <img src="/assets/salon_images/salon-images/{{$salonImage->image_name}}" style="width:555px;height:370px;" alt="#">
                                                           </div>
                                                        </div>
                                                        @endforeach
                                                    @endif

                                                </div><!-- /.gallery -->

                                                <div id="gallery-pager" class="white block-shadow">
                                                    <div class="prev">
                                                        <i class="icon-normal-left-arrow-small"></i>
                                                    </div>

                                                    <div class="pager">
                                                    </div>

                                                    <div class="next">
                                                        <i class="icon-normal-right-arrow-small"></i>
                                                    </div>
                                                </div><!-- /#gallery-pager -->


                                                <div class="gallery-thumbnails">
                                                    <div class='thumbnail-0'>
                                                        @if($salon->image != null)
                                                        <img src="/assets/salon_images/{{$salon->image}}" alt="#">
                                                        @endif
                                                    </div>
                                                    @if(count($salonImages) != 0)
                                                    @foreach($salonImages as $salonImage)
                                                        <div class='thumbnail-{{$i}}'>
                                                            <img style="width: 80px; height: 50px" src="/assets/salon_images/salon-images/{{$salonImage->image_name}}" alt="#">
                                                        </div>
                                                    <?php $i++;?>
                                                    @endforeach
                                                    @endif
                                                </div>
                                            </div> <!-- /#gallery-wrapper -->
                                        </div>
                                    </div>


                                </div>
                                <div class="col-md-6">
                                    <div style="position:absolute;width: 284px;top: -72px">
                                        @include('message')
                                    </div>
                                    <div class="overview">
                                        <div>
                                            <span style="font-weight: bold;font-size: 29px;">{{$salon->name}}</span>
                                            @if(Auth::user())
                                                @if(isset($subscripe))
                                                    <span style="" class="send btn btn-primary btn-primary-color unsubscripe sub_block1">
                                                        Subscribed
                                                        <div class="unsubscrip_block">
                                                            <a class="unsub_a" href="{{action('UsersController@getUserUnsubscribe',$salon->id)}}">
                                                                <span style="display: block; text-align: center;margin-top:12px">
                                                                    {{trans('common.unsubscribe')}}
                                                                </span>
                                                            </a>    
                                                        </div>  
                                                    </span>
                                                @else
                                                    <span data-toggle="modal" data-target="#sub__user_modal" style="margin-left:10%;margin-bottom: 2%;width: 50%;" class="send btn btn-primary btn-primary-color">
                                                        {{trans('common.subscribe_to_newsletter')}}   
                                                    </span>
                                                @endif    
                                            @else
                                            <span style="margin-left:10%;margin-bottom: 2%;;width: 50%;" data-toggle="modal" data-target="#sub_modal"  class="send btn btn-primary btn-primary-color">
                                                {{trans('common.subscribe_to_newsletter')}}
                                            </span>
                                            @endif
                                        </div>
                                       
                                        @if(Auth::user() && Auth::user()->role == 'user')
                                            @if(isset($rate))
                                                <div class="star_raiting_block" style="width:100%;height: 38px;">
                                                    <input type="hidden" content="{{ csrf_token() }}" class="salon_id" data-salon-id='{{$salon->id}}'>

                                                   <input type="hidden" value="1">

                                                   <input name="adv1" type="radio" data="1"  value="1" class="star salon_raiting {split:1}"/>
                                                   
                                                   <input type="hidden" value="2">

                                                   <input name="adv1" type="radio"  value="2" class="star salon_raiting {split:1}"/>
                                                   <input type="hidden" value="3">
                                                   <input name="adv1" type="radio"  value="3" class="star salon_raiting {split:1}"/>
                                                   <input type="hidden" value="4">
                                                   <input name="adv1" type="radio"  value="4" class="star salon_raiting {split:1}"/>
                                                   <input type="hidden" value="5">
                                                   <input name="adv1" type="radio"  value="5" class="star salon_raiting {split:1}" checked="checked"/>
                                                </div>
                                            @endif
                                        @endif

                                        <div id="tab-container" class="tab-container">

                                            <ul class='nav nav-tabs'>
                                                <li class='tab'><a href="#overview">{{trans('common.description')}}</a></li>
                                                <li class='tab'><a href="#description">{{trans('common.services')}}</a></li>
                                                <li class='tab' id="user_map"><a href="#video">{{trans('common.map')}}</a></li>
                                            </ul><!-- /.nav-tabs -->

                                            <div class="block white block-shadow">
                                                <div class="block-inner">
                                                    <div id="overview" class="active">
                                                        <div class="row">
                                                            <div class="col-sm-7 col-md-10">
                                                                <table class="table">
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="property"></td>
                                                                            @if ($locale == 'en')
                                                                              <td class="value">{{$salon->description_en}}</td>
                                                                            @endif
                                                                             @if ($locale == 'ru')
                                                                              <td class="value">{{$salon->description_ru}}</td>
                                                                            @endif
                                                                             @if ($locale == 'am')
                                                                              <td class="value">{{$salon->description_am}}</td>
                                                                            @endif
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="property">{{trans('common.address')}}</td>
                                                                            <td class="value">
                                                                              @foreach($salon->addresses as $address)
                                                                                <span>{{$address->address}}</span><br>
                                                                              @endforeach  
                                                                            </td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td class="property">{{trans('common.email')}}</td>
                                                                            <td class="value">{{$salon->salon_email}}</td>
                                                                        </tr>

                                                                        <tr>
                                                                            <td class="property">{{trans('common.phone')}}</td>
                                                                            <td class="value">{{$salon->phonenumber}}</td>
                                                                        </tr>


                                                                        <tr>
                                                                            <td class="property">{{trans('common.working_hurs')}}</td>
                                                                            <td class="value">{{$salon->workings_time_days}}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="property"><a href="#"><i class="glyphicon glyphicon-share-alt"></i>{{trans('common.visit_website')}}</a></td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>

                 
                                                    </div><!-- /#overview -->

                                                <div id="description">
                                                    <div class="row" style="height:161px;overflow: auto;">
                                                        <div class="col-sm-7 col-md-10">
                                                            <table class="table">
                                                                <tbody>
                                                                    @if(count($categories) == 0)
                                                                        {{trans('common.not_services')}}
                                                                    @else
                                                                    @foreach($categories as $category)
                                                                        <tr>
                                                                            <td class="property salon_category_services"  data-title="Edit" alt="{{ csrf_token () }}"  data-toggle="modal" data-target="#category_services" data-id="{{$category['id']}}"><b style="font-size: 18px;">{{$category['category_name']}}</b></td>
                                                                        </tr>
                                                                    @endforeach       
                                                                    @endif
                                                                </tbody>
                                                            </table>
                                                            <input type="hidden" id="tok"  data='{{ csrf_token() }}'>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div id="video">
                                                    <div class="row">
                                                        <div class="col-sm-7 col-md-10">
                                                            <div  class="block block-shadow white block-margin">
                                                                <div id="map_block_time" class="block-inner">
                                                                    <h1>Salon Addresses</h1>
                                                                       <input class="lat" type="hidden" data-lat="{{$salon->addresses}}">
                                                                       <input class="lng" type="hidden" data-lng="{{$address->lng}}">
                                                                    <div id="map"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>      
                                                </div>
                                            </div><!-- /.block-inner -->
                                            </div><!-- /.block -->
                                        </div><!-- /#tab-container -->
                                    </div><!-- ./overview -->                              
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="recent-cars" class="grid-block block">
                                <div class="page-header center">
                                    <div class="page-header-inner">
                                        <div class="line">
                                            <hr/>
                                        </div><!-- /.line -->

                                        <div class="heading">
                                            <h2>{{trans('common.our_staff')}}</h2>
                                        </div><!-- /.heading -->

                                        <div class="line">
                                            <hr/>
                                        </div><!-- /.line -->
                                    </div><!-- /.page-header-inner -->
                                </div><!-- /.page-header -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inner-block white">
                                            <div class="grid-carousel">  
                                            @foreach($salon_staff as $worker)
                                            @if(count($salon_staff) != 0)   
                                                <div class="inner">
                                                    <div class="grid-item">
                                                        <div class="inner">
                                                            <div class="picture">
                                                                <div class="image-slider">
                                                                    @if($worker->profile_picture)
                                                                        <img src="/assets/salon-worker/worker-images/{{$worker->profile_picture}}" style="width:262px;height:262px" alt="#">
                                                                    @else
                                                                        <img src="/assets/content/img/testimonials-1.png" style="width:262px;height:262px"  alt="#">
                                                                    @endif
                                                                    <div class="cycle-pager"></div><!-- /.cycle-pager -->
                                                                </div><!-- /.image-slider -->
                                                            </div><!-- /.picture -->
                                                            <h3>
                                                                <h2><center>
                                                                    <a href="{{action('UsersController@getWorkerProfile',[$worker->id])}}">{{$worker->firstname}} {{$worker->lastname}}</a>
                                                                </center></h2>
                                                                <h3><center>{{$worker->profession}}</center></h3>
                                                            </h3>
                                                        </div><!-- /.inner -->
                                                    </div><!-- /.grid-item -->      
                                                </div><!-- /.inner -->
                                            @else
                                            <div class="inner">
                                                <h2>{{trans('common.not_worker')}}</h2>
                                            </div>
                                            @endif   
                                            @endforeach 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if(count($salon_staff) != 0)   
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="grid-carousel-pager">
                                            <div class="prev"></div>
                                            <div class="next"></div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div><!-- /.grid-block -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section -->
</div>
<!-- /#content -->

<div class="article-page" id="review">
    <div class="section gray-light">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-9">
                    <div id="main">
                        <div class="row">
                     
                            <div class="col-sm-12 col-md-12">
                                <div class="page-header">
                                    <div class="page-header-inner">
                                        <div class="heading">
                                            <h2>{{trans('common.add_review')}}</h2>
                                        </div><!-- /.heading -->

                                        <div class="line">
                                            <hr>
                                        </div><!-- /.line -->
                                    </div><!-- /.page-header-inner -->
                                </div>
                            </div>
                        
                            <div class="row">
                                <div class="block textarea_review">
         
                                    {!! Form::open(['action' => ['UsersController@postSendReviewSalon',$salon->id], 'method' => 'POST', 'class'=> 'sky-form', 'role' => 'form', 'files' => 'true' ]) !!}
                                    <div class="textarea form-group col-sm-12 col-md-12">
                                        {!!  Form::textarea('message', '', array('class'=>'form-control mes','id'=>'review_text')) !!}
                                    </div>
                                    @if((Auth::user()) && (Auth::user()->role == 'user')) 
                                        <div class="form-group col-sm-3 col-md-3">
                                            <button content="{{ csrf_token() }}" data-salonid="{{$salon->id}}" id="add_review" class="btn btn-primary btn-block" type="button">{{trans('common.send_review')}}</button>
                                        </div>
                                    @else
                                        <div class="form-group col-sm-3 col-md-3">
                                            <button  class="btn btn-primary btn-block" data-toggle="modal" data-target="#logina">{{trans('common.send_review')}}</button>
                                        </div>
                                    @endif
                                    {!! Form::Close() !!}
                                </div>
                            </div>
                   
                        </div><!-- /.row -->
                        <div class="row">
                            @if(count($reviews) != 0)
                            <div class="col-md-12">
                                <div class="page-header">
                                    <div class="page-header-inner">
                                        <div class="heading">
                                            <h2>{{trans('common.reviews')}}</h2>
                                        </div><!-- /.heading -->

                                        <div class="line">
                                            <hr>
                                        </div><!-- /.line -->
                                    </div><!-- /.page-header-inner -->
                                </div><!-- /.page-header -->
                            </div>
                            @endif

                            <div class="col-md-12">
                                <div class="block comments clearfix">
                                    <div class="row">
                                        <div class="container rev">
                                            @foreach($reviews as $review)
                                            
                                            <div class="comment col-md-12 user_reviews"  data-id="{{$review['review']['id']}}" >
                                                <div class="block white block-shadow block-margin">
                                                    <div class="block-inner" style="width: 80%;">
                                                        <div class="row">
                                                            <div class="picture-wrapper col-sm-3 col-md-2">
                                                                <div class="picture" style="width: 89px;">
                                                                    @if($review['user']['profile_picture'])
                                                                        @if($review['user']['facebook_id'] == null && $review['user']['google_id']  == null)
                                                                        <img src="/assets/user/user_images/{{$review['user']['profile_picture']}}" class="img-circle" alt="#">
                                                                        @else
                                                                        <img src="{{$review['user']['profile_picture']}}" style="height: 79px;" class="img-circle" alt="#">
                                                                        @endif
                                                                    @else
                                                                        <img src="/assets/content/img/img.png" class="img-circle" alt="#">
                                                                    @endif
                                                                </div><!-- /.picture -->
                                                            </div><!-- /.picture-wrapper -->
                                                        
                                                            <div class="col-sm-9 col-md-10">
                                                                <div class="content-inner">
                                                                    <div class="block-title clearfix">
                                                                    @if($review['user']['username'] != '')
                                                                        <h3>{{$review['user']['username']}}</h3>
                                                                    @else
                                                                        <h3>{{$review['user']['firstname']}}</h3>
                                                                    @endif
                                                                    </div><!-- /.block-title -->

                                                                    <div class="meta">
                                                                        <ul class="clearfix">
                                                                            <li><i class="icon icon-normal-calendar-month"></i>{{$review['review']['created_at']}}</li>
                                                                        </ul>
                                                                    </div><!-- /.meta -->

                                                                    <div class="text">
                                                                        <p>{{$review['review']['message']}}</p>
                                                                        <textarea rows="5"  class="edit_review_text">{{$review['review']['message']}}</textarea>
                                                                           
                                                                        @if(Auth::id() == $review['user']->id)
                                                                            <i style="cursor:pointer"  class="glyphicon glyphicon-pencil edit_user_rew" ></i>
                                                                            <i content="{{ csrf_token() }}" data-id="{{$review['review']->id}}" class="glyphicon glyphicon-ok update_user_review"></i>
                                                                            <i  data-id="{{$review['review']->id}}" style="margin-left: 7px;cursor:pointer" class="glyphicon glyphicon-trash delete_review"></i>
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                                
                                                            </div>
                                                        </div><!-- /.row -->
                                                    </div><!-- /.block-inner -->
                                                </div><!-- /.block -->
                                            </div><!-- /.comment -->
                                            @endforeach
                                        </div><!-- /.row -->
                                    </div><!-- /.block -->
                                </div>
                            </div><!-- /.row -->
                            @if(count($reviews) > 2)
                            <div class="row">
                                <center class="review_click_content">
                                    <p class="loading_review" style="font-size:16px;color:red;"><i class="fa fa-spinner fa-spin"></i>{{trans('common.loading')}}</p>
                                    <a class="show_more_review" style="font-size:16px;">{{trans('common.show_more')}}</a>
                                </center>
                            </div>

                            @endif
                {{--         @endif --}}
                        </div><!-- /#main -->
                    </div>
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.section -->
    </div><!-- /#content -->
</div>
</div>

<!-- Service modal -->
    <div class="modal fade" id="category_services" tabindex="-1" role="dialog" aria-labelledby="category_services" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                    <h4 style="text-transform: uppercase; text-align: center;font-size: 19px;" class="modal-title custom_align" id="Heading">{{trans('common.salon_category_services')}}</h4>                             
                </div>
                <div class="modal-body modal_body_services">
                </div>            
            </div>
        </div>
    </div>
<!-- end Service modal -->

    <!-- subscrip Modal -->
    <div class="modal fade" id="sub_modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{trans('common.subscribe_to_newsletter')}}</h4>
                </div>
                <div class="modal-body">
                {!! Form::open(['action' => ['UsersController@postSubscripSalon',$salon->id],'class' => 'form-horizontal', 'role' => 'form' ]) !!}
                    {!! Form::text('email', null, ['placeholder' => trans('common.your_email_address'), 'class' => 'form-control']) !!}
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" style="background-color: #f95446;color:#fff;width:100%;margin-top:12px;" class="btn btn-default">{{trans('common.subscribe')}}</button>              
                        </div>
                    </div>
                {!! Form::close() !!}   
                </div>
            </div>
        </div>
    </div>
    <!--end subscrip Modal -->


<!-- Login modal -->
    <div class="modal fade" id="logina" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button id="nn" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h2 class="modal-title custom_align" id="Heading">{{trans('common.login')}}</h2></center>
                </div>
                <center><span class="message_error_login" style="color:red"></span></center>
                    @include('user.form.login-review')
            </div>
        </div>
    </div>
<!-- End Login modal -->

<!-- user subscrip Modal -->
    <div class="modal fade" id="sub__user_modal" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">{{trans('common.subscribe_to_newsletter')}}</h4>
                </div>
                <div class="modal-body">
                {!! Form::open(['action' => ['UsersController@postUserSubscripSalon',$salon->id],'class' => 'form-horizontal', 'role' => 'form' ]) !!}
                    {!! Form::text('email', null, ['placeholder' => trans('common.your_email_address'), 'class' => 'form-control']) !!}
                    <div class="row">
                        <div class="col-md-10 col-md-offset-1">
                            <button type="submit" style="background-color: #f95446;color:#fff;width:100%;margin-top:12px;" class="btn btn-default">{{trans('common.subscribe')}}</button>              
                        </div>
                    </div>
                {!! Form::close() !!}   
                </div>
            </div>
        </div>
    </div>
<!--user end subscrip Modal -->


@endsection

@section('scripts')
{!! HTML::script( asset('assets/user/plugins/js/jquery.min.js') ) !!} 
    {!! HTML::script( asset('assets/user/js/trans_main.js') ) !!}
    {!! HTML::script( asset('assets/user/js/trans.js') ) !!}

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSuAj4Vt4LLYCCyBQHFx--6S9RcCQp4Ss&libraries=places"
    async defer>
</script>
    
    {!! HTML::script( asset('assets/user/js/jquery.session.js') ) !!}

   
    {!! HTML::script( asset('assets/user/plugins/star/jquery.rating.pack.js') ) !!}
    {!! HTML::script( asset('assets/user/plugins/star/jquery.rating.js') ) !!} 

    
{{--      {!! HTML::script( asset('assets/user/js/main.js') ) !!}  --}}
    {!! HTML::script( asset('assets/user/js/user.js') ) !!}

@endsection

