
<div class="modal-body">
        <div class="input-group margin-bottom-20 message_error" style="color:red"></div>

        <div id="user" style=""> 
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.first_name')}}</label>
                {!! Form::text('firstname', null, ['placeholder' => trans('common.first_name') , 'class' => 'form-control review_firstname']) !!}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.last_name')}}</label>
                {!! Form::text('lastname', null, ['placeholder' => trans('common.last_name'), 'class' => 'form-control review_lastname']) !!}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.email')}}</label>
                {!! Form::email('email', null, ['placeholder' => trans('common.email'), 'class' => 'form-control review_email']) !!}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.password')}}</label>
                {!! Form::password('password',['placeholder' => trans('common.password'), 'class' => 'form-control review_password']) !!}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.confirm_password')}}</label>
                 {!! Form::password('password_confirmation',['placeholder' => trans('common.confirm_password'), 'class' => 'form-control review_password_confirmation']) !!}
            </div>
            <input type="hidden" class="reg_token" data-token="{{ csrf_token() }}">
            <div class="modal-footer">
                <div class="row">
                    <div style="padding:0" class="col-xs-12 col-sm-12">
                        <button type="button" class="btn btn-primary registration_review">{{trans('common.reg')}}</button>
                    </div>
                </div>
            </div>
        </div>
        
</div>
       
