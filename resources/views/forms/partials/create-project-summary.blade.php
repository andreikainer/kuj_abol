<div class="row form-group mb-3em">
    <div class="col-md-8 col-sm-8">
        <p>This is the summary page.</p>
    </div>
    <div class="col-md-4 col-sm-4">
        <div class="image-upload-wrapper">
            <div class="image-loader"></div>
            {!! Form::submit(trans('create-project-form.submit'), ['class' => 'form-button form-button-full-width']) !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="form-button form-button-nav text-center" data-button="back">{{ trans('create-project-form.back') }}</div>
    </div>
</div>