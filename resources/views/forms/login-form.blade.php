<!-- if there are validation errors, show "Woops" message -->
    <div class="form-group">
        @if($errors->any())
            <div class="form-error top-error"><i class="fa fa-exclamation-circle"></i> {{ trans('login-page.login-fail') }}</div>
        @endif
    </div>
{!! Form::open(['action' => 'Auth\AuthController@postLogin', 'class' => 'row', 'method' => 'post']) !!}

<!-- Username Form Input -->
    <div class="col-xs-12 col-sm-12 form-group">
    	{!! Form::label(null, trans('login-page.username'), ['class' => 'form-label form-inline']) !!}
        {!! Form::text('user_name', null,
        		array('required',
              		'class'=>'form-input form-inline',
              		'placeholder'=>trans('login-page.place-username'))) !!}
    </div>
    <div class="form-error none" data-error="user_name"></div>
<!-- end username input -->

<!-- Password Form Input -->
    <div class="col-xs-12 col-sm-12 form-group">
    	{!! Form::label(null, trans('login-page.password'), ['class' => 'form-label form-inline']) !!}
        {!! Form::password('password',
                array('required',
                    'class'=>'form-input form-inline',
                    'placeholder'=>trans('login-page.place-password'))) !!}
    </div>
    <div class="form-error none" data-error="password"></div>
<!-- end password input -->

<!-- Remember Form Input -->
    <div class="col-xs-12 col-sm-12 form-group">
        {!! Form::checkbox('remember', null) !!}
        {!! Form::label(null, trans('login-page.remember-me')) !!}
    </div>
<!-- end remember input -->

<!-- Submit buttons -->
<div class="col-xs-12 col-sm-12">
    <div class="row-fluid clearfix">
        {!! Form::submit(trans('login-page.login'), ['class' => 'col-xs-12 col-sm-6 col-md-5 pull-left btn login-submit button-main mt-1em text-center', 'id' => 'log-me-in']) !!}
        <a href="{{ action('Auth\PasswordController@getEmail') }}" id="forgot-my-password" class="col-xs-12 col-sm-6 col-md-5 pull-right btn login-submit mt-1em text-center">{{ trans('login-page.forgot-password') }}</a>
    </div>
</div>
<!-- end submit buttons -->
{!! Form::close() !!}