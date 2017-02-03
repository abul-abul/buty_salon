@extends('app-user')
@section('user-content')
    <!--=== Breadcrumbs ===-->
    <div class="breadcrumbs breadcrumbs-dark">
        <div class="container">
            <h1 class="pull-left">About Me</h1>
            <ul class="pull-right breadcrumb">
                <li><a href= "{{action('UsersController@getLogOut')}}">Logout</a></li>
            </ul>
        </div>
    </div>
    <!--=== End Breadcrumbs ===-->

    <!-- About Me Block -->
    <div class="container content-sm">
        <div class="row about-me">
            <div class="col-sm-4 shadow-wrapper md-margin-bottom-40">
                <div class="box-shadow shadow-effect-2">
                    <img class="img-responsive img-bordered full-width" src="{{ asset('assets/user/plugins/img/img3-md.jpg') }}" alt="">
                </div>
            </div>

            <div class="col-sm-8">
                <div class="overflow-h">
                    <div class="pull-left">
                        <h2>{{$users->username}}</h2>
                        <span>CEO, Director</span>
                    </div>    
                </div>    
                <p>Nulla fermentum blandit dolor eu dictum. Nulla faucibus libero eget mi tempus, quis laoreet ante congue. Nullam sed tortor vitae magna auctor vestibulum. Fusce gravida, mauris at vulputate aliquet, arcu nunc scelerisque mi, pellentesque mollis lectus mauris in urna.</p>
                <p>Suspendisse non magna sed justo tincidunt pellentesque. Proin sit amet ligula vel orci tempus viverra. Donec massa justo, sodales in leo pretium, adipiscing dictum mi. Nullam sed eleifend purus. Sed eget lacus eget urna venenatis hendrerit sed sit amet dui. Suspendisse lorem velit, tincidunt nec mattis ut, gravida adipiscing sapien.</p><br>

                <div class="row"></div>
            </div>
        </div>
    </div>
    <div class="container content-sm">
        @include('message')
        @include('user.form.user-detalis')
        @include('user.form.password')
    </div>   
    <!-- End About Me Block -->

     <!--=== Footer Version 1 ===-->
    <div class="footer-v1">
        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">                     
                        <p>
                            2015 &copy; All Rights Reserved.
                           <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a>
                        </p>
                    </div>
                </div>
            </div> 
        </div><!--/copyright-->
    </div>     
    <!--=== End Footer Version 1 ===-->
<!--/End Wrapepr-->

@endsection