@extends('app-user')

@section('style')
        {!! HTML::style( asset('assets/admin/plugins/css/datepicker3.css')) !!}
        {!! HTML::style( asset('assets/admin/plugins/css/daterangepicker-bs3.css')) !!}
        {!! HTML::style( asset('assets/admin/plugins/css/bootstrap3-wysihtml5.min.css')) !!}
        {!! HTML::style( asset('assets/content/css/carat.css')) !!}
{{-- 
    <style>html { font-size: 14px; font-family: Arial, Helvetica, sans-serif; }</style>
    <title></title> --}}
    <link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.2.607/styles/kendo.common-material.min.css" />
    <link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.2.607/styles/kendo.material.min.css" />
    <link rel="stylesheet" href="//kendo.cdn.telerik.com/2016.2.607/styles/kendo.default.mobile.min.css" />



@endsection

@section('user-content')
<div class="infobar">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ol class="breadcrumb pull-left">
                    <li><a href="{{action('UsersController@getHome')}}">{{trans('common.home')}}</a></li>
                    <li><a href="{{action('UsersController@getSalonServiceCategory',$salon->id)}}">{{$salon->name}}</a></li>
                    <li class="active">{{$worker->firstname}} {{trans('common.account')}}</li>
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
                                                <div class="gallery">
                                                    <div class="slide active">
                                                        <div class="picture-wrapper">
                                                            @if($worker->profile_picture != '')
                                                                <img src="/assets/salon-worker/worker-images/{{$worker->profile_picture}}" style="width:500px;height:370px;" alt="#">
                                                            @else
                                                                <img src="/assets/salon-worker/worker-images/photo.jpg" style="width:555px;height:370px;" alt="#">
                                                            @endif
                                                        </div>
                                                    </div>

                                                </div><!-- /.gallery -->

                                            </div> <!-- /#gallery-wrapper -->
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    @include('message')
                                    <div class="overview">
                                        <div id="tab-container" class="tab-container">
                                            <ul class='nav nav-tabs'>
                                                <li class='tab'><a href="#overview">{{trans('common.information')}}</a></li>
                                          {{--       @if(Auth::user()) --}}
                                                <li class='tab'><a href="#description">{{trans('common.registered')}}</a></li>
                                              {{--   @endif --}}
                                            </ul><!-- /.nav-tabs -->

                                            <div style="display:none" class="block white block-shadow">
                                                <div class="block-inner">
                                                    <div id="overview" class="active">
                                                        <h2>
                                                            <span>{{$worker->firstname}}</span>
                                                            <span style="margin-left:5px">{{$worker->lastname}}</span>
                                                        </h2>                
                                                        <table class="table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="property">{{trans('common.profession')}}</td>
                                                                    <td class="value">{{$worker->profession}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="property">{{trans('common.phone')}}</td>
                                                                    <td class="value">{{$worker->phone}}</td>
                                                                </tr>

                                                                <tr>
                                                                    <td class="property">{{trans('common.email')}}</td>
                                                                    <td class="value">{{$worker->email}}</td>
                                                                </tr>

                                                            </tbody>
                                                        </table>
                                                    </div>
                                        
                                              {{--       @if(Auth::user()) --}}

                                                    <div id="description">
                                                        <h2>{{trans('common.get_registred_to')}} <b>{{$worker->firstname}}</b></h2>
                                                            {!! Form::open(['action' => ['UsersController@postRegistered', $worker->id], 'method' => 'POST', 'id' => 'sky-form2', 'class' => 'sky-form', 'role' => 'form', 'files' => 'true' ]) !!}
                                                             <table class="table">
                                                                <tbody>  <br>     
                                                                    <b>{{trans('common.date')}}</b>
                                                                        <div id="example">
                                                                            <div class="demo-section k-content">
                                                                                <input name="date" id="datetimepicker" style="width: 100%;" />
                                                                            </div>
                                                                        </div>
                                                                    <div class="input-group" style="width: 100%;"><br>
                                                                        <b>{{trans('common.select_service')}}</b>
                                                                        {!! Form::select('service', $services, null, array('class' => 'form-control')) !!}
                                                                    </div> 

                                                                    <section style="margin-top:12px">
                                                                        <label class="textarea">
                                                                            <i class="icon-append fa fa-comment"></i>                                      
                                                                        </label>
                                                                        <b>{{trans('common.message')}}</b>
                                                                        {!! Form::textarea('message', null, array('id' => 'message','rows' => '4','style'=>'width:100%;max-width:100%;max-height: 100px;height: 100px' )) !!}
                                                                    </section>
                                                                    <section>
                                                                    <div class="" style="527px!important"><br>
                                                                        <b>{{trans('common.select_email_or_mobile_phone')}}</b>
                                                                        <select  id="select_subscripe" class="form-control">
                                                                            <option>{{trans('common.email')}}</option>
                                                                            <option>{{trans('common.mobile_phone')}}</option>
                                                                        </select>
                                                                    </div><br>
                                                                   <div  id="email" style="width:100%">   
                                                                        <div>
                                                                            <label class="input" style="width:100%">
                                                                                <i style="display: block;float: left;margin: 5px 15px 0 0px;width: 16px;font-size: 21px;"class="icon-append fa fa-user"></i>
                                                                                        
                                                                                <input class="form-control" style="width:94%" type="email" id="email_input" name="email" placeholder="{{trans('common.enter_email')}}">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    <div  id="phone" style="width:100%">   
                                                                        <div>
                                                                            <label class="input" style="width:100%">
                                                                                <i style="display: block;float: left;margin: 5px 15px 0 0px;width: 16px;font-size: 21px;" class="icon-append fa fa-phone"></i>

                                                                                <input class="form-control" style="width:94%" type="tel" id="phone_input" name="phone" placeholder="{{trans('common.enter_phone')}}">
                                                                            </label>
                                                                        </div>
                                                                    </div>
                                                                    </section>
                                                                    <section>
                                                                        @if(Auth::user() && Auth::user()->role == 'user')
                                                                            <button style="width:100%" type="submit" class="btn btn-default">{{trans('common.send')}}</button>
                                                                        @else
                                                                            <button data-toggle="modal" data-target="#error_modal" style="width:100%" type="button" class="btn btn-default">{{trans('common.send')}}</button>
                                                                        @endif
                                                                    </section>              
                                                                </tbody>
                                                            </table>
                                                            {!! Form::close() !!}
                                                    </div>
                                                 


                                               {{--     @endif --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div id="recent-cars" class="grid-block block">
                             @if(count($albums) != 0)  
                                <div id="grid-carousel-pager" style="width: 105%;right:-18px">
                                    <div class="prev prev_button del_prev1 prev_a"></div>
                                    <div class="next next_button del_next1 next_a"></div>
                                </div>
                                @endif
                                <div class="page-header center">
                                    <div class="page-header-inner">
                                        <div class="line">
                                            <hr/>
                                        </div><!-- /.line -->

                                        <div class="heading">
                                            <h2>{{trans('common.my_works')}}</h2>
                                        </div><!-- /.heading -->

                                        <div class="line">
                                            <hr/>
                                        </div><!-- /.line -->
                                    </div><!-- /.page-header-inner -->
                                </div><!-- /.page-header -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inner-block white">
                                            <div class="grid-carousel">  
                                            @if(count($albums) != 0)   
                                                @foreach($albums as $album) 
                                                    <div class="inner">
                                                        <div class="grid-item">
                                                            <div class="inner">
                                                                <div class="picture">
                                                                    <div class="image-slider">
                                                                        @if($album->album_prof_pic)
                                                                        <img src="/assets/salon-worker/album-profile-pictures/{{$album->album_prof_pic}}" style="width:257px;height:191px" alt=""/>
                                                                        @else
                                                                        <img src="/assets/salon_images/img1-md.jpg" style="width:257px;height:191px" alt=""/>
                                                                        @endif
                                                                        <div class="cycle-pager"></div><!-- /.cycle-pager -->
                                                                    </div><!-- /.image-slider -->
                                                                </div><!-- /.picture -->
                                                                <h3>
                                                                    <a href="{{action('UsersController@getTheAlbum',$album->id)}}">{{$album->album_name}}</a>
                                                                </h3>
                                                            </div><!-- /.inner -->
                                                        </div><!-- /.grid-item -->      
                                                    </div><!-- /.inner -->
                                                @endforeach 
                                            @else
                                            <div class="inner">
                                                <h2> {{trans('common.not_albums')}} </h2>  
                                            </div>
                                            @endif   
                                            </div>
                                        </div>
                                    </div>
                                </div>
                          {{--       @if(count($albums) != 0)   
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="grid-carousel-pager">
                                            <div class="prev del_prev1"></div>
                                            <div class="next del_next1"></div>
                                        </div>
                                    </div>
                                </div>
                                @endif --}}
                            </div><!-- /.grid-block -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->
                    <div class="row">
                        <div class="col-md-12">
                            <div id="reviews" class="grid-block block">
                                <div class="page-header center">
                                    <div class="page-header-inner">
                                        <div class="line">
                                            <hr/>
                                        </div><!-- /.line -->

                                        <div class="heading">
                                            <h2> {{trans('common.my_cert_and_dipl')}} </h2>
                                        </div><!-- /.heading -->

                                        <div class="line">
                                            <hr/>
                                        </div><!-- /.line -->
                                    </div><!-- /.page-header-inner -->
                                </div><!-- /.page-header -->





                                {{-- <div class="row" >
                                    @if(count($portfolio) != 0)   
                                    @foreach($portfolio as $worker_portfolio) 
                                    <div class="team col-xs-12 col-sm-6 col-md-3" style="margin-bottom: 20px;">
                                        <div class="inner">
                                            <div class="picture" >
                                                @if($worker_portfolio->certificate != '')
                                                <a  target="_blank" href="/assets/salon-worker/certificates/{{$worker_portfolio->certificate}}">
                                                    <img src="/assets/salon-worker/certificates/certificate.jpg" style="width:150px;height:150px" alt="#"/>
                                                </a> 
                                                @else
                                                    <a  target="_blank" href="/assets/salon-worker/diplomas/{{$worker_portfolio->diploma}}">
                                                        <img src="/assets/salon-worker/diplomas/diploma.jpg" style="width:150px;height:150px" alt="#" />
                                                    </a>
                                                @endif
                                            </div><!-- /.picture -->
                                        </div><!-- /.inner -->
                                    </div><!-- /.team -->
                                    @endforeach
                                    @else
                                    <center>
                                        <div class="inner" style="">
                                            <h2>{{trans('common.not_cert_and_dipl')}}</h2>
                                        </div></center>
                                    @endif
                                </div> --}}
                    <div class="row">
                        <div class="col-md-12">
                            <div id="recent-cars" class="grid-block block">
                                @if(count($portfolio) != 0) 
                                <div id="grid-carousel-pager" style="width: 105%;right:-18">
                                    <div class="prev prev_button del_prev"></div>
                                    <div class="next next_button del_next"></div>
                                 </div>
                                @endif

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="inner-block white">
                                            <div class="grid-carousel">  
                                             @if(count($portfolio) != 0) 
                                               @foreach($portfolio as $worker_portfolio) 
                                                    <div class="inner">
                                                        <div class="grid-item" style="">
                                                            <div class="inner">
                                                                <div class="picture">
                                                                    <div class="image-slider">
                                                                    {{--     @if($worker_portfolio->certificate != '')
                                                                            <a  target="_blank" href="/assets/salon-worker/certificates/{{$worker_portfolio->certificate}}">
                                                                                <img src="/assets/salon-worker/certificates/certificate.jpg" style="width:257px;height:191px" alt="#"/>
                                                                            </a> 
                                                                        @else
                                                                            <a  target="_blank" href="/assets/salon-worker/diplomas/{{$worker_portfolio->diploma}}">
                                                                                <img src="/assets/salon-worker/diplomas/diploma.jpg" style="width:257px;height:191px" alt="#" />
                                                                            </a>
                                                                        @endif --}}
                                                                        @if($worker_portfolio->certificate != '')
                                                                            <a  target="_blank" href="/assets/salon-worker/certificates/{{$worker_portfolio->certificate}}">
                                                                                <img src="/assets/salon-worker/certificates/{{$worker_portfolio->certificate}}" style="width:257px;height:191px" alt="#"/>
                                                                            </a> 
                                                                        @else
                                                                            <a  target="_blank" href="/assets/salon-worker/diplomas/{{$worker_portfolio->diploma}}">
                                                                                <img src="/assets/salon-worker/diplomas/{{$worker_portfolio->diploma}}" style="width:257px;height:191px" alt="#" />
                                                                            </a>
                                                                        @endif
                                                                    </div><!-- /.image-slider -->
                                                                </div><!-- /.picture -->
                                                              
                                                            </div><!-- /.inner -->
                                                        </div><!-- /.grid-item -->      
                                                    </div><!-- /.inner -->
                                                @endforeach 
                                            @else
                                            <div class="inner">
                                                <h2> {{trans('common.not_albums')}} </h2>  
                                            </div>
                                            @endif   
                                            </div>
                                        </div>
                                    </div>
                                </div>

                           {{--      @if(count($portfolio) != 0)   
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="grid-carousel-pager">
                                            <div class="prev del_prev"></div>
                                            <div class="next del_next"></div>
                                        </div>
                                    </div>
                                </div>
                                @endif --}}

                            </div><!-- /.grid-block -->
                        </div><!-- /.col-md-12 -->
                    </div><!-- /.row -->





                            </div><!-- /.block -->
                        </div>
                    </div>
                    <!-- /#main -->
                </div><!-- /.col-md-12 -->
            </div><!-- /.row -->
        </div><!-- /.container -->
    </div><!-- /.section -->
</div>
<!-- /#content -->

<!-- Please login modal -->
<div id="error_modal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body">
        <center><h1> Please log in or register</h1></center>
      </div>

    </div>

  </div>
</div>

<!--end Please login modal -->
@endsection

@section('scripts')
<script src="/assets/content/js/jquery.js"></script>
    {!! HTML::script( asset('assets/user/js/user.js') ) !!}
    {!! HTML::script( asset('assets/user/js/trans_main.js') ) !!}
    {!! HTML::script( asset('assets/user/js/trans.js') ) !!}
    {!! HTML::script( asset('assets/user/js/main.js') ) !!} 
    {!! HTML::script( asset('assets/user/plugins/star/jquery.rating.js') ) !!} 
<script type="text/javascript">

     $(document).ready(function () {

        $("#datetimepicker").kendoDateTimePicker({
            value:new Date()
        });

         $(window).load(function(){
             $('.del_prev').children(":first").remove();
             $('.del_next').children(":first").remove();

             $('.del_prev1').children(":last").remove();
             $('.del_next1').children(":last").remove();

             setTimeout(function(){
                $('.block-shadow').css('display','block')
             }, 50);



         })



    });
</script>            

{!! HTML::script( asset('assets/user/plugins/js/jquery.min.js') ) !!}

{!! HTML::script( asset('assets/user/plugins/star/jquery.rating.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.form.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.MetaData.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.rating.pack.js') ) !!}

<!-- {!! HTML::script( asset('assets/user/plugins/js/moment.min.js') ) !!}
{!! HTML::script( asset('assets/user/plugins/js/bootstrap.min.js') ) !!}
{!! HTML::script( asset('assets/user/plugins/js/bootstrap-datetimepicker.min.js') ) !!} -->
<script src="//kendo.cdn.telerik.com/2016.2.607/js/jquery.min.js"></script>
<script src="//kendo.cdn.telerik.com/2016.2.607/js/kendo.all.min.js"></script>

 
@endsection
