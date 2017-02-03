<!DOCTYPE html>
<html lang="en"> 
    <head>
        <title>Beauty | Unify - Responsive Website Template</title>

        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Pragmatic Mate s.r.o. - http://pragmaticmates.com">

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <input type="hidden" data-lang="{{$lang}}" id="language">
        <link rel="shortcut icon" href="#">
        {!! HTML::style( asset('assets/content/css/bootstrap.min.css')) !!}
        {!! HTML::style( asset('assets/content/libraries/chosen/chosen.min.css')) !!}
        {!! HTML::style( asset('assets/content/libraries/pictopro-outline/pictopro-outline.css')) !!}
        {!! HTML::style( asset('assets/content/libraries/pictopro-normal/pictopro-normal.css')) !!}
        {!! HTML::style( asset('assets/content/libraries/colorbox/colorbox.css')) !!}
        {!! HTML::style( asset('assets/content/libraries/jslider/bin/jquery.slider.min.css')) !!}
        {!! HTML::style( asset('assets/content/css/carat.css')) !!}
        {!! HTML::style( asset('assets/user/css/main.css')) !!}
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,400,700,400italic,700italic" rel="stylesheet" type="text/css"  media="screen, projection"> 
        @yield('style')  
    </head> 

    <body>
<div class="topbar gray">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-xs-12 header-top-left">
                <div>
                    <div class="news">
                        <div class="inner">
                                <ul class="news-list">
                                </ul><!-- /.news-list -->
                        </div><!-- /.inner -->
                    </div><!-- /.news -->
                </div>
            </div>
        </div><!-- /.row -->
    </div><!-- /.container -->
</div><!-- /.topbar -->

