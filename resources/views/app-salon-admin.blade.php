<!DOCTYPE html>
<html>
  	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Salon Admin | Dashboard</title>
		
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		
		<!-- Bootstrap 3.3.5 -->
		{!! HTML::style( asset('assets/admin/plugins/css/bootstrap.min.css')) !!}

		<!-- Font Awesome -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
		
		<!-- Ionicons -->
		<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
		
		<!-- Theme style -->
		{!! HTML::style( asset('assets/admin/plugins/css/AdminLTE.min.css')) !!}
		{!! HTML::style( asset('assets/admin/plugins/css/_all-skins.min.css')) !!}
		{!! HTML::style( asset('assets/admin/plugins/css/blue.css')) !!}
		{!! HTML::style( asset('assets/admin/plugins/css/morris.css')) !!}
		{!! HTML::style( asset('assets/admin/plugins/css/jquery-jvectormap-1.2.2.css')) !!}
		{!! HTML::style( asset('assets/admin/plugins/css/datepicker3.css')) !!}
		{!! HTML::style( asset('assets/admin/plugins/css/daterangepicker-bs3.css')) !!}
		{!! HTML::style( asset('assets/admin/plugins/css/bootstrap3-wysihtml5.min.css')) !!}
		{!! HTML::style( asset('assets/salon-admin/css/main.css')) !!}
  	</head>
  	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
		  	<header class="main-header">
				<!-- Logo -->
				<a href="{{action('SalonAdminController@getDashboard')}}" class="logo">
					<span class="logo-lg"><b>Salon</b>Admin</span>
				</a>
				<nav class="navbar navbar-static-top" role="navigation">
				  	<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
				  	</a>
				  	<div class="navbar-custom-menu">
					  	<a href="{{action('SalonAdminController@getLogout')}}"><button style="margin: 7px 17px 0px 0px" class="btn btn-info">Log Out</button> </a>           
				  	</div>
				</nav>
		  	</header>
			<!-- Left side column. contains the logo and sidebar -->
			<aside class="main-sidebar">
				<!-- sidebar: style can be found in sidebar.less -->
				<section class="sidebar">
				  <!-- /.search form -->
				  <!-- sidebar menu: : style can be found in sidebar.less -->
					<ul class="sidebar-menu">
						<li class="treeview">
						  	<a href="#">
								<i class="glyphicon glyphicon-folder-open"></i> <span>Salon</span> <i class="fa fa-angle-left pull-right"></i>
						  	</a>
						  	<ul class="treeview-menu">
								<li><a href="{{action('SalonAdminController@getSalonSettings')}}"><i class="fa fa-circle-o"></i>Settings</a></li>
						  	</ul>
						</li>
					</ul>
				  	<ul class="sidebar-menu">
						<li class="treeview">
						  	<a href="#">
								<i class="glyphicon glyphicon-folder-open"></i> <span>Service</span> <i class="fa fa-angle-left pull-right"></i>
						 	</a>
						  	<ul class="treeview-menu">
								<li><a href="{{action('SalonAdminController@getAddSalonCategory')}}"><i class="fa fa-circle-o"></i>Add Service Category</a></li>
								<li><a href="{{action('SalonAdminController@getAddSalonService')}}"><i class="fa fa-circle-o"></i>Add Service</a></li>
								<li><a href="{{action('SalonAdminController@getSalonCategoryList')}}"><i class="fa fa-circle-o"></i>Salon Category List</a></li>
						  	</ul>
						</li>
				  	</ul>
					<ul class="sidebar-menu">
						<li class="treeview">
						 	<a href="#">
								<i class="glyphicon glyphicon-folder-open"></i> <span>Worker</span> <i class="fa fa-angle-left pull-right"></i>
						  	</a>
						  	<ul class="treeview-menu">
								<li><a href="{{action('SalonAdminController@getAddSalonWorker')}}"><i class="fa fa-circle-o"></i>Add Salon Worker</a></li>
								<li><a href="{{action('SalonAdminController@getSalonWorkerList')}}"><i class="fa fa-circle-o"></i> Worker List</a></li>
								<li><a href="{{action('SalonAdminController@getAddSalonWorkerJobs')}}"><i class="fa fa-circle-o"></i>Employee's job</a></li>
						  	</ul>
						</li>
					</ul>

				  	<ul class="sidebar-menu">
						<li class="treeview">
						  	@if($new_countnotifications == 0)
						  		<a href="{{action('SalonAdminController@getNewNotifications')}}"><i class="fa fa-bell-o"></i> <span>New Notification</span></a>
						  	@else
						  		<a href="{{action('SalonAdminController@getNewNotifications')}}"><i class="fa fa-bell-o"></i> <span>New Notification</span><span style="color:red;margin-left:10px">{{$new_countnotifications}}</span> </a>
						  	@endif
						</li>
						<li>
					  		<a href="{{action('SalonAdminController@getNotifications')}}"><i class="glyphicon glyphicon-folder-open"></i> <span>Registered Users</span></a>
						</li>
				  	</ul>
					<ul class="sidebar-menu">
						<li class="treeview">
						  	<a href="{{action('SalonAdminController@getSalonReview')}}">
								<i class="glyphicon glyphicon-folder-open"></i> <span>Salon Feedback</span>
						  	</a>
						</li>
					</ul>
					<ul class="sidebar-menu">
						<li class="treeview">
						  	<a href="{{action('SalonAdminController@getDealOfTheDay')}}">
								<i class="glyphicon glyphicon-folder-open"></i> <span>Deal of the day</span>
						  	</a>
						</li>
					</ul>
					<ul class="sidebar-menu">
						<li class="treeview">
						  	<a href="#">
								<i class="glyphicon glyphicon-folder-open"></i> <span>Images</span> <i class="fa fa-angle-left pull-right"></i>
						  	</a>
						  	<ul class="treeview-menu">
								<li><a href="{{action('SalonAdminController@getAddImage')}}"><i class="fa fa-circle-o"></i>Add Image</a></li>
								<li><a href="{{action('SalonAdminController@getImagesList')}}"><i class="fa fa-circle-o"></i>All Images</a></li>
						  	</ul>
						</li>
					</ul>
					<ul class="sidebar-menu">
						<li class="treeview">
						  	<a href="#">
								<i class="glyphicon glyphicon-folder-open"></i> <span>Subscripe</span> <i class="fa fa-angle-left pull-right"></i>
						  	</a>
						  	<ul class="treeview-menu">
								<li><a href="{{action('SalonAdminController@getSubscripeUserList')}}"><i class="fa fa-circle-o"></i>Subscripe User List</a></li>

						  	</ul>
						</li>
					</ul>
				</section>
			<!-- /.sidebar -->
			</aside>

			<div class="content-wrapper">
				<section class="content">
				   @yield('salon-content')
				</section><!-- /.content -->
			</div><!-- /.content-wrapper -->
		  	<footer class="main-footer"></footer>

			<!-- Add the sidebar's background. This div must be placed
			immediately after the control sidebar -->
			<div class="control-sidebar-bg"></div>
		</div><!-- ./wrapper -->

		<!-- jQuery 2.1.4 -->
		{!! HTML::script( asset('assets/admin/plugins/js/jQuery-2.1.4.min.js') ) !!} 
		{!! HTML::script( asset('assets/admin/plugins/js/bootstrap.min.js') ) !!} 
		{!! HTML::script( asset('assets/admin/plugins/js/morris.min.js') ) !!} 
		{!! HTML::script( asset('assets/admin/plugins/js/jquery.sparkline.min.js') ) !!} 

		{!! HTML::script( asset('assets/admin/plugins/js/jquery.sparkline.min.js') ) !!} 
		{!! HTML::script( asset('assets/admin/plugins/js/jquery-jvectormap-1.2.2.min.js') ) !!} 
		{!! HTML::script( asset('assets/admin/plugins/js/jquery-jvectormap-world-mill-en.js') ) !!} 
		{!! HTML::script( asset('assets/admin/plugins/js/jquery.knob.js') ) !!}

		{!! HTML::script( asset('assets/admin/plugins/js/jquery.knob.js') ) !!} 
		{!! HTML::script( asset('assets/admin/plugins/js/daterangepicker.js') ) !!}
		{!! HTML::script( asset('assets/admin/plugins/js/bootstrap-datepicker.js') ) !!}
		{!! HTML::script( asset('assets/admin/plugins/js/bootstrap3-wysihtml5.all.js') ) !!}

		{!! HTML::script( asset('assets/admin/plugins/js/jquery.slimscroll.min.js') ) !!}
		{!! HTML::script( asset('assets/admin/plugins/js/fastclick.min.js') ) !!}
		{!! HTML::script( asset('assets/admin/plugins/js/app.min.js') ) !!}

		{!! HTML::script( asset('assets/admin/plugins/js/demo.js') ) !!}
		{!! HTML::script( asset('assets/salon-admin/js/salon-main.js') ) !!}
		{!! HTML::script( asset('assets/admin/js/delete.js') ) !!}
		 
		<!-- Morris.js charts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

		<!-- daterangepicker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		@yield('scripts')
  	</body>
</html>
