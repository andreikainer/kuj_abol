<h3 class="text-center">{{ trans('userpanel.my-details') }}</h3>

<!-- if there are validation errors, show "Woops" message -->
<div class="form-group">
    @if($errors->any())
    <div class="form-error top-error"><i class="fa fa-exclamation-circle"></i> {{ trans('userpanel.form-error') }}</div>
    @endif
</div>

{!! Form::open(['action' => 'UserpanelController@update', 'class' => 'row', 'method' => 'post']) !!}

<div class="col-xs-12">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="row">
                <!-- Username Form Input -->
                <div class="col-xs-12 form-group">
                    {!! Form::label(null, trans('userpanel.username'), ['class' => 'form-label form-inline']) !!}
                    {!! Form::text('user_name', $user->user_name,
                    array('required',
                    'class'=>'form-input form-inline')) !!}
                </div>
                <div class="form-error none pad" data-error="user_name"></div>
                <div class="form-error pad">{{ $errors->first('user_name') }}</div>
                <!-- end username input -->

                <!-- Email Form Input -->
                <div class="col-xs-12 form-group">
                    {!! Form::label(null, trans('userpanel.email'), ['class' => 'form-label form-inline']) !!}
                    {!! Form::email('email', $user->email,
                    array('required',
                    'class'=>'form-input form-inline')) !!}
                </div>
                <div class="form-error none pad" data-error="email"></div>
                <div class="form-error pad">{{ $errors->first('email') }}</div>
                <!-- end email input -->
            </div>
        </div>


        <div class="col-xs-12 col-sm-5 col-sm-push-1">
            <div class="row">
                <!-- Avatar Form Input -->
                <div class="col-xs-12 mt-2em">
                    <label for="main_img" class="image-upload-label text-center">
                        <img class="img-responsive center-block avatar" src="@if($user->avatar === null )
                                {{ asset('img/avatars/avatar-placeholder.svg') }}"
                            @else
                                {{ asset('img/avatars/'.$user->avatar) }}"
                            @endif
                                alt="{{ $user->user_name }}" />
                                <br>
                                <i class="fa fa-upload"></i><p>{{trans('userpanel.avatar-upload')}}</p>
                    </label>
                    {!! Form::file('main_img', ['id' => 'main_img', 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                </div>
                <!-- end avatar input -->
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Firstname Form Input -->
        <div class="col-xs-12 col-sm-6 form-group">
            {!! Form::label(null, trans('userpanel.f-name'), ['class' => 'form-label form-inline']) !!}
            {!! Form::text('first_name', $user->first_name,
            array('required',
            'class'=>'form-input form-inline')) !!}
            <div class="form-error none" data-error="first_name"></div>
            <div class="form-error">{{ $errors->first('first_name') }}</div>
        </div>

        <!-- end firstname input -->

        <!-- Lastname Form Input -->
        <div class="col-xs-12 col-sm-6 form-group">
            {!! Form::label(null, trans('userpanel.l-name'), ['class' => 'form-label form-inline']) !!}
            {!! Form::text('last_name', $user->last_name,
            array('required',
            'class'=>'form-input form-inline')) !!}
            <div class="form-error none" data-error="last_name"></div>
            <div class="form-error">{{ $errors->first('last_name') }}</div>
        </div>
        <!-- end lastname input -->

        @if($user->business_name !== null)
            <!-- Companyname Form Input -->
            <div class="col-xs-12 col-sm-12 form-group">
                {!! Form::label(null, trans('userpanel.b-name'), ['class' => 'form-label form-inline']) !!}
                {!! Form::text('business_name', $user->business_name,
                array('class'=>'form-input form-inline')) !!}
                <div class="form-error none" data-error="business_name"></div>
                <div class="form-error">{{ $errors->first('business_name') }}</div>
            </div>
            <!-- end companyname input -->
        @endif

        <!-- Address Form Input -->
        <div class="col-xs-12 col-sm-6 form-group">
            {!! Form::label(null, trans('userpanel.address'), ['class' => 'form-label form-inline']) !!}
            {!! Form::text('address', $user->address,
            array('class'=>'form-input form-inline')) !!}
             <div class="form-error none" data-error="address"></div>
             <div class="form-error">{{ $errors->first('address') }}</div>
        </div>
        <!-- end address input -->

        <!-- Phone Form Input -->
        <div class="col-xs-12 col-sm-6 form-group">
            {!! Form::label(null, trans('userpanel.phone'), ['class' => 'form-label form-inline']) !!}
            {!! Form::text('tel_number', $user->tel_number,
            array('class'=>'form-input form-inline')) !!}
             <div class="form-error none" data-error="tel_number"></div>
             <div class="form-error">{{ $errors->first('tel_number') }}</div>
        </div>
        <!-- end phone input -->




        <!-- Submit buttons -->
        <div class="col-xs-12 col-sm-12">
            <div class="row-fluid clearfix">
                {!! Form::submit(trans('userpanel.save-changes'), ['class' => 'col-xs-12 col-sm-5 col-md-5 pull-left btn login-submit button-main mt-1em text-center', 'id' => 'log-me-in']) !!}
                <a href="{{ action('UserpanelController@delete', $user->id) }}" id="forgot-my-password" class="col-xs-12 col-sm-5 col-md-5 pull-right btn login-submit mt-1em text-center">{{ trans('userpanel.delete-account') }}</a>
            </div>
        </div>
        <!-- end submit buttons -->
    </div>
</div>
{!! Form::close() !!}