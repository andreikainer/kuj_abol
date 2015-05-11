<!-- if there are validation errors, show "Woops" message -->
    <div class="form-group">
        @if($errors->any())
            <div class="form-error"><i class="fa fa-exclamation-circle"></i> {{ trans('contact-page.woops') }}</div>
        @endif
    </div>
{!! Form::open(['data-remote', 'class' => 'row', 'method' => 'post']) !!}

<!-- Username Form Input -->
    <div class="col-xs-12 col-sm-12 form-group">
    	{!! Form::label(null, trans('register-page.username'), ['class' => 'form-label form-inline']) !!}
        {!! Form::text('username', null,
        		array('required',
              		'class'=>'form-input form-inline')) !!}
    </div>
    <div class="form-error none" data-error="username"></div>
<!-- end username input -->

<!-- Password Form Input -->
    <div class="col-xs-12 col-sm-12 form-group">
    	{!! Form::label(null, trans('register-page.password'), ['class' => 'form-label form-inline']) !!}
        {!! Form::password('password', null,
        		array('required',
              		'class'=>'form-input form-inline')) !!}
    </div>
    <div class="form-error none" data-error="password"></div>
<!-- end password input -->

<!-- Remember Form Input -->
    <div class="col-xs-12 col-sm-12 form-group">
    		<div class="checkbox">
    			<label>
    				<input type="checkbox" name="remember"> Remember Me
    			</label>
    		</div>
    </div>
<!-- end remember input -->

<!-- Submit buttons -->
    {{--<div class="row">--}}
        {!! Form::submit(trans('register-page.login'), ['class' => 'col-xs-12 col-sm-5 pull-left button-transparent login-submit mt-1em', 'id' => 'log-me-in']) !!}
        <a href="{{ url('/password/email') }}" id="forgot-my-password" class="col-xs-12 col-sm-5 pull-right button-transparent login-submit mt-1em">{{ trans('register-page.forgot-password') }}</a>

    <!--</div>-->
<!-- end submit buttons -->
{!! Form::close() !!}