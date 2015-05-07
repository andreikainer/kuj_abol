{!! Form::open(['id' => 'register-page']) !!}
    <div class="col-md-12 col-sm-12">
        <!-- Username Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('user_name', trans('register-page.username'), ['class' => 'form-label']) !!}
                @if($errors->first('user_name'))
                {!! Form::text('user_name', null, ['class' => 'form-input form-input-error']) !!}
                @else
                {!! Form::text('user_name', null, ['class' => 'form-input']) !!}
                @endif
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('user_name') }}</div>
                <div class="form-error cpp-error pad-zero" data-error="user_name"></div>
            </div>
        </div> <!-- end username -->

        <!-- Email Address Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('email', trans('register-page.email'), ['class' => 'form-label']) !!}
                @if($errors->first('email'))
                {!! Form::text('email', null, ['class' => 'form-input form-input-error']) !!}
                @else
                {!! Form::text('email', null, ['class' => 'form-input']) !!}
                @endif
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('email') }}</div>
                <div class="form-error cpp-error pad-zero" data-error="email"></div>
            </div>
        </div> <!-- end email -->

        <!-- Password Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('password', trans('register-page.password'), ['class' => 'form-label']) !!}
                @if($errors->first('password'))
                {!! Form::password('password', ['class' => 'form-input form-input-error']) !!}
                @else
                {!! Form::password('password', ['class' => 'form-input']) !!}
                @endif
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('password') }}</div>
                <div class="form-error cpp-error pad-zero" data-error="password"></div>
            </div>
        </div> <!-- end password -->

        <!-- Password Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('password_confirmation', trans('register-page.conf-password'), ['class' => 'form-label']) !!}
                @if($errors->first('password_confirmation'))
                {!! Form::password('password_confirmation', ['class' => 'form-input form-input-error']) !!}
                @else
                {!! Form::password('password_confirmation', ['class' => 'form-input']) !!}
                @endif
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('password_confirmation') }}</div>
                <div class="form-error cpp-error pad-zero" data-error="password_confirmation"></div>
            </div>
        </div> <!-- end confirm password -->

        <!-- First Name Form Input -->
        <!-- Last Name Form Input -->
        <div class="row form-group mt-2em">
            <div class="col-md-6 col-sm-6">
                {!! Form::label('first_name', trans('register-page.first-name'), ['class' => 'form-label']) !!}
                @if($errors->first('first_name'))
                {!! Form::text('first_name', null, ['class' => 'form-input form-input-error']) !!}
                @else
                {!! Form::text('first_name', null, ['class' => 'form-input']) !!}
                @endif
                <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('first_name') }}</div>
                <div class="form-error cpp-error pad-zero" data-error="first_name"></div>
            </div>
            <div class="col-md-6 col-sm-6">
                {!! Form::label('last_name', trans('register-page.last-name'), ['class' => 'form-label']) !!}
                @if($errors->first('last_name'))
                {!! Form::text('last_name', null, ['class' => 'form-input form-input-error']) !!}
                @else
                {!! Form::text('last_name', null, ['class' => 'form-input']) !!}
                @endif
                <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('last_name') }}</div>
                <div class="form-error cpp-error pad-zero" data-error="last_name"></div>
            </div>
        </div> <!-- end first name --> <!-- end last name -->

        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                <div class="checkbox-wrapper">
                    {!! Form::label('business_yes', trans('register-page.business?')) !!}
                    {!! Form::checkbox('business_yes') !!}
                </div>
            </div>
        </div>

        <div class="row form-group business-name-wrapper">
            <div class="col-md-12 col-sm-12">
               {!! Form::label('business_name', trans('register-page.business-name'), ['class' => 'form-label']) !!}
               @if($errors->first('business_name'))
               {!! Form::text('business_name', null, ['class' => 'form-input form-input-error']) !!}
               @else
               {!! Form::text('business_name', null, ['class' => 'form-input']) !!}
               @endif
               <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('business_name') }}</div>
               <div class="form-error cpp-error pad-zero" data-error="business_name"></div>
            </div>
        </div>

        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                {!! Form::submit(trans('register-page.submit'), ['action' => 'Auth\AuthController@postRegister', 'class' => 'form-button form-button-full-width']) !!}
            </div>
        </div>
    </div>
{!! Form::close() !!}