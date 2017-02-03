<!DOCTYPE html>
<html>
  	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>AdminLTE 2 | Log in</title>
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
		<!-- iCheck -->
		{!! HTML::style( asset('assets/admin/plugins/css/blue.css')) !!}


		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
  	</head>
  	<body class="hold-transition login-page">
		<div class="login-box">
	  		<div class="login-logo">
				<a href="#"><b>Beauty</b>Salons</a>
	  		</div><!-- /.login-logo -->
	  	<div class="login-box-body">
			@include('message')
			<p class="login-box-msg">Sign in to start your session</p>
			{!! Form::open(['action' => ['AdminController@postLogin'] ,'class' => 'form-horizontal' ]) !!}
		  		<div class="form-group has-feedback">
			 		{!! Form::text('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
					<span class="glyphicon glyphicon-envelope form-control-feedback"></span>
		  		</div>
		  		<div class="form-group has-feedback">
					{!! Form::password('password', ['placeholder' => 'Password', 'class' => 'form-control']); !!}
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
		  		</div>
		  		<div class="row">
					<div class="col-xs-4">
			  			<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
					</div><!-- /.col -->
		  		</div>
			{!! Form::close() !!}
	  </div><!-- /.login-box-body -->
	</div><!-- /.login-box -->

	{!! HTML::script( asset('assets/admin/plugins/js/jQuery-2.1.4.min.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/bootstrap.min.js') ) !!} 
	{!! HTML::script( asset('assets/admin/plugins/js/icheck.min.js') ) !!} 

  	</body>
</html>
