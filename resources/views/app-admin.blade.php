<!DOCTYPE html>
<html>
  	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>AdminLTE 2 | Dashboard</title>
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
  	</head>
  	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
	  		<header class="main-header">
				<!-- Logo -->
				<a href="{{action('AdminController@getDashboard')}}" class="logo">
					<!-- mini logo for sidebar mini 50x50 pixels -->
					<span class="logo-mini"><b>A</b>LT</span>
					<!-- logo for regular state and mobile devices -->
					<span class="logo-lg"><b>Beauty</b>Salons</span>
				</a>
				<!-- Header Navbar: style can be found in header.less -->
				<nav class="navbar navbar-static-top" role="navigation">
					<!-- Sidebar toggle button-->
					<a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
						<span class="sr-only">Toggle navigation</span>
					</a>
					<div class="navbar-custom-menu">
						<a href="{{action('AdminController@getLogout')}}"><button style="margin: 7px 17px 0px 0px" class="btn btn-info">Log Out</button> </a>           
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
						<li>
					  		<a href="#">
								<i class="glyphicon glyphicon-folder-open"></i> <span>Salon</span> <i class="fa fa-angle-left pull-right"></i>
					  		</a>
						  	<ul class="treeview-menu">
								<li><a href="{{action('AdminController@getAddSalon')}}"><i class="fa fa-circle-o"></i> Add admin salon</a></li>
								<li><a href="{{action('AdminController@getSalonList')}}"><i class="fa fa-circle-o"></i> Salon List</a></li>
						  	</ul>
						  	
						</li>

				  	</ul>
				  	<ul class="sidebar-menu">
					  	<li>
					  		<a href="#">
								<i class="glyphicon glyphicon-folder-open"></i> <span>Users</span> <i class="fa fa-angle-left pull-right"></i>
					  		</a>
						  	<ul class="treeview-menu">
								<li><a href="{{action('AdminController@getAddUser')}}"><i class="fa fa-circle-o"></i>Add User</a></li>
								<li><a href="{{action('AdminController@getUsersList')}}"><i class="fa fa-circle-o"></i>Users List</a></li>
							</ul>
						</li>	
					</ul>
					<ul class="sidebar-menu">
						<li>
					  		<a href="#">
								<i class="glyphicon glyphicon-folder-open"></i> <span>Article</span> <i class="fa fa-angle-left pull-right"></i>
					  		</a>
						  	<ul class="treeview-menu">
								<li><a href="{{action('AdminController@getAddArticle')}}"><i class="fa fa-circle-o"></i> Add Article</a></li>
								<li><a href="{{action('AdminController@getArticleList')}}"><i class="fa fa-circle-o"></i> Article List</a></li>
						  	</ul>
						  	
						</li>
				  	</ul>
				  	<ul class="sidebar-menu">
						<li>
					  		<a href="{{action('AdminController@getSuibscribedUsers')}}">
								<i class="glyphicon glyphicon-folder-open"></i> <span>Suibscribed users</span>
					  		</a>
					  	
						</li>
				  	</ul>
				</section>
			<!-- /.sidebar -->
			</aside>

		  	<div class="content-wrapper">
				<section class="content">
			   		@yield('content')
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
		
	<!--{!! HTML::script( asset('assets/admin/plugins/js/dashboard.js') ) !!} -->
		{!! HTML::script( asset('assets/admin/plugins/js/demo.js') ) !!}
		{!! HTML::script( asset('assets/admin/js/admin-main.js') ) !!}
		{!! HTML::script( asset('assets/admin/js/delete.js') ) !!}
		<script src="https://cdn.ckeditor.com/4.4.3/standard/ckeditor.js">

		<!-- Morris.js charts -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>

		<!-- daterangepicker -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>

		<!-- jQuery UI 1.11.4 -->
		<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  	</body>
</html>
