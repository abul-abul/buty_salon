@extends('app-salon-admin')
@section('salon-content')	

<div class="col-md-3">
    <div class="profolio_bloks">                  
        <a href="{{action('SalonAdminController@getCertificates',$id)}}">
            <img style="width: 71px;" src="/assets/user/images/file-extention-change.jpg" />
            <h3>Certificates</h3>
        </a> 
    </div>
</div>
<div class="col-md-3">
    <div class="profolio_bloks">                    
        <a href="{{action('SalonAdminController@getDiplomas',$id)}}">
            <img style="width: 71px;" src="/assets/user/images/file-extention-change.jpg" />
            <h3>Diplomas</h3>
        </a> 
    </div>
</div>
@endsection