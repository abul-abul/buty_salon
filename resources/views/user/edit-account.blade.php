@extends('app-user')
@section('user-content')
<div class="infobar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{action('UsersController@getHome')}}">Home</a></li>
                    <li class="active">My Account</li>
                </ol>
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container --> 
</div><!-- /.infobar -->  
<div id="content">

    <div class="section gray-light">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="recent-cars" class="grid-block block">
                                <div class="page-header center">
                                    <div class="page-header-inner">
                                        <div class="line">
                                            <hr/>
                                        </div><!-- /.line -->

                                        <div class="heading">
                                            <h2>Edit Information</h2>
                                        </div><!-- /.heading -->

                                        <div class="line">
                                            <hr/>
                                        </div><!-- /.line -->
                                    </div><!-- /.page-header-inner -->
                                </div><!-- /.page-header -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inner-block white">
                                            <div>
                                                <div >
                                                    <div class="col-md-3 ss"  data='{{ csrf_token() }}'>
                                                        {!! Form::file('profile_img', array('id' => 'photo', 'class' => 'img_prof','style'=> 'display:none')) !!}
                                                            @if(isset($avatar))
                                                                <img class="img-responsive profile-img margin-bottom-20 profile_pikcures" style="height: 200px;width: 200px" src="/assets/user/user_images/{{$avatar}}">
                                                            @elseif(isset($social))
                                                                <img src="{{$social_avatar}}" class="profile_pikcures" style="height:200px;width:200px">   
                                                            @else    
                                                                <img class="img-responsive profile-img margin-bottom-20 profile_pikcures" style="height:200px;width:200px" src="/assets/user/images/img1-md.jpg" alt="">
                                                            @endif 
                                                            <button class="btn btn-success profile_img_submit">Sumbit</button>
                                                        {!! Form::Close() !!}   
                                                            <h2><a href="{{action('UsersController@getProfile')}}">My Account</a> </h2>                                                                             
                                                            <h2> <a href="{{action('UsersController@getEditAccount')}}">Edit Account</a></h2> 
                                                            <h2> <a href="{{action('UsersController@getLogOut')}}">Log Out</a></h2> 
                                                    </div> 
                                                </div>
                                                    <div class="col-sm-8">
                                                            @include('message')
                                                                {!! Form::model($users, ['action' => ['UsersController@postEditUser', $users->id], 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form', 'files' => 'true' ]) !!}
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">{{trans('common.first_name')}}</label>
                                                                        {!! Form::text('firstname', null, ['placeholder' => 'First Name', 'class' => 'form-control']) !!}
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">{{trans('common.last_name')}}</label>
                                                                        {!! Form::text('lastname', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) !!}
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Username</label>
                                                                        {!! Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Email</label>
                                                                        {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Address</label>
                                                                        {!! Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control']) !!}
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Country</label>
                                                                        {!! Form::text('country', null, ['placeholder' => 'Country', 'class' => 'form-control']) !!}
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">City</label>
                                                                        {!! Form::text('city', null, ['placeholder' => 'City', 'class' => 'form-control']) !!}
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Phone</label>
                                                                        {!! Form::text('phone', null, ['placeholder' => 'phone', 'class' => 'form-control']) !!}
                                                                    </div>
                                                                    @if(!isset($social))
                                                                        <div class="form-group">
                                                                            <label for="recipient-name" class="control-label">Password</label>
                                                                            {!! Form::password('password',['placeholder' => 'Password', 'class' => 'form-control']) !!}
                                                                        </div>
                                                                    @endif 
                                                                    <div class="form-group">
                                                                        <button style="width: 25%;" type="submit"  class="btn btn-primary">Save chaneges</button>
                                                                    </div>
                                                                {!! Form::close() !!}

                                                            @if(!isset($social))
                                                                <div class="page-header center">
                                                                    <div class="page-header-inner">
                                                                        <div class="line">
                                                                            <hr/>
                                                                        </div><!-- /.line -->

                                                                        <div class="heading">
                                                                            <h2>Change Password</h2>
                                                                        </div><!-- /.heading -->

                                                                        <div class="line">
                                                                            <hr/>
                                                                        </div><!-- /.line -->
                                                                    </div><!-- /.page-header-inner -->
                                                                </div><!-- /.page-header -->
                                                                {!! Form::open(['action' => ['UsersController@postEditPassword',$users->id], 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form', 'files' => 'true' ]) !!}
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Old Password</label>
                                                                        {!! Form::password('this_password',['placeholder' => 'Old Password', 'class' => 'form-control']) !!}
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">New Password</label>
                                                                        {!! Form::password('password',['placeholder' => 'New Password', 'class' => 'form-control']) !!}
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="recipient-name" class="control-label">Confirm  New Password</label>
                                                                        {!! Form::password('password_confirmation',['placeholder' => 'Confirm  New Password', 'class' => 'form-control']) !!}
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <button style="width: 25%;" type="submit"  class="btn btn-primary">Save chaneges</button>
                                                                    </div>
                                                                {!! Form::close() !!}
                                                            @endif

                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.grid-block -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                </div><!-- /.row -->
            </div><!-- /.container -->
        </div><!-- /.section -->
    </div>
<!-- /#content -->
</div>

@endsection
@section('scripts')
{!! HTML::script( asset('assets/user/plugins/js/jquery.min.js') ) !!} 
{!! HTML::script( asset('assets/user/js/user.js') ) !!}
@endsection
