@extends('app-salon-admin')
@section('salon-content')   

@include('message')
<p><a  style="color: #00c0ef;font-size: 21px"
    href="{{action('SalonAdminController@getPortfolio',$id)}}">Portfolio</a></p>
<div>
{!! Form::open(['action' => ['SalonAdminController@postAddDiploma',$id] ,'class' => 'form-horizontal','files' =>true ]) !!}
    <h3>Add Worker Diploma</h3>
    <div class="cols_profolio">
        <div class="col-md-12">
            <div class="profolio_bloks">    
               {!! Form::file('diploma',  []) !!}
            </div>
        </div>  
        
    </div>
    <div style="margin-top:12px" class="col-md-12">  
        <button class="btn btn-info porfolio_sub" type="submit">Add</button>
    </div>      
{!! Form::close() !!}
</div>


<div><br><br><br>
    @if(count($diplomas) == 0)
    <p>Not Diploma</p>
    @else
    <h3>Worker Certificates</h3>
    <div class="col-sm-12">
    @foreach($diplomas as $diploma)
        <div class="col-sm-3">                  
                <img style="width:257px;height:191px;margin-right:5px;margin-top:5px;" src="/assets/salon-worker/diplomas//{{$diploma->diploma}}" />
                <p>Diploma</p>
            <button style="width:90%" data-toggle="modal" class="btn-danger btn-xs delete_salon" data-href="{{action('SalonAdminController@getDiplomaDelete' , $diploma['id'])}}"   data-target="#myModal"><i class="fa fa-times"></i></button>
        </div>    
    @endforeach
    </div>
    @endif
</div>




    <div class="container">
        <div class="modal fade" id="myModal" role="dialog">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Are you sure whant delete  this file??</h4>
                    </div>      
                    <div class="modal-footer">
                        <a class="delete_salon_yes" href="">
                            <button type="button"  class="btn btn-default ">Yes</button>
                        </a>
                        <button type="button" class="btn btn-default" data-dismiss="modal">No</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection