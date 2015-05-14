<h3 class="text-center">{{ trans('userpanel.my-details') }}</h3>

<!-- if there are validation errors, show "Woops" message -->
<div class="form-group">
    @if($errors->any())
    <div class="form-error top-error"><i class="fa fa-exclamation-circle"></i> {{ trans('userpanel.form-error') }}</div>
    @endif
</div>

{!! Form::open(['class' => 'row', 'method' => 'post']) !!}

<!-- Username Form Input -->
<div class="col-xs-12 col-sm-5">
    {!! Form::label(null, trans('userpanel.username'), ['class' => 'form-label form-inline']) !!}
    {!! Form::text('user_name', null,
    array('required',
    'class'=>'form-input form-inline')) !!}
</div>
<div class="form-error none" data-error="user_name"></div>
<!-- end username input -->

 <label for="main_img" class="image-upload-label text-center">
    <p class="image-upload-label-heading">{{ trans('create-project-form.exp-main-image-1') }}</p>
    <p>
        {!! trans('create-project-form.exp-main-image-2') !!}
    </p>
    <p>
        {!! trans('create-project-form.exp-main-image-3') !!}
    </p>
</label>
{!! Form::file('main_img', ['id' => 'main_img', 'value' => '', 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}

<!-- Email Form Input -->
<div class="col-xs-12 col-sm-5 form-group">
    {!! Form::label(null, trans('userpanel.email'), ['class' => 'form-label form-inline']) !!}
    {!! Form::email('email', null,
    array('required',
    'class'=>'form-input form-inline')) !!}
</div>
<div class="form-error none" data-error="email"></div>
<!-- end email input -->

<!-- Firstname Form Input -->
<div class="col-xs-12 col-sm-5 form-group">
    {!! Form::label(null, trans('userpanel.f-name'), ['class' => 'form-label form-inline']) !!}
    {!! Form::text('first_name', null,
    array('required',
    'class'=>'form-input form-inline')) !!}
</div>
<div class="form-error none" data-error="first_name"></div>
<!-- end firstname input -->

<!-- Lastname Form Input -->
<div class="col-xs-12 col-sm-5 form-group">
    {!! Form::label(null, trans('userpanel.l-name'), ['class' => 'form-label form-inline']) !!}
    {!! Form::text('last_name', null,
    array('required',
    'class'=>'form-input form-inline')) !!}
</div>
<div class="form-error none" data-error="last_name"></div>
<!-- end lastname input -->

@if($user->business_name !== null)
    <!-- Companyname Form Input -->
    <div class="col-xs-12 col-sm-12 form-group">
        {!! Form::label(null, trans('userpanel.b-name'), ['class' => 'form-label form-inline']) !!}
        {!! Form::text('business_name', null,
        array('required',
        'class'=>'form-input form-inline')) !!}
    </div>
    <div class="form-error none" data-error="business_name"></div>
    <!-- end companyname input -->
@endif

<!-- Address Form Input -->
<div class="col-xs-12 col-sm-12 form-group">
    {!! Form::label(null, trans('userpanel.address'), ['class' => 'form-label form-inline']) !!}
    {!! Form::text('address', null,
    array('required',
    'class'=>'form-input form-inline')) !!}
</div>
<div class="form-error none" data-error="address"></div>
<!-- end address input -->

<!-- Phone Form Input -->
<div class="col-xs-12 col-sm-12 form-group">
    {!! Form::label(null, trans('userpanel.phone'), ['class' => 'form-label form-inline']) !!}
    {!! Form::text('tel_number', null,
    array('required',
    'class'=>'form-input form-inline')) !!}
</div>
<div class="form-error none" data-error="tel_number"></div>
<!-- end phone input -->




<!-- Submit buttons -->
<div class="col-xs-12 col-sm-12">
    <div class="row-fluid clearfix">
        {!! Form::submit(trans('userpanel.save-changes'), ['class' => 'col-xs-12 col-sm-6 col-md-5 pull-left btn login-submit button-main mt-1em text-center', 'id' => 'log-me-in']) !!}
        <a href="#" id="forgot-my-password" class="col-xs-12 col-sm-6 col-md-5 pull-right btn login-submit mt-1em text-center">{{ trans('userpanel.delete-account') }}</a>
    </div>
</div>
<!-- end submit buttons -->
{!! Form::close() !!}