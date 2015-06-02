<div class="row clearfix">
    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center">
        <h2 class="heading">{{ trans('userpanel.my-details') }}</h2>
    </div>
</div>

<!-- if there are validation errors, show "Woops" message -->
<div class="form-group">
    @if($errors->any())
    <div class="form-error top-error"><i class="fa fa-exclamation-circle"></i> {{ trans('userpanel.form-error') }}</div>
    @endif
</div>

{!! Form::open(['action' => 'UserpanelController@update', 'class' => 'row', 'method' => 'post', 'files' => 'true']) !!}

<div class="col-xs-12 clearfix">
    <div class="row">
        <div class="col-xs-12 col-sm-6">
            <div class="row">
                <!-- Username Form Input -->
                <div class="col-xs-12 form-group">
                    {!! Form::label('user_name', trans('userpanel.username'), ['class' => 'form-label form-inline']) !!}
                    {!! Form::text('user_name', $user->user_name,
                    array('required',
                    'class'=>'form-input form-inline form-input-disabled', 'readonly' => 'readonly')) !!}
                </div>
                <div class="form-error none pad" data-error="user_name"></div>
                <div class="form-error pad">{{ $errors->first('user_name') }}</div>
                <!-- end username input -->

                <!-- Email Form Input -->
                <div class="col-xs-12 form-group">
                    {!! Form::label('email', trans('userpanel.email'), ['class' => 'form-label form-inline']) !!}
                    {!! Form::email('email', $user->email,
                    array('required',
                    'class'=>'form-input form-inline')) !!}
                </div>
                <div class="form-error none pad" data-error="email"></div>
                <div class="form-error pad">{{ $errors->first('email') }}</div>
                <!-- end email input -->

                @if($user->business_name !== null)
                    <!-- Companyname Form Input -->
                    <div class="col-xs-12 col-sm-12 form-group">
                        {!! Form::label('business_name', trans('userpanel.b-name'), ['class' => 'form-label form-inline']) !!}
                        {!! Form::text('business_name', $user->business_name,
                        array('class'=>'form-input form-inline')) !!}
                        <div class="form-error none" data-error="business_name"></div>
                        <div class="form-error">{{ $errors->first('business_name') }}</div>
                    </div>
                    <!-- end companyname input -->
                @endif

            </div>
        </div>


        <div class="col-xs-12 col-sm-5 col-sm-push-1">
            <div class="row">
                <!-- Avatar Form Input -->
                <div class="col-xs-12 mt-2em">
                    <div class="image-upload-wrapper">
                        <img src="" alt="" class="image-upload-preview img-responsive"/>
                        <div class="image-upload-controls">
                            <div class="image-loader"></div>
                            <label for="avatar" class="image-upload-label text-center">
                                <img class="img-responsive center-block avatar" src="@if($user->avatar === null )
                                        {{ asset('img/avatars/avatar-placeholder.svg') }}"
                                    @else
                                        {{ asset('img/avatars/'.$user->avatar) }}"
                                    @endif
                                        alt="{{ $user->user_name }}" />
                                        <br>
                                        <i class="fa fa-upload"></i><p class="image-upload-label-heading">{{trans('userpanel.avatar-upload')}}</p>
                            </label>
                            {!! Form::file('avatar', ['id' => 'avatar', 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                             <div class="form-error none pad" data-error="avatar"></div>
                             <div class="form-error pad">{{ $errors->first('avatar') }}</div>
                        </div>
                    </div>
                </div>
                <!-- end avatar input -->
            </div>
        </div>
    </div>

    <!-- Delete account Modal message -->
    <div class="modal fade modal-message" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <p>{{ trans('userpanel.delete-message') }}</p>
                </div>
                <div class="modal-footer">
                    <button id="closing-btn" type="button" class="btn button-main button-user" data-dismiss="modal">{{ trans('view-project-page.close') }}</button>
                    <a href="{{ action('UserpanelController@delete', $user->id) }}"><button type="button" class="btn button-main">{{ trans('userpanel.delete-account') }}</button></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Firstname Form Input -->
        <div class="col-xs-12 col-sm-6 form-group">
            {!! Form::label('first_name', trans('userpanel.f-name'), ['class' => 'form-label form-inline']) !!}
            {!! Form::text('first_name', $user->first_name,
            array('required',
            'class'=>'form-input form-inline')) !!}
            <div class="form-error none" data-error="first_name"></div>
            <div class="form-error">{{ $errors->first('first_name') }}</div>
        </div>
        <!-- end firstname input -->

        <!-- Lastname Form Input -->
        <div class="col-xs-12 col-sm-6 form-group">
            {!! Form::label('last_name', trans('userpanel.l-name'), ['class' => 'form-label form-inline']) !!}
            {!! Form::text('last_name', $user->last_name,
            array('required',
            'class'=>'form-input form-inline')) !!}
            <div class="form-error none" data-error="last_name"></div>
            <div class="form-error">{{ $errors->first('last_name') }}</div>
        </div>
        <!-- end lastname input -->
    </div> <!-- /.row -->

    <div class="row">

        <!-- Street Form Input -->
        <div class="col-xs-12 col-sm-12 form-group">
            {!! Form::label('street', trans('create-project-form.street'), ['class' => 'form-label form-inline']) !!}
            {!! Form::text('street', $user->street,
            array('class'=>'form-input form-inline')) !!}
             <div class="form-error none" data-error="street"></div>
             <div class="form-error">{{ $errors->first('street') }}</div>
        </div>
        <!-- end street input -->

    </div> <!-- /.row -->

    <div class="row">

        <!-- Postcode Form Input -->
        <div class="col-xs-12 col-sm-6 form-group">
            {!! Form::label('postcode', trans('create-project-form.postcode'), ['class' => 'form-label form-inline']) !!}
            {!! Form::text('postcode', $user->postcode,
            array('class'=>'form-input form-inline')) !!}
             <div class="form-error none" data-error="postcode"></div>
             <div class="form-error">{{ $errors->first('postcode') }}</div>
        </div>
        <!-- end postcode input -->

        <!-- City Form Input -->
        <div class="col-xs-12 col-sm-6 form-group">
            {!! Form::label('city', trans('create-project-form.city'), ['class' => 'form-label form-inline']) !!}
            {!! Form::text('city', $user->city,
            array('class'=>'form-input form-inline')) !!}
             <div class="form-error none" data-error="city"></div>
             <div class="form-error">{{ $errors->first('city') }}</div>
        </div>
        <!-- end city input -->

    </div> <!-- /.row -->

    <div class="row">

        <!-- Country Form Input -->
        <div class="col-xs-12 col-sm-6 form-group">
            {!! Form::label('country', trans('create-project-form.country'), ['class' => 'form-label form-inline']) !!}
            {!! Form::text('country', $user->country,
            array('class'=>'form-input form-inline')) !!}
             <div class="form-error none" data-error="country"></div>
             <div class="form-error">{{ $errors->first('country') }}</div>
        </div>
        <!-- end country input -->

        <!-- Phone Form Input -->
        <div class="col-xs-12 col-sm-6 form-group">
            {!! Form::label('tel_number', trans('userpanel.phone'), ['class' => 'form-label form-inline']) !!}
            {!! Form::text('tel_number', $user->tel_number,
            array('class'=>'form-input form-inline')) !!}
             <div class="form-error none" data-error="tel_number"></div>
             <div class="form-error">{{ $errors->first('tel_number') }}</div>
        </div>
        <!-- end phone input -->

    </div> <!-- /.row -->

    <div class="row">

        <!-- Submit buttons -->
        <div class="col-xs-12 col-sm-12">
            <div class="row-fluid clearfix">
                {!! Form::submit(trans('userpanel.save-changes'), ['class' => 'col-xs-12 col-sm-5 col-md-5 pull-left btn login-submit button-main mt-1em text-center', 'id' => 'log-me-in']) !!}
                <a href="" class="col-xs-12 col-sm-5 col-md-5 pull-right mt-1em text-right" data-toggle="modal" data-target=".modal-message">{{ trans('userpanel.delete-account') }}</a>
            </div>
        </div>
        <!-- end submit buttons -->

    </div> <!-- /.row -->
</div>
{!! Form::close() !!}