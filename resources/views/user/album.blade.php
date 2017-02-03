@extends('app-user')
@section('user-content')

<div class="infobar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{action('UsersController@getHome')}}">{{trans('common.home')}}</a></li>
                    <li><a href="{{action('UsersController@getSalonServiceCategory',$salon->id)}}">{{$salon->name}}</a></li>
                    <li><a href="{{action('UsersController@getWorkerProfile',[$album->user->id])}}">{{$album->user->firstname}} Account</a></li>
                    <li class="active">{{trans('common.album_images')}}</li>
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
                    <div id="main">
                        <div class="car car-detail">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="gallery-wrapper">
                                           
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div>
                   
                    <div class="row">
                        <div class="col-md-12">
                            <div id="recent-cars" class="grid-block block">
                                <div id="grid-carousel-pager" style="width: 103%;right:-20px;top: 196px; z-index: 2;">
                                    <div class="prev"></div>
                                    <div class="next next_img" style="margin-left: 95%;"></div>
                                </div>
                                <div class="page-header center">
                                    <div class="page-header-inner">
                                        <div class="line">
                                            <hr/>
                                        </div><!-- /.line -->

                                        <div class="heading">
                                            <h2>{{trans('common.worker_images')}}</h2>
                                        </div><!-- /.heading -->

                                        <div class="line">
                                            <hr/>
                                        </div>
                                    </div>
                                </div>
                                 @if(count($album_images) != 0)
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inner-block white">
                                            <div class="grid-carousel">  
                                             @foreach($album_images as $album_image)
                                                <div class="inner">
                                                    <div class="grid-item">
                                                        <div class="inner">
                                                            <div class="picture">
                                                                <div class="image-slider">
                                                                    <img src="/assets/salon_images/worker-jobs/{{$album_image->worker_jobs_image}}" style="width:250px;height:200px" alt=""/>
                                                                </div><!-- /.image-slider -->
                                                            </div><!-- /.picture -->
                                                            
                                                        </div>
                                                    </div>     
                                                </div>  
                                                @endforeach 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                  
                              {{--   <div class="row">
                                    <div class="col-md-12">
                                        <div id="grid-carousel-pager">
                                            <div class="prev"></div>
                                            <div class="next"></div>
                                        </div>
                                    </div>
                                </div> --}}
                                 @else
                                  <center><h1>Album images is not found</h1></center>
                                @endif
                            </div><!-- /.grid-block -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                   
         
                    <!-- /#main -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section -->
</div>
</div>



@endsection
@section('scripts')
{{--     {!! HTML::script( asset('assets/user/plugins/js/jquery-migrate.min.js') ) !!} 
    {!! HTML::script( asset('assets/user/plugins/js/smoothScroll.js') ) !!} 
    {!! HTML::script( asset('assets/user/plugins/js/jquery.cubeportfolio.min.js') ) !!} 
    {!! HTML::script( asset('assets/user/plugins/js/custom.js') ) !!} 
    {!! HTML::script( asset('assets/user/plugins/js/app.js') ) !!} 
    {!! HTML::script( asset('assets/user/plugins/js/cube-portfolio-6-fw.js') ) !!} --}}


    <script src="/assets/content/js/jquery.js"></script>
    {!! HTML::script( asset('assets/user/js/user.js') ) !!}
    {!! HTML::script( asset('assets/user/js/trans_main.js') ) !!}
    {!! HTML::script( asset('assets/user/js/trans.js') ) !!}
    {!! HTML::script( asset('assets/user/js/main.js') ) !!} 
    {!! HTML::script( asset('assets/user/plugins/star/jquery.rating.js') ) !!} 
    <script type="text/javascript">
        // jQuery(document).ready(function() {
        //     App.init();    
        // });
    </script>
@endsection




               