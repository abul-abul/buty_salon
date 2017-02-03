<!DOCTYPE html>
<html lang="en"> <!--<![endif]-->  
    <head>
        <title>Beauty | Unify - Responsive Website Template</title>
        <!-- Meta -->
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="author" content="Pragmatic Mate s.r.o. - http://pragmaticmates.com">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    </head> 

    <body>
        <div class="topbar gray">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-4 header-top-left">
                        <div>
                            <div class="news">
                                <div class="inner">
                                    <ul class="news-list">

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 col-xs-8 header-top-right">
                        <div>
                            <div class="social">
                                <div class="inner">

                                </div>
                            </div>
                            <div class="languages">
                                <ul>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <header id="header">
            <div class="header-inner">
                <div class="container">
                    <div class="row">
                    <div class="brand" style="float: none;margin: 0 auto;width: 135px;">
                        <div style="width: 229px;" class="logo">
                            <a style="color: #000;font-size: 26px;text-decoration: none;" href="{{action('UsersController@getHome')}}">
                                Beauty Salons   
                     {{--            <img src="/assets/content/img/logo.png" alt="Carat HTML Template"> --}}
                            </a>
                        </div>
                        <div class="slogan"></div><!-- /.slogan -->
                    </div><!-- /.brand -->
                            <nav class="collapse navbar-collapse navbar-collapse" role="navigation">
                                <ul class="navigation">
                                <li><a href="{{action('UsersController@getHome')}}">{{trans('common.home')}}</a></li>
                                <li class="menuparent has-regularmenu">
                                    <a href="#">{{trans('common.language')}}</a>
                                    <div class="regularmenu language">
                                        <center>
                                            <ul class="regularmenu-inner">
                                                <li><a href="{{URL::to('/en/404')}}"><img src="/assets/content/img/flags/en.png" alt="#"></a></li>
                                                <li><a href="{{URL::to('/ru/404')}}"><img src="/assets/content/img/flags/ru.png" alt="#"></a></li>
                                                <li><a href="{{URL::to('/am/404')}}"><img src="/assets/content/img/flags/am.png" alt="#"></a></li>
                                            </ul><!-- /.regularmenu-inner -->
                                        </center>
                                    </div><!-- /.regularmenu -->
                                </li>
                                </ul><!-- /.nav -->
                            </nav>
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.container -->
            </div><!-- /.header-inner -->
        </header><!-- /#header -->

        <div class="infobar">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <ol class="breadcrumb pull-left">
                            <li><a href="{{action('UsersController@getHome')}}">{{trans('common.home')}}</a></li>
                            <li class="active">404</li>
                        </ol>
                    </div><!-- /.col-md-12 -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.infobar -->  
        <div id="content" class="page-404">
            <div id="page-heading">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="heading">
                                <div class="title">
                                    <h1>{{trans('common.page_not_found')}}</h1>
                                </div>
                                <!-- /.title -->
                            </div>
                            <!-- /.heading -->
                        </div>
                        <!-- /.col-md-8 -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /#page-heading -->

            <div class="section gray-light">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="main">
                                <div class="row">
                                    <div class="col-md-push-4 col-md-4">
                                        <div class="not-found">
                                            <div class="not-found-icon">
                                                <div class="not-found-icon-normal">
                                                    404
                                                </div>
                                            </div>
                                            <div class="title">
                                                <h2>Ooops!</h2>
                                            </div>
                                            <div class="subtitle">
                                                <h3>{{trans('common.page_not_here')}}</h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /#main -->
                        </div>
                        <!-- /.col-md-12 -->
                   </div>
                    <!-- /.row -->
                </div>
                <!-- /.container -->
            </div>
            <!-- /.section -->

        </div>
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
                                <a href="#">ABOUT US</a>  
                            </li>
                            <li>
                                <a href="">CONTACT US</a>
                            </li>
                            <li>
                                <a href="">CONTACT US</a>
                            </li>
                        </ul>   
                    </div><!-- /.items -->
                </div><!-- /.block -->              
            </div><!-- /.col-md-4 -->

            <div class="col-lg-4 col-md-4 col-sm-6">
                <div style="margin-top:37px" class="block">
                      <div class="title">
                       <h2>Subscribe to Newsletter</h2>
                   </div><!-- /.title -->
                   <form method="post">
                       <div class="input-group">                         
                         <input type="email" class="form-control" placeholder="Your e-mail address" required="required">

                         <span class="input-group-btn">
                           <button class="btn btn-default" type="button">Submit</button><!-- /.btn -->
                         </span><!-- /.input-group-btn -->
                       </div><!-- /.input-group -->
                   </form>
                </div><!-- /.block -->
            </div><!-- /.col-md-4 -->

            <div class="col-lg-4 col-md-4 col-md-offset-0 col-sm-8 col-sm-offset-2">
                <div style="margin-top:37px" class="block" id="footer_socail_block">
                    <div class="title follow_us">
                        follow us
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

        {!! HTML::script( asset('assets/user/plugins/js/jquery.min.js') ) !!} 
        {!! HTML::script( asset('assets/user/js/main.js') ) !!} 
        {!! HTML::script( asset('assets/user/plugins/star/jquery.rating.js') ) !!} 
        <script src="/assets/content/js/jquery.js"></script>
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


        <script src="http://maps.googleapis.com/maps/api/js?sensor=true&amp;v=3.13"></script>
        <script src="/assets/content/js/carat.js"></script>
        {!! HTML::script( asset('assets/user/js/user.js') ) !!}
        {!! HTML::script( asset('assets/user/js/trans_main.js') ) !!}
        {!! HTML::script( asset('assets/user/js/trans.js') ) !!}  
    </body>
</html>