<header id="header">
    <div class="header-inner">
        <div class="container">
            <div class="row">
                <div class="col-md-12 clearfix">
                    <div class="brand" style="float: none;margin: 0 auto;width: 135px;">
                        <div style="width: 229px;" class="logo">
                            <a style="color: #000;font-size: 26px;text-decoration: none;" href="{{action('UsersController@getHome')}}">
                                Beauty Salons   
                     {{--            <img src="/assets/content/img/logo.png" alt="Carat HTML Template"> --}}
                            </a>
                        </div>
                        <div class="slogan">

                        </div><!-- /.slogan -->
                    </div><!-- /.brand -->
                    <button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <nav class="collapse navbar-collapse navbar-collapse" role="navigation">
                        <ul class="navigation">
                            <li><a href="{{action('UsersController@getHome')}}">{{trans('common.home')}}</a></li>  
                            
                            <li ><a href="{{action('UsersController@getBlog')}}">{{trans('common.blog')}}</a></li>
                            <li class="menuparent has-regularmenu">
                                <a href="#">{{trans('common.language')}}</a>
                                <div class="regularmenu language">
                                    <center>
                                        <ul class="regularmenu-inner">
                                            <li><a href="{{URL::to('/en/' . $currentPathWithoutLocale)}}"><img src="/assets/content/img/flags/en.png" alt="#"></a></li>
                                            <li><a href="{{URL::to('/ru/' . $currentPathWithoutLocale)}}"><img src="/assets/content/img/flags/ru.png" alt="#"></a></li>
                                            <li><a href="{{URL::to('/am/' . $currentPathWithoutLocale)}}"><img src="/assets/content/img/flags/am.png" alt="#"></a></li>
                                        </ul>
                                    </center>
                                </div>
                            </li>

                             @if((Auth::User() != null)&&(Auth::User()->role == 'user'))
                                <li style="float:right" class="menuparent has-regularmenu">
                                    @if($users->username != '')
                                    <a href="#">{{trans('common.hi')}} {{$users->username}}</a>
                                    @else
                                    <a href="#">{{trans('common.hi')}} {{$users->firstname}} {{$users->lastname}}</a>
                                    @endif
                                    <div class="regularmenu language">
                                        <center>
                                            <ul class="regularmenu-inner">
                                                <li class="my_prfile">
                                                    <a href="{{action('UsersController@getProfile')}}">{{trans('common.my_account')}}
                                                    </a>
                                                </li>
                                                <li class="logout"><a href="{{action('UsersController@getLogOut')}}">{{trans('common.logout')}}</a></li>   
                                            </ul>
                                        </center>
                                    </div>
                                </li>
                            @else                
                                <li style="float:right"><a href="#" data-toggle="modal" data-target="#registration">{{trans('common.reg')}}</a></li>
                                <li style="float:right"><a role="button"  href="#" data-toggle="modal" data-target="#login">{{trans('common.login')}}</a></li>
                            @endif
                        </ul>
                    </nav>
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.header-inner -->
</header><!-- /#header -->
@yield('user-content')
<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="block random-cars" style="margin-top:46px">
                    <div class="title">

                    </div><!-- /.title -->
                    <div class="items">
                        <ul class="footer_ul">
                            <li>
                                <a href="#">{{trans('common.about_us')}}</a>  
                            </li>
                            <li>
                                <a href="">{{trans('common.contact_us')}}</a>
                            </li>
                        </ul>   
                    </div><!-- /.items -->
                </div><!-- /.block -->              
            </div><!-- /.col-md-4 -->


            <div class="col-lg-4 col-md-4 col-sm-6" >
                <div style="margin-top:37px" class="block">
                    <div class="title">
                       <h2>{{trans('common.subscribe_to_newsletter')}}</h2>
                       @if(Session::has('subscribe_danger'))
                        <div class='col-md-12' style="margin-left: -9%;">
                            <div class="col-sm-12">
                                <div class="alert alert-danger">
                                    {{Session::get('subscribe_danger')}}
                                </div>
                            </div>
                        </div>
                        @endif
                        @if(Session::has('subscribe_success'))
                        <div class='col-md-12' style="margin-left: -9%;">
                            <div class="col-sm-12">
                                <div class="alert alert-success">
                                    {{Session::get('subscribe_success')}}
                                </div>
                            </div>
                        </div>
                        @endif
                   </div><!-- /.title -->
                    @if(Auth::user())
                        @if($subscribe_status == 'subscribed')
                        <div class="input-group" style="margin-left: 28%;"> 
                            <span  class="input-group-btn send btn btn-primary btn-primary-color unsubscribe_web sub_block2">
                                Subscribed
                                <div class="unsubscribe_block">
                                    <a class="unsub_b" href="{{action('UsersController@getUnsubscribeWebSite')}}">
                                        <span style="display: block; text-align: center;margin-top:12px">
                                            {{trans('common.unsubscribe')}}
                                        </span>
                                    </a>    
                                </div>  
                            </span>
                        </div>
                        @else
                            {!! Form::open(['action' => ['UsersController@postUserSubscribeWebSite'] ,'class' => 'form-horizontal','files' =>true  ]) !!}
                           <div class="input-group">                         
                            {!! Form::text('email', null, ['placeholder' => trans('common.your_email_address'), 'class' => 'form-control', 'required'=>'required' ]) !!}
                             <span class="input-group-btn">
                               <button class="btn btn-default" type="submit">{{trans('common.submit')}}</button><!-- /.btn -->
                             </span><!-- /.input-group-btn -->
                           </div><!-- /.input-group -->
                            {!! Form::close() !!}
                        @endif    
                    @else
                    {!! Form::open(['action' => ['UsersController@postUserSubscribeWebSite'] ,'class' => 'form-horizontal','files' =>true  ]) !!}
                       <div class="input-group">                         
                        {!! Form::text('email', null, ['placeholder' => trans('common.your_email_address'), 'class' => 'form-control', 'required'=>'required' ]) !!}
                         <span class="input-group-btn">
                           <button class="btn btn-default" type="submit">{{trans('common.submit')}}</button><!-- /.btn -->
                         </span><!-- /.input-group-btn -->
                       </div><!-- /.input-group -->
                    {!! Form::close() !!}
                    @endif
                </div><!-- /.block -->
            </div><!-- /.col-md-4 -->

            <div class="col-lg-4 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                <div style="margin-top:37px" class="block" id="footer_socail_block">
                    <div class="title follow_us">
                        {{trans('common.follow_us')}}
                    </div>
                    <ul class="footer_social">
                        <li>
                            <i class="fa fa-facebook" aria-hidden="true"></i>
                            <a target="_blank" href="https://www.facebook.com/">FACEBOOK</a>
                        </li>
                         <li>
                            <i class="fa fa-instagram" aria-hidden="true"></i>
                            <a target="_blank" href="https://www.instagram.com/">INSTAGRAM</a>
                        </li>
                        <li>
                            <i class="fa fa-google-plus-square" aria-hidden="true"></i>
                            <a target="_blank" href="https://plus.google.com/">GOOGLE +</a>
                        </li>
                        <li>
                            <i class="fa fa-twitter"></i>
                            <a target="_blank" href="https://twitter.com/?lang=ru">TWITTER</a>
                        </li>
                    </ul>
                </div>
            </div><!-- /.col-md-4 -->           
        </div><!-- /.row -->
    </div><!-- /.container -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 clearfix">
                    <div class="copyright" id="copy_footer">
                        All rights reserved. © Copyright 
                    </div><!-- /.pull-left -->
                </div>
            </div>
        </div><!-- /.container -->
    </div><!-- /.footer-bottom -->
