<div class="row">
    <div class="col-md-8 col-sm-8">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <fieldset class="summary-group mt-0">
                    <legend>{{ trans('create-project-form.project-title') }}</legend>
                    <p data-field="project_name"></p>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <fieldset class="summary-group">
                    <legend>{{ trans('create-project-form.short-description') }}</legend>
                    <p data-field="short_desc"></p>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <fieldset class="summary-group">
                    <legend>{{ trans('create-project-form.full-description') }}</legend>
                    <p data-field="full_desc"></p>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <fieldset class="summary-group">
                    <legend>{{ trans('create-project-form.fundraise-amount') }}</legend>
                    <p data-field="target_amount"></p>
                </fieldset>
            </div>
            <div class="col-md-6 col-sm-6">
                <fieldset class="summary-group">
                    <legend>{{ trans('create-project-form.child-name') }}</legend>
                    <p data-field="child_name"></p>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <fieldset class="summary-group">
                    <legend>{{ trans('create-project-form.first-name') }}</legend>
                    <p data-field="first_name"></p>
                </fieldset>
            </div>
            <div class="col-md-6 col-sm-6">
                <fieldset class="summary-group">
                    <legend>{{ trans('create-project-form.last-name') }}</legend>
                    <p data-field="last_name"></p>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 col-sm-6">
                <fieldset class="summary-group">
                    <legend>{{ trans('create-project-form.email') }}</legend>
                    <p data-field="email"></p>
                </fieldset>
            </div>
            <div class="col-md-6 col-sm-6">
                <fieldset class="summary-group">
                    <legend>{{ trans('create-project-form.tel-number') }}</legend>
                    <p data-field="tel_number"></p>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <fieldset class="summary-group">
                    <legend>{{ trans('create-project-form.address') }}</legend>
                    <p data-field="address"></p>
                </fieldset>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <fieldset class="summary-group">
                    <legend>{{ trans('create-project-form.images-and-documents') }}</legend>
                    <ul class="summary-list">

                    </ul>
                </fieldset>
            </div>
        </div>
    </div>
    <div class="col-md-4 col-sm-4 summary-page-button">
        <div class="image-upload-wrapper">
            <div class="image-loader"></div>
            {!! Form::submit(trans('create-project-form.submit'), ['class' => 'form-button form-button-full-width']) !!}
        </div>
        <p class="terms-and-conditions">
            {{ trans('create-project-form.terms-cond-1') }}<a href="{{ asset('documents/terms-and-conditions.pdf') }}">{{ trans('create-project-form.terms-cond-2') }}</a>
        </p>
    </div>
</div>

<div class="row form-group">
    <div class="col-md-6 col-sm-6 col-xs-6">
        <div class="form-button form-button-nav text-center" data-button="back">{{ trans('create-project-form.back') }}</div>
    </div>
</div>