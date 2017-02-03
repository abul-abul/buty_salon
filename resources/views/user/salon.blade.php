@extends('app-user')
@section('style')
{!! HTML::style( asset('assets/user/plugins/star/jquery.rating.css')) !!}
{!! HTML::style( asset('assets/user/css/main.css')) !!} 
@endsection
@section('user-content')

<div class="container content profile">      
    @include('user.header')
    <div class="container content profile">
    	<div class="row">
            <div class="col-md-3 md-margin-bottom-40">
                @include('user.navigation')
            </div>
            <div class="col-md-3">
                @if(!empty($salon->name))
                    <h3>{{$salon->name}}</h3>
                @endif
                @if(!empty($salon->address1))
                    <p>Address: {{$salon->address1}}</p>
                @endif
                @if(!empty($salon->email))
                    <p>Email: {{$salon->salon_email}}</p>
                @endif
                @if(!empty($salon->phonenumber))
                    <p>Phone Number: {{$salon->phonenumber}}</p>
                @endif
                @if(!empty($salon->description))
                    <p>Description: {{$salon->description}}</p>
                @endif
                @if(!empty($salon->stock))
                    <p>Stock: {{$salon->stock}}</p>
                @endif
                @if(!empty($salon->workings_time_days))
                    <p>Working Time: {{$salon->workings_time_days}}</p>
                @endif

                <input type="hidden" content="{{ csrf_token() }}" class="salon_id" data-salon-id='{{$salon->id}}'>
                <input name="adv1" type="radio"  value="1" class="star salon_raiting {split:1}"/>
                <input name="adv1" type="radio"  value="2" class="star salon_raiting {split:1}"/>
                <input name="adv1" type="radio"  value="3" class="star salon_raiting {split:1}"/>
                <input name="adv1" type="radio"  value="4" class="star salon_raiting {split:1}"/>
                <input name="adv1" type="radio"  value="5" class="star salon_raiting {split:1}" checked="checked"/>      
            </div>

            @if($sub == 'subscribe')
                <div class="col-md-3" id="unsubscribe">
                    <button data-toggle="modal" data-target="#myModal" class="btn-u btn-u-default">Unsubscribe</i></button>
                </div>
            @else
            <div class="col-md-3" id="sub" >
                <button data-toggle="modal" data-target="#myModal2" class="btn-u btn-block">Subscribe</i></button>
            </div>
            @endif
            <div class="col-md-3" id="add_review">
                @include('message')
                <button  class="btn-u btn-block">Add review</button>
            </div>
            <div class="col-md-3" id="send_review">
                {!! Form::open(['action' => ['UsersController@postSendReviewSalon',$salon->id], 'method' => 'POST', 'class'=> 'sky-form', 'role' => 'form', 'files' => 'true' ]) !!}
                 <fieldset> 
                    <section>
                        <label class="textarea">
                            {!!  Form::textarea('message', '', array('rows' => '3' )) !!}
                        </label>
                        <button id="add_review" class="btn-u btn-block">Send review</button>
                    </section>
                </fieldset> 
                {!! Form::Close() !!}
            </div>
            <div class="col-md-12" style="margin-top:20px">
                @if(count($services) != 0)
                <h3>Our Services</h3>
                @endif
                @foreach($result['service'] as $service)
                    <div class="col-md-4 md-margin-bottom-40" style="margin-top:5px;" >
                        <div class="funny-boxes funny-boxes-colored funny-boxes-grey" >
                            <div class="row">
                                <div class="col-md-12">
                                    <center>
                                        <h2><a href="{{action('UsersController@getService',array($service->id,$salon->id))}}">{{$service->services}}</a></h2>
                                        <ul class="list-unstyled funny-boxes-rating">
                                            @for($j = 1;$j <= $result['service_rayting'][$i];$j++)
                                                <li><i data class="fa fa-star"></i></li>                                
                                            @endfor
                                            @for($j = 1; $j<= 5 - $result['service_rayting'][$i];$j++)
                                                <li><i class="fa fa-star-o"></i></li>                                
                                            @endfor
                                            <?php $i++;?>
                                        </ul>
                                    </center>
                                </div>
                            </div>                            
                        </div>
                    </div>
                @endforeach
            </div>
            <br/><br/><hr>
        </div> 
    </div>
</div>

<div id="myModal2" class="modal fade" role="dialog">
    <div class="modal-dialog" style="top: 142px;">
        <div class="modal-content" style="padding: 17px;">
            <center>
                <p id="message"></p>
                <h4> Select Email or Mobile Phone</h4>
            </center>
            <div class="row">
                <input type="hidden" id="token" data-id="{{$salon->id}}" data='{{ csrf_token() }}'>
               <div class="col-md-12" style="margin:20px 0px">

                    <div class="col-md-2"></div>
                    
                    <div id="select" class="col-md-8 sky-form">
                       <select class="form-control" >
                            <option>Email</option>
                            <option>Mobile Phone</option>
                        </select>
                    </div>
                </div>       
                <div class="col-md-12" id="email" style="margin:20px 0px">   
                    <div class="col-md-2"></div> 
                    <div class="col-md-8 sky-form">
                        <label class="input">
                            <i class="icon-append fa fa-user"></i>
                            <input  type="email" id="email_input" name="email" placeholder="Enter Email">
                        </label>
                    </div>
                </div>
                <div class="col-md-12" id="phone" style="margin:20px 0px">   
                    <div class="col-md-2"></div> 
                    <div class="col-md-8 sky-form">
                        <label class="input">
                            <i class="icon-append fa fa-phone"></i>
                            <input type="tel" id="phone_input" name="phone" placeholder="Enter Phone">
                        </label>
                    </div>
                </div>

                <div class="col-md-12" style="margin:10px 0px">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <button  id="subscribe" class="btn-u btn-block">Confirm</button>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog" style="top: 142px;">
        <div class="modal-content">
            <div class="row">
                <div class="col-md-12" style="margin:10px 0px">
                    <div class="col-md-4"></div>
                    <div class="col-md-4">
                        Are You Sure?
                    </div>
                    <div class="col-md-4"></div>
                </div>
                <div class="col-md-12" style="margin:10px 0px">
                    <div class="col-md-4"></div>
                    <div class="col-md-2">
                        <button id="unsub" type="button" class="btn-u btn-block">Yes</button>
                    </div>
                    <div class="col-md-2">
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
{!! HTML::script( asset('assets/admin/plugins/js/bootstrap.min.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.rating.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.form.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.MetaData.js') ) !!} 
{!! HTML::script( asset('assets/user/plugins/star/jquery.rating.pack.js') ) !!}
{!! HTML::script( asset('assets/user/js/user.js') ) !!} 

@endsection



               