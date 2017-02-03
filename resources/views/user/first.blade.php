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
	<style type="text/css">
	body{
	    margin: 0;
	    background: url('/assets/images/country_bg.jpg') no-repeat;
	    background-size: contain;
	    background-position: center center;
	}
	.gray-light{
		background: rgba(255, 255, 255, 0.43);
	}
	</style>
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
							<a style="color: #fff;font-size: 26px;text-decoration: none;" href="{{action('UsersController@getHome')}}">
								Beauty Salons   
					 {{--            <img src="/assets/content/img/logo.png" alt="Carat HTML Template"> --}}
							</a>
						</div>

					</div><!-- /.brand -->



				</div><!-- /.col-md-12 -->
			</div><!-- /.row -->
		</div><!-- /.container -->
	</div><!-- /.header-inner -->
</header><!-- /#header -->


	<div class="section gray-light">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div id="main">
						<div class="row-block block" id="best-deals">
							<div class="page-header">
								<div class="page-header-inner">
									<div class="heading">
										<div class="form-group col-lg-12 col-md-12 col-sm-6 col-xs-6">
											{!! Form::open(['action' => ['UsersController@postCookie'] ,'class' => 'form-horizontal']) !!}
											<div class="form-group col-lg-4 col-md-4 col-sm-4 col-xs-4"></div>
											<div>
												<div style="display: inline-block;" class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-3">
													{!! Form::select('country', $countries, null, array('')) !!}
												</div>
												<div style="display: inline-block;margin-left:15px">
													<button style="background: #ff547d;" type="submit" class="btn btn-primary btn-primary-color">Go</button>
												</div>
											</div>
											{!! Form::close() !!}
											
										</div><!-- /.form-group -->
									</div><!-- /.heading -->
								</div><!-- /.page-header-inner -->
							</div><!-- /.page-header -->
						</div><!-- /.block -->                
					</div><!-- /#main -->
				</div><!-- /.col-md-9 -->

			</div><!-- /.row -->

		<!-- Our Satisfied Customers-->
		</div><!-- /.container -->
	</div><!-- /.section -->

	<!-- Our Partners-->
</div><!-- /#content -->  
</div>









{!! HTML::script( asset('assets/user/plugins/js/jquery.min.js') ) !!} 

		
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
		{!! HTML::script( asset('assets/user/js/main.js') ) !!} 
		{!! HTML::script( asset('assets/user/plugins/star/jquery.rating.pack.js') ) !!}
		{!! HTML::script( asset('assets/user/plugins/star/jquery.rating.js') ) !!} 
		{!! HTML::script( asset('assets/user/js/user.js') ) !!}
	</body>
</html>
