<div class="row">
            <div class="col-md-12 col-sm-12 text-right">
                <div class="image-upload-wrapper">
                    <div class="form-button form-button-secondary text-center" data-button="save">
                        <div class="image-loader"></div>
                        <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/save')) }}">
                            {{ trans('create-project-form.save-progress') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Short Description Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-6">
                        {!! Form::label('short_desc', trans('create-project-form.short-description'), ['class' => 'form-label']) !!}
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                        <div class="character-count"></div>
                    </div>
                </div>
                {!! Form::textarea('short_desc', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly', 'placeholder' => trans('create-project-form.place-short-desc')]) !!}
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="short_desc"></div>
            </div>
        </div> <!-- end short description -->

        <!-- Main Image Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                <div class="form-label">{{ trans('create-project-form.main-image') }}</div>
                <div class="image-upload-wrapper">
                    <img src="" alt="" class="image-upload-preview img-responsive"/>
                    <div class="image-upload-controls">
                        <div class="image-loader"></div>
                        <label for="main_img" class="image-upload-label form-input-disabled text-center">
                            <p class="image-upload-label-heading">{{ trans('create-project-form.exp-main-image-1') }}</p>
                            <p>
                                {!! trans('create-project-form.exp-main-image-2') !!}
                            </p>
                            <p>
                                {!! trans('create-project-form.exp-main-image-3') !!}
                            </p>
                        </label>
                        {!! Form::file('main_img', ['id' => 'main_img', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => 'image/*']) !!}
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="main_img"></div>
            </div>
        </div> <!-- end main image -->

        <!-- Secondary Image Form Inputs -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 form-label">{{ trans('create-project-form.secondary-images') }}</div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image-upload-wrapper">
                            <img src="" alt="" class="image-upload-preview img-responsive"/>
                            <div class="image-upload-controls">
                                <div class="image-loader"></div>
                                <label for="img_2" class="image-upload-label form-input-disabled text-center">
                                    <p class="image-upload-label-heading">{{ trans('create-project-form.exp-secondary-image') }}</p>
                                </label>
                                {!! Form::file('img_2', ['id' => 'img_2', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => 'image/*']) !!}
                                <div class="form-error cpp-error pad-zero" data-error="img_2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image-upload-wrapper">
                            <img src="" alt="" class="image-upload-preview img-responsive"/>
                            <div class="image-upload-controls">
                                <div class="image-loader"></div>
                                <label for="img_3" class="image-upload-label form-input-disabled text-center">
                                    <p class="image-upload-label-heading">{{ trans('create-project-form.exp-secondary-image') }}</p>
                                </label>
                                {!! Form::file('img_3', ['id' => 'img_3', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => 'image/*']) !!}
                                <div class="form-error cpp-error pad-zero" data-error="img_3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-4">
                        <div class="image-upload-wrapper">
                            <img src="" alt="" class="image-upload-preview img-responsive"/>
                            <div class="image-upload-controls">
                                <div class="image-loader"></div>
                                <label for="img_4" class="image-upload-label form-input-disabled text-center">
                                    <p class="image-upload-label-heading">{{ trans('create-project-form.exp-secondary-image') }}</p>
                                </label>
                                {!! Form::file('img_4', ['id' => 'img_4', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => 'image/*']) !!}
                                <div class="form-error cpp-error pad-zero" data-error="img_4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end secondary images -->

        <!-- Full Description Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('full_desc', trans('create-project-form.full-description'), ['class' => 'form-label']) !!}
                {!! Form::textarea('full_desc', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly', 'placeholder' => trans('create-project-form.place-full-desc')]) !!}
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="full_desc"></div>
            </div>
        </div> <!-- end full description -->

        <!-- Fundraise Amount Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('target_amount', trans('create-project-form.fundraise-amount'), ['class' => 'form-label']) !!}
                {!! Form::text('target_amount', null, ['class' => 'form-input form-input-disabled', 'readonly' => 'readonly', 'placeholder' => trans('create-project-form.place-fundraise-amt')]) !!}
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="target_amount"></div>
            </div>
        </div> <!-- end fundraise amount -->

        <div class="row form-group">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-button form-button-nav text-center" data-button="back">{{ trans('create-project-form.back') }}</div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                <div class="form-button form-button-nav text-center" data-button="next">{{ trans('create-project-form.next') }}</div>
            </div>
        </div>