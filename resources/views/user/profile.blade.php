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
                                            <h2>My Account</h2>
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
                                                            <img class="img-responsive profile-img margin-bottom-20 profile_pikcures" style="height:200px;width:200px" src="/assets/user/user_images/{{$avatar}}">
                                                        @elseif(isset($social))
                                                            <img src="{{$social_avatar}}" class="profile_pikcures" style="height:200px;width:200px" >   
                                                        @else    
                                                            <img class="img-responsive profile-img margin-bottom-20 profile_pikcures" style="height:200px;width:200px" src="/assets/user/images/img1-md.jpg" alt="">
                                                        @endif 
                                                        <button class="btn btn-success profile_img_submit">Sumbit</button>
                                                    {!! Form::Close() !!}  
                                                        <h2><a href="{{action('UsersController@getProfile')}}">My Account</a>
                                                        </h2>                                                                             
                                                        <h2>
                                                            <a href="{{action('UsersController@getEditAccount')}}">Edit Account</a>
                                                        </h2> 
                                                        <h2>
                                                            <a href="{{action('UsersController@getLogOut')}}">Log Out</a>
                                                        </h2>  
                                                    </div> 
                                                </div>
                                                <div class="col-sm-8">
                                                    <h3>Information</h3>
                                                    <table class="table">
                                                        <tbody>
                                                            <tr>
                                                                <td class="property">Firstname</td>
                                                                <td class="value">{{$users->firstname}}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="property">Lastname</td>
                                                                <td class="value">{{$users->lastname}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="property">Username</td>
                                                                <td class="value">{{$users->username}}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="property">Email</td>
                                                                <td class="value">{{$users->email}}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="property">Phone</td>
                                                                <td class="value">{{$users->phone}}</td>
                                                            </tr>

                                                            <tr>
                                                                <td class="property">Country</td>
                                                                <td class="value">{{$users->country}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="property">City</td>
                                                                <td class="value">{{$users->city}}</td>
                                                            </tr>
                                                            <tr>
                                                                <td class="property">Address</td>
                                                                <td class="value">{{$users->address}}</td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
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