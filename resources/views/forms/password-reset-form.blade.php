<!-- if there are validation errors, show "Woops" message -->
    <div class="form-group">
        @if($errors->any())
            <div class="form-error top-error"><i class="fa fa-exclamation-circle"></i> {{ trans('login-page.email-fail') }}</div>
        @endif
    </div>

{!! Form::open(['action' => 'Auth\PasswordController@postReset', 'method' => 'post']) !!}

<!-- Email Form Input -->
    <div class="form-group">
    	{!! Form::label(null, trans('login-page.email'), ['class' => 'form-label form-inline']) !!}
   	    {!! Form::text('email', Input::old('email'),
        		array('required',
              		'class'=>'form-input form-inline')) !!}
    </div>
    <div class="form-error none" data-error="email"></div>
    <div class="form-error">{{ $errors->first('email') }}</div>
<!-- end email input -->

<!-- Password Form Input -->
    <div class="form-group">
    	{!! Form::label(null, trans('login-page.password'), ['class' => 'form-label']) !!}
    	{!! Form::password('password',
        		array('required',
              		'class'=>'form-input')) !!}
    </div>
    <div class="form-error none" data-error="password"></div>
    <div class="form-error">{{$errors->first('password')}}</div>
<!-- end password input -->

<!-- Password_confirmation Form Input -->
    <div class="form-group">
    	{!! Form::label(null, trans('login-page.password-confirmation'), ['class' => 'form-label']) !!}
    	{!! Form::password('password_confirmation',
        		array('required',
              		'class'=>'form-input')) !!}
    </div>
    <div class="form-error none" data-error="password_confirmation"></div>
    <div class="form-error">{{$errors->first('password_confirmation')}}</div>
<!-- end password_confirmation input -->

<!-- Token Form Input -->
    <div class="form-group hidden">
    	{!! Form::label(null, trans('login-page.password-confirmation'), ['class' => 'form-label']) !!}
    	{!! Form::text('token', $token,
        		array('required')) !!}
    </div>
<!-- end token input -->


<!-- Submit button -->
    <div class="form-group clearfix">
    	{!! Form::submit(trans('login-page.reset-password'),
      		array('class'=>'col-xs-12 col-sm-3 btn btn-primary button-main-big',
      		      'id' => 'password-reset')) !!}
    </div>
<!-- end submit button -->

{!! Form::close() !!}