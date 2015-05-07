{!! Form::open(['class' => 'row', 'method' => 'post']) !!}

    <div class="col-xs-12 col-sm-12 form-group">
    	{!! Form::label(null, trans('register-page.email'), ['class' => 'form-label form-inline']) !!}
        {!! Form::email('email', null,
        		array('required',
              		'class'=>'form-input form-inline')) !!}
    </div>
    {{--<div class="form-error none" data-error="username"></div>--}}
    {{--<div class="form-error">{{ $errors->first('username') }}</div>--}}

    <div class="col-xs-12 col-sm-12 form-group">
    	{!! Form::label(null, trans('register-page.password'), ['class' => 'form-label form-inline']) !!}
        {!! Form::password('password', null,
        		array('required',
              		'class'=>'form-input form-inline')) !!}
    </div>
    {{--<div class="form-error none" data-error="password"></div>--}}
    {{--<div class="form-error">{{ $errors->first('password') }}</div>--}}

    <div class="col-xs-12 col-sm-12 form-group">
    		<div class="checkbox">
    			<label>
    				<input type="checkbox" name="remember"> Remember Me
    			</label>
    		</div>
    </div>

    {{--<div class="row">--}}
        {!! Form::submit('Search', ['class' => 'col-xs-12 col-sm-5 pull-left button-transparent module-submit mt-1em', 'id' => 'log-me-in']) !!}
        {!! Form::submit('Forgot password', ['class' => 'col-xs-12 col-sm-5 pull-right button-transparent module-submit mt-1em', 'id' => 'forgot-my-password']) !!}
    <!--</div>-->

{!! Form::close() !!}