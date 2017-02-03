<div class="modal-body">     
    <div class="form-group">
        <label for="recipient-name" class="control-label">{{trans('common.email')}}</label>
        {!! Form::email('email', null, ['placeholder' => trans('common.email'), 'class' => 'form-control login_email']) !!}
    </div>
    <div class="form-group">
        <label for="recipient-name" class="control-label">{{trans('common.password')}}</label>
        {!! Form::password('password',['placeholder' => trans('common.password'), 'class' => 'form-control login_password']) !!}
    </div>
    <div class="modal-footer">
        <div class="row">
            <div class="col-xs-12 col-sm-6" style="margin-bottom:20px;">
                <button type="buuton" content="{{ csrf_token() }}" class="btn btn-primary loginUser">{{trans('common.login')}}</button>
            </div>
            <div class="col-xs-12 col-sm-6" >
                <button type="button"  class="btn btn-primary"><a style="color:white" href="{{action('UsersController@getForgotPassword')}}">{{trans('common.forgot_password')}}</a></button>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-3 col-xs-6 col-lg-offset-5 col-xs-offset-5" >
                <div class="social col-lg-offset-3" style="margin-left:0px">
                    <div class="inner">
                        <div class="col-lg-6 col-xs-6">
                            <div class="row">
                                <a href="#"><i id="google_icon"  class="custom-social social-icon google-plus"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-xs-6">
                            <div class="row">
                                <a href="#"><i id="facebook_icon" class="custom-social social-icon facebook"></i></a>
                            </div>
                        </div>
                    </div><!-- /.inner -->
                </div><!-- /.social -->
            </div><!-- /.col-md-5 -->
        </div>
    </div>
</div> 
{{-- Registration modal --}}
    <div class="modal fade" id="registration" tabindex="-1" role="dialog" hidden="true" aria-labelledby="edit">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title registration_text" id="exampleModalLabel">{{trans('common.reg')}}</h4>
                </div>
                @include('user.form.registration')
            </div>
      </div>
    </div>
{{-- End Registration modal --}}
