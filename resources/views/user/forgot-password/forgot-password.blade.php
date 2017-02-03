@extends('app-user')

@section('style')
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
@endsection
@section('user-content')

<div class="container">
    <div class="col-md-6 col-md-offset-3">
        @include('message')
        {!! Form::open(['action' => ['UsersController@postForgotPassword'] ,'class' => 'form-signin' ]) !!}  
            <center><h2 class="form-signin-heading">{{trans('common.forgot_password')}}</h2></center>
                
            <div class="form-group">
                <label>{{trans('common.email')}}</label>
                {!! Form::email('email', null, ['placeholder' => trans('common.email'), 'class' => 'form-control']) !!}
            </div>
            <div class="form-group">
                <button class="btn btn-lg btn-primary btn-block" type="submit">{{trans('common.send')}}</button>
            </div>
        {!! Form::Close() !!} 
    </div>
</div>

@endsection

