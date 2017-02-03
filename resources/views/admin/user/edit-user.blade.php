@extends('app-admin')
@section('content')
 <div style="width:40%;margin-left:20%">
    <h1>Edit User Detalis</h1>
    {!! Form::model($users, ['action' => ['AdminController@postEditOneUser', $users->id], 'method' => 'POST', 'class' => 'form-horizontal', 'role' => 'form', 'files' => 'true' ]) !!}
       
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            {!! Form::text('firstname', null, ['placeholder' => 'First Name', 'class' => 'form-control']) !!}
        </div><br>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            @if(isset($users->profile_picture))
            <img style="width: 67px;height:29px;float: left;margin: 0 11px 6px 3px;" src="/assets/user/user_images/{{$users->profile_picture}}">
            @else
                <img style="width: 67px;height:29px;float: left;margin: 0 11px 6px 3px;" src="/assets/user/images/img1-md.jpg">
            @endif
            {!! Form::file('profile_picture', null, ['placeholder' => 'Pictures', 'class' => 'form-control']) !!}
        </div><br>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            {!! Form::text('lastname', null, ['placeholder' => 'Last Name', 'class' => 'form-control']) !!}
        </div><br>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-user"></i></span>
            {!! Form::text('username', null, ['placeholder' => 'Username', 'class' => 'form-control']) !!}
        </div><br>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            {!! Form::email('email', null, ['placeholder' => 'Email', 'class' => 'form-control']) !!}
        </div><br>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="glyphicon glyphicon-tint"></i></span>
            {!! Form::text('address', null, ['placeholder' => 'Address', 'class' => 'form-control']) !!}
        </div><br>
        <div class="input-group margin-bottom-20">
            <span class="input-group-addon"><i class="fa fa-phone"></i></span>
            {!! Form::text('phone', null, ['placeholder' => 'phone', 'class' => 'form-control']) !!}
        </div><br>
        <div class="col-md-3"></div>
        <div class="col-md-5">
            <button style="width:100%;margin-top:16px" type="submit" class="btn btn-warning btn-lg">Change Info</button> 
        </div>
            
    {!! Form::close() !!}
</div>  
@endsection