</footer><!-- /#footer -->


{{-- Registration modal --}}
    <div class="modal fade" id="registration" tabindex="-1" role="dialog" hidden="true" aria-labelledby="edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title registration_text" id="exampleModalLabel">{{trans('common.reg')}}</h4>
                </div>
                @include('user.form.registration')
            </div>
      </div>
    </div>
{{-- End Registration modal --}}


{{-- Registration review modal --}}
    <div class="modal fade" id="registration_review" tabindex="-1" role="dialog" hidden="true" aria-labelledby="edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title registration_text" id="exampleModalLabel">{{trans('common.reg')}}</h4>
                </div>
                @include('user.form.registration_review')
            </div>
      </div>
    </div>
{{-- End review Registration modal --}}

{{-- Login modal --}}

    <div class="modal fade" id="login" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button id="close_modal" type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <center><h2 class="modal-title custom_align" id="Heading">{{trans('common.login')}}</h2></center>
                </div>
                <center><span class="message_error_login" style="color:red"></span></center>
                    @include('user.form.login')
            </div>
        </div>
    </div>
{{-- end Login modal --}}

{{-- success modal --}}
    <div class="modal fade" id="success_message" tabindex="-1" role="dialog" aria-hidden="true" aria-labelledby="edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <center class="success_mesage_salon"></center>
                        <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="input-group margin-bottom-20 message_success" style="color:green"></div>
                </div>
            </div>
        </div>
    </div>
{{-- success modal --}}
        @yield('scripts') 
        
        <script src="http://code.jquery.com/jquery-migrate-1.2.1.js"></script>
        <script src="/assets/content/js/jquery.ui.js"></script>
        <script src="/assets/content/js/bootstrap.js"></script>
        <script src="/assets/content/js/cycle.js"></script>
        <script src="/assets/content/libraries/jquery.bxslider/jquery.bxslider.js"></script>
        <script src="/assets/content/libraries/easy-tabs/lib/jquery.easytabs.min.js"></script>
        <script src="/assets/content/libraries/chosen/chosen.jquery.js"></script>
        <script src="/assets/content/libraries/star-rating/jquery.rating.js"></script>
        <script src="/assets/content/libraries/colorbox/jquery.colorbox-min.js"></script>
        <script src="/assets/content/libraries/jslider/bin/jquery.slider.min.js"></script>
        <script src="/assets/content/libraries/ezMark/js/jquery.ezmark.js"></script>

        <script type="text/javascript" src="/assets/content/libraries/flot/jquery.flot.js"></script>
        <script type="text/javascript" src="/assets/content/libraries/flot/jquery.flot.canvas.js"></script>
        <script type="text/javascript" src="/assets/content/libraries/flot/jquery.flot.resize.js"></script>
        <script type="text/javascript" src="/assets/content/libraries/flot/jquery.flot.time.js"></script>


        <script src="/assets/content/js/carat.js"></script>
       
        {!! HTML::script( asset('assets/user/js/trans_main.js') ) !!}
        {!! HTML::script( asset('assets/user/js/trans.js') ) !!}
        
        {!! HTML::script( asset('assets/user/plugins/star/jquery.rating.pack.js') ) !!}
        {!! HTML::script( asset('assets/user/plugins/star/jquery.rating.js') ) !!}

        
{{--         {!! HTML::script( asset('assets/user/js/main.js') ) !!} --}}
{{--         {!! HTML::script( asset('assets/user/js/user.js') ) !!} --}}
    </body>
</html>
