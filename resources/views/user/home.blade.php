@extends('app-user')
@section('user-content')
<div class="infobar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb pull-left">
                    <li class="active">{{trans('common.home')}}</li>
                </ol>
            </div>
        </div>
    </div> 
</div>

<div class="highlighted-wrapper gray">
    <div class="highlighted section">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-2">
                    <div id="overviews" style="margin-left: -67px;">
                        @if(count($deal_salons) != 0)
                            @foreach($deal_salons as $key => $salon)
                            @if($key == 0)
                            <div class="overview active" style="width:90%;">
                            @else
                            <div class="overview" style="width:90%;">
                            @endif
                                <div class="overview-table">
                                    <div class="item title">
                                        <a style="color:white" href="{{action('UsersController@getSalonServiceCategory',$salon['id'])}}">
                                            <h3>{{$salon['name']}}</h3>
                                        </a> 
                                    </div><!-- /.item -->
                                    @if($salon->deal['description'] != '')
                                    <div class="item line">
                                        <p>{!! $salon->deal['description'] !!}</p>
                                    </div><!-- /.item -->
                                    @endif
                                </div><!-- /.overview-table -->
                            </div><!-- /.overview -->
                            @endforeach
                        @endif
                        @if(count($slides) != 0)
                            @foreach($slides as $key => $salon)
                            @if((count($deal_salons) == 0) && ($key == 0))
                            <div class="overview active" style="width:90%;">
                            @else
                            <div class="overview" style="width:90%;">
                            @endif
                                <div class="overview-table">
                                    <div class="item title">
                                        <a style="color:white" href="{{action('UsersController@getSalonServiceCategory',$salon['id'])}}">
                                            <h3>{{$salon['name']}}</h3>
                                        </a> 
                                    </div><!-- /.item -->
                                    @if($salon['phonenumber'] != '')
                                    <div class="item line">
                                        <span class="property"><i class="icon icon-normal-mobile-phone"></i></span>
                                        <span class="value">{{$salon['phonenumber']}}</span>
                                    </div><!-- /.item -->
                                    @endif
                                    @if($salon['addresses'] != '')
                                    <div class="item line">
                                        <span class="property"><i class="icon icon-normal-pointer"></i></span>
                                        <span class="value">
                                            @foreach($salon['addresses'] as $address)
                                                {{$address['address']}}<br>
                                            @endforeach
                                        </span>
                                    </div><!-- /.item -->
                                    @endif 
                                    @if($salon['salon_email'] != '')
                                    <div class="item line">
                                        <span class="property"><i class="icon icon-normal-mail"></i></span>
                                        <span class="value">{{$salon['salon_email']}}</span>
                                    </div><!-- /.item
                                    @endif
                                    @if($salon['workings_time_days'] != '')
                                    <div class="item line">
                                        <span class="property"><i class="icon icon-normal-clock"></i></span>
                                        <span class="value">{{$salon['workings_time_days']}}</span>
                                    </div><!-- /.item -->
                                    @endif
                                </div><!-- /.overview-table -->
                            </div><!-- /.overview -->
                            @endforeach
                        @endif
                        <div id="slider-navigation" style="top: 170px;">
                            <div class="prev prev_slide" style="margin-right: 1px;"></div><!-- /.prev -->
                        </div><!-- /.slider-navigation -->
                    </div><!-- /.overviews -->
                </div>

                <div class="col-md-6 col-sm-6"> 
                    <div id="slider"> 
                    @if(count($deal_salons) != 0) 
                        @foreach($deal_salons as $key => $salon)
                        @if($key == 0)
                        <div class="slide active">
                        @else
                        <div class="slide">
                        @endif
                            @if($salon['image'] == null)
                                <a href="detail.html"><img src="/assets/content/img/slides/toyota-1.png" alt="#"></a>
                            @else
                                <a href="detail.html"><img style="height:409px; width:557px" src="/assets/salon_images/{{$salon['image']}}" alt="#"></a>
                            @endif
                            <div class="color-overlay"></div><!-- /.color-overlay -->
                        </div><!-- /.slide -->
                        @endforeach 
                    @endif
                    @if(count($slides) != 0) 
                        @foreach($slides as $key => $salon)
                        @if((count($deal_salons) == 0) && ($key == 0))
                        <div class="slide active">
                        @else
                        <div class="slide">
                        @endif
                            @if($salon['image'] == null)
                            <a href="detail.html"><img src="/assets/content/img/slides/toyota-1.png" alt="#"></a>
                            @else
                            <a href="detail.html"><img style="height:409px; width:557px" src="/assets/salon_images/{{$salon['image']}}" alt="#"></a>
                            @endif
                            <div class="color-overlay"></div><!-- /.color-overlay -->
                        </div><!-- /.slide -->
                        @endforeach 
                    @endif
                    </div><!-- /#slider -->
                </div>
                <div class="col-md-4 col-sm-4">
                    <div id="overviews">
                        <div id="slider-navigation" style="top: 170px;">
                            <div class="next next_slide slide_next_button"></div><!-- /.next -->
                        </div><!-- /.slider-navigation -->
                        <div class="col-md-8 col-xs-12 pull-right">
                            <div class="filter-block">
                                <div class="block">
                                    <ul class="nav nav-tabs">
                                        <li class="active search_salons">
                                            <a style="border-radius:0" href="#search-sales" data-toggle="tab"> {{trans('common.search')}}</a>
                                            <a style="color:red;font-size: 14px;display:none" class="search_error" href="#"></a>
                                        </li>
                                    </ul><!-- /.nav -->

                                    <div class="content">
                                        <div class="inner">
                                            <div class="tab-content">
                                                <div class="tab-pane active" id="search-sales">
                                                        <div class="row">
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                                {!! Form::select('country', $countries, null, array('class'=>'form-control position_select')) !!}
                                                            </div><!-- /.form-group -->
                                      
                                                            <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                                <select  name="maker" class="form-control salons_select">

                                                                    <option value="">{{trans('common.select_an_salon')}}</option>
                                                                    @foreach($salons as $salon)
                                                                        <option  value="{{$salon['salon']->id}}">{{$salon['salon']->name}}
                                                                        </option> 
                                                                    @endforeach
                                                                </select>
                                                            </div><!-- /.form-group -->

                                                            <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                                <select class="position" name="model" class="form-control">
                                                                    <option value="">{{trans('common.select_an_position')}}</option>
                                                                    @foreach($positions as $position)
                                                                        <option value="{{$position->position}}">{{$position->position}}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div><!-- /.form-group -->

                                                             <div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
                                                                <select name="model" class="category_select form-control">

                                                                    <option  value="">{{trans('common.select_an_category')}}</option>
                                                                    <option value="1">Salon 1 category 1</option>
                                                                    <option value="2">Salon 2 category 1</option>
                                                                </select>
                                                            </div><!-- /.form-group -->

                                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 year-from">
                                                                <input class="form-control search_min" type="text" placeholder="{{trans('common.min_price')}}">   
                                                            </div><!-- /.form-group -->
                                                            <div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-6 year-to">
                                                                <input class="form-control search_max" type="text" placeholder="{{trans('common.max_price')}}">                        
                                                            </div><!-- /.form-group -->
                                                        </div><!-- /.row -->

                                                        <div class="form-group">
                                                            <button content="{{ csrf_token() }}" class="send btn btn-primary btn-primary-color search_salons_function">
                                                               {{trans('common.search')}}  <i class="icon icon-normal-right-arrow-small"></i>
                                                            </button>
                                                        </div><!-- /.form-group -->
                                             
                                                </div><!-- /.tab-pane -->

      
                                            </div><!-- /.tab-content -->
                                        </div><!-- /.inner -->
                                    </div><!-- /.content -->                                
                                </div><!-- /.block -->
                            </div><!-- /.filter-block -->
                        </div><!-- /.col-md-3 -->
                    </div>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.highligted -->
    <!-- search-->
    </div><!-- /.highlighted-wrapper -->

    <div id="content" class="frontpage">
        <div class="section white serach_result">
            
        </div><!-- /.container -->
    </div><!-- /.section -->

    <div class="section gray-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div id="recent-cars" class="grid-block block">

                        <div id="grid-carousel-pager" style="width: 105%;right:-14px">
                            <!-- width: 130%; right: -200px; -->
                            <div class="prev prev_button"></div>
                            <div class="next next_button"></div>
                        </div>
                      
                        <div class="page-header center">
                            <div class="page-header-inner">
                                <div class="line">
                                    <hr/>
                                </div><!-- /.line -->

                                <div class="heading">
                                    <h2>{{trans('common.top_best_salons')}}</h2>
                                </div><!-- /.heading -->

                                <div class="line">
                                    <hr/>
                                </div><!-- /.line -->
                            </div><!-- /.page-header-inner -->
                        </div><!-- /.page-header -->
                        @if(count($salons) != 0)
                        <div class="row">
                            <div class="col-md-12">
                                <div class="inner-block white">
                                    <div class="grid-carousel">  
                                    @foreach($salons as $key => $salon)                                       
                                        <div class="inner">
                                            <div class="grid-item">
                                                <div class="inner">
                                                    <div class="picture">
                                                        <div class="image-slider">
                                                            <a href="{{action('UsersController@getSalonServiceCategory',$salon['salon']['id'])}}" class="slide">
                                                                @if($salon['salon']->image == null)
                                                                    <img src="/assets/user/images/img1-md.jpg" style="height:191px" alt=""/>
                                                                @else
                                                                    <img style="height:191px" src="/assets/salon_images/{{$salon['salon']->image}}">
                                                                @endif    
                                                            </a><!-- /.slide -->
                                                            @foreach($salon['salon_images'] as $salon_image)
                                                            <a href="{{action('UsersController@getSalonServiceCategory',$salon['salon']['id'])}}" class="slide">
                                                                <img style="height:191px" src="/assets/salon_images/salon-images/{{$salon_image->image_name}}">
                                                            </a>
                                                            @endforeach 
                                                            <div class="cycle-pager"></div><!-- /.cycle-pager -->
                                                        </div><!-- /.image-slider -->
                                                    </div><!-- /.picture -->
                                                    <h3>
                                                         <a href="{{action('UsersController@getSalonServiceCategory',$salon['salon']['id'])}}">{{$salon['salon']['name']}} </a>
                                                    </h3>
                                                    <div class="price">
                                                        <div class="star-rating">
                                                            @for($j = 1;$j <= $salon['raiting'];$j++)
                                                                <i class="glyphicon glyphicon-star"></i>
                                                            @endfor
                                                            @for($j = 1; $j<= 5 - $salon['raiting'];$j++)
                                                                <i class="glyphicon glyphicon-star-empty"></i>
                                                            @endfor   
                                                            <?php $j++;?> 
                                                        </div><!-- /.star-rating -->
                                                    </div><!-- /.price -->
                                                </div><!-- /.inner -->
                                            </div><!-- /.grid-item -->      
                                        </div><!-- /.inner -->
                                        @endforeach   
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <center>{{trans('common.not_top_best_salons')}}</center>
                        @endif 

                    </div><!-- /.grid-block -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section -->

    <div class="section gray-light">
        <div class="container">
            <div class="row">
                <div class="col-md-9 col-sm-12">
                    <div id="main">
                        <div class="row-block block" id="best-deals">
                            <div class="page-header">
                                <div class="page-header-inner">
                                    <div class="heading">
                                        <h2>{{trans('common.top_offers_salons')}}</h2>
                                    </div><!-- /.heading -->

                                    <div class="line">
                                        <hr/>
                                    </div><!-- /.line -->
                                </div><!-- /.page-header-inner -->
                            </div><!-- /.page-header -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="content white">
                                        <div class="inner catalog_list">
                                        @if(count($offers_salons) != 0)
                                        @foreach($offers_salons as $offers_salon)
                                            <div class="row-item">
                                                <div class="inner">
                                                    <div class="row">
                                                        <div class="col-lg-4 col-md-5 col-sm-5">
                                                            <div class="picture">
                                                                <div class="image-slider">
                                                                    <a href="{{action('UsersController@getSalonServiceCategory',$offers_salon['salon']->id)}}" class="slide">
                                                                        @if($offers_salon['salon']->image== null)
                                                                            <img src="/assets/user/images/img1-md.jpg" style="height:191px" alt=""/>
                                                                        @else
                                                                            <img style="height:191px" src="/assets/salon_images/{{$offers_salon['salon']->image}}">
                                                                        @endif
                                                                    </a>
                                                                    @foreach($offers_salon['offers_salon_images'] as $salon_image) 
                                                                    <a href="{{action('UsersController@getSalonServiceCategory',$offers_salon['salon']->id)}}" class="slide"> 
                                                                        <img style="height:191px" src="/assets/salon_images/salon-images/{{$salon_image['image_name']}}">                                           
                                                                    </a>
                                                                    @endforeach 
                                                                    <div class="cycle-pager"></div> 
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-8 col-md-7 col-sm-7">
                                                            <div class="content-inner offers_salon"  data-id="{{$offers_salon['salon']->id}}">
                                                                <h3>
                                                                    <a href="{{action('UsersController@getSalonServiceCategory',$offers_salon['salon']->id)}}">{{$offers_salon['salon']->name}}</a>
                                                                </h3>
                    
                                                                <div class="description">
                                                                 @if($locale == 'en')
                                                                   <p>{{$offers_salon['salon']->description_en}}</p>
                                                                 @endif 
                                                                 @if($locale == 'ru')
                                                                   <p>{{$offers_salon['salon']->description_ru}}</p>
                                                                 @endif 
                                                                 @if($locale == 'am')
                                                                   <p>{{$offers_salon['salon']->description_am}}</p>
                                                                 @endif 
                                                                </div><!-- /.description -->               
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                        @else
                                            <p>{{trans('common.not_offers_salons')}}</p>
                                        @endif 
                                        </div><!-- /.inner -->
                                    </div>
                                    @if(count($offers_salons) != 0)
                                    <div class="container">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <br><br>
                                                <button class="btn btn-info btn-md loading_button_a"><i class="fa fa-spinner fa-spin"></i>{{trans('common.loading')}}</button>
                                                <button class="btn btn-info show_more_salon">{{trans('common.show_more')}}</button>
                                            </div>
                                        </div>
                                    </div>
                                    @endif<!-- /.content -->
                                </div><!-- /.col-md-12 -->
                            </div><!-- /.row -->
                        </div><!-- /.block -->                
                    </div><!-- /#main -->
                </div><!-- /.col-md-9 -->

                <div class="col-md-3 col-sm-12">
                    <div class="sidebar">
                        <div id="newsletter" class='block default'>
       
                        </div>                        
                        <div class="latest-reviews block block-shadow white">
                            <div class="block-inner">
                                <div class="block-title">
                                    <h3>{{trans('common.latest_blog_posts')}}</h3>
                                </div><!-- /.block-title -->
                                <div class="inner">
                                    <div class="row">
                                        @if(count($articles) != 0)
                                            @foreach($articles as $article)
                                            <div class="item-wrapper col-lg-12 col-md-12 col-sm-4">
                                                <div class="item">
                                                    <div class="picture hidden-sm">
                                                        @if($article->article_image)
                                                        <a href="{{action('UsersController@getArticle',$article->id)}}">
                                                            <img  style="height: 95px; width: 226px;" src="/assets/admin/images/article-images/{{$article->article_image}}"  alt="#">
                                                        </a>
                                                        @else
                                                        <a href="{{action('UsersController@getArticle',$article->id)}}">
                                                            <img src="/assets/admin/images/article-images/review.png" alt="#">
                                                        </a>
                                                        @endif
                                                    </div><!-- /.picture -->

                                                    <div class="title">
                                                        <a href="{{action('UsersController@getArticle',$article->id)}}">{{$article->title}}</a>
                                                    </div><!-- /.title -->

                                                    <div class="date">{{$article->created_at}}</div><!-- /.date -->

                                                    <div class="description" style="height:50px">
                                                        {!! $article->description !!}
                                                    </div><!-- /.description -->
                                                </div><!-- /.item -->
                                            </div><!-- /.item-wrapper -->
                                            @endforeach
                                        @else
                                        @endif
                                    </div><!-- /.row -->
                                </div><!-- /.inner -->

                                <!-- Recent Cars-->

                            </div><!-- /.block-inner -->
                        </div><!-- /.block -->      

                    </div><!-- /.sidebar -->
                </div><!-- /.col-md-3 -->
            </div><!-- /.row -->

        <!-- Our Satisfied Customers-->
        </div><!-- /.container -->
    </div><!-- /.section -->

    <!-- Our Partners-->

</div><!-- /#content -->  
@endsection

@section('scripts')
{!! HTML::script( asset('assets/user/plugins/js/jquery.min.js') ) !!} 
{!! HTML::script( asset('assets/user/js/user.js') ) !!}
@endsection