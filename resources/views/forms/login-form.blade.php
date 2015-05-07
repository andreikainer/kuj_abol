{!! Form::open(['class' => 'row', 'method' => 'post']) !!}

    <div class="col-xs-12 col-sm-9 form-group">
    	{!! Form::label(null, trans('register-page.username'), ['class' => 'form-label form-inline']) !!}
        {!! Form::text('username', null,
        		array('required',
              		'class'=>'form-input form-inline'))) !!}
    </div>
    {{--<div class="form-error none" data-error="username"></div>--}}
    {{--<div class="form-error">{{ $errors->first('username') }}</div>--}}

    <div class=" col-xs-12 col-sm-9form-group">
    	{!! Form::label(null, trans('register-page.password'), ['class' => 'form-label form-inline']) !!}
        {!! Form::password('password', null,
        		array('required',
              		'class'=>'form-input form-inline'))) !!}
    </div>
    {{--<div class="form-error none" data-error="password"></div>--}}
    {{--<div class="form-error">{{ $errors->first('password') }}</div>--}}

    {!! Form::submit('Search', ['class' => 'col-xs-12 col-sm-2 button-transparent module-submit', 'id' => 'search-for-this']) !!}

{!! Form::close() !!}