<!-- if there are validation errors, show "Woops" message -->
    <div class="form-group">
        @if($errors->any())
            <div class="form-error top-error"><i class="fa fa-exclamation-circle"></i> {{ trans('login-page.email-fail') }}</div>
        @endif
    </div>

{!! Form::open(['action' => 'Auth\PasswordController@postEmail', 'class' => 'row', 'method' => 'post']) !!}

<!-- Email Form Input -->
    <div class="col-xs-12 col-sm-12 form-group">
    	{!! Form::label(null, trans('login-page.email'), ['class' => 'form-label form-inline']) !!}
        {!! Form::text('email', null,
        		array('required',
              		'class'=>'form-input form-inline',
              		'placeholder'=>trans('login-page.place-email'))) !!}
    </div>
    <div class="form-error none" data-error="email"></div>
    <div class="form-error">{{$errors->first('email')}}</div>
<!-- end email input -->

<!-- Submit button -->
    <div class="form-group col-xs-12 clearfix">
    	{!! Form::submit(trans('login-page.send'),
      		array('class'=>'btn btn-primary button-main-big mt-1em',
      		      'id' => 'send-reset')) !!}
    </div>
<!-- end submit button -->

{!! Form::close() !!}