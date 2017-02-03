
<div class="modal-body">
        <div class="input-group margin-bottom-20 message_error" style="color:red"></div>
        <fieldset class="form-group">
            <label for="exampleSelect1">{{trans('common.select_role')}}</label>
            <select id="select_role" class="form-control">
                <option >{{trans('common.user')}}</option>
                <option >{{trans('common.salon')}}</option>
            </select>
        </fieldset>
        <div id="user" style=""> 
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.first_name')}}</label>
                {!! Form::text('firstname', null, ['placeholder' => trans('common.first_name') , 'class' => 'form-control firstname']) !!}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.last_name')}}</label>
                {!! Form::text('lastname', null, ['placeholder' => trans('common.last_name'), 'class' => 'form-control lastname']) !!}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.email')}}</label>
                {!! Form::email('email', null, ['placeholder' => trans('common.email'), 'class' => 'form-control email']) !!}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.password')}}</label>
                {!! Form::password('password',['placeholder' => trans('common.password'), 'class' => 'form-control password']) !!}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.confirm_password')}}</label>
                 {!! Form::password('password_confirmation',['placeholder' => trans('common.confirm_password'), 'class' => 'form-control password_confirmation']) !!}
            </div>
            <input type="hidden" class="reg_token" data-token="{{ csrf_token() }}">
            <div class="modal-footer">
                <div class="row">
                    <div style="padding:0" class="col-xs-12 col-sm-12">
                        <button type="button" class="btn btn-primary registration">{{trans('common.reg')}}</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="salon" >
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.salon_name')}}</label>
                {!! Form::text('name', null, ['placeholder' => trans('common.salon_name'), 'class' => 'form-control salon_name']) !!} 
            </div>
          {{--   <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.photo')}}</label>
                <input type="hidden" class="token" alt="{{ csrf_token() }}">
                {!! Form::file('image', array('id' => 'photo', 'class' => 'salon_prof_image','style'=> 'display:none')) !!}
                <img class="salon_image" style="width: 100%;height: 101px;cursor:pointer" src="/assets/user/images/img17.jpg">
            </div> --}}
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.admin_salon')}}</label>
                {!! Form::text('firstname', null, ['placeholder' => trans('common.admin_salon'), 'class' => 'form-control admin_name']) !!}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.salon_subdomain')}}</label>
                {!! Form::text('sub_domain', null, ['placeholder' => trans('common.salon_subdomain'), 'class' => 'form-control sub_domain']) !!}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.admin_email')}}</label>
                {!! Form::text('email', null, ['placeholder' => trans('common.admin_email'), 'class' => 'form-control email_salon']) !!}
            </div>
            <div class="form-group">
                <label for="recipient-name" class="control-label">{{trans('common.admin_password')}}</label>
                {!! Form::password('password',  ['placeholder' => trans('common.admin_password'), 'class' => 'form-control password_salon']) !!}
            </div>
            <div class="modal-footer">
                <div class="row">
                    <div style="padding:0" class="col-xs-12 col-sm-12">
                        <button type="button" content="{{ csrf_token() }}"   class="btn btn-primary reg_salon">{{trans('common.reg')}}</button>
                    </div>
                </div>
            </div>
    </div>
</div>
       
