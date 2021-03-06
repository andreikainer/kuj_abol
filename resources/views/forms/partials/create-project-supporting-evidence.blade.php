<div class="row">
            <div class="col-md-12 col-sm-12 text-right">
                <div class="image-upload-wrapper">
                    <div class="form-button form-button-secondary text-center form-save-button-disabled" data-button="save">
                        <div class="image-loader"></div>
                        <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/save')) }}">
                            {{ trans('create-project-form.save-progress') }}
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-explanation mt-1em">
            <p>
                {{ trans('create-project-form.exp-evidence-1') }}
            </p>
            <p>
                {{ trans('create-project-form.exp-evidence-2') }}
            </p>
            <p>
                {{ trans('create-project-form.exp-evidence-3') }}
            </p>
            <p>
                {{ trans('create-project-form.exp-evidence-4') }}
            </p>
        </div> <!-- end evidence explanation -->

        <!-- Documents of Evidence Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 form-label">{{ trans('create-project-form.main-documents') }} <span class="label-desc">{{ trans('create-project-form.exp-document-label') }}</span></div>
                    <div class="col-md-6 col-sm-6">
                        <div class="image-upload-wrapper">
                            <div class="embed-responsive embed-responsive-16by9 image-upload-preview">
                                <iframe src="" class="embed-responsive-item"></iframe>
                            </div>
                            <div class="image-upload-controls">
                                <div class="image-loader"></div>
                                <label for="doc_1_mand" class="image-upload-label form-input-disabled text-center">
                                    <span class="image-upload-label-heading">{{ trans('create-project-form.exp-document-input') }}</span>
                                </label>
                                {!! Form::file('doc_1_mand', ['id' => 'doc_1_mand', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg , .jpeg , .png , .bmp , .tiff , .pdf']) !!}
                                <div class="form-error cpp-error pad-zero" data-error="doc_1_mand"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="image-upload-wrapper">
                            <div class="embed-responsive embed-responsive-16by9 image-upload-preview">
                                <iframe src="" class="embed-responsive-item"></iframe>
                            </div>
                            <div class="image-upload-controls">
                                <div class="image-loader"></div>
                                <label for="doc_2_mand" class="image-upload-label form-input-disabled text-center">
                                    <span class="image-upload-label-heading">{{ trans('create-project-form.exp-document-input') }}</span>
                                </label>
                                {!! Form::file('doc_2_mand', ['id' => 'doc_2_mand', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg , .jpeg , .png , .bmp , .tiff , .pdf']) !!}
                                <div class="form-error cpp-error pad-zero" data-error="doc_2_mand"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end mandatory documents -->

        <!-- Documents of Evidence Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-md-12 col-sm-12 form-label">{{ trans('create-project-form.secondary-documents') }}</div>
                    <div class="col-md-6 col-sm-6 supporting-doc">
                        <div class="image-upload-wrapper">
                            <div class="embed-responsive embed-responsive-16by9 image-upload-preview">
                                <iframe src="" class="embed-responsive-item"></iframe>
                            </div>
                            <div class="image-upload-controls">
                                <div class="image-loader"></div>
                                <label for="doc_3" class="image-upload-label form-input-disabled text-center">
                                    <span class="image-upload-label-heading">{{ trans('create-project-form.exp-document-input') }}</span>
                                </label>
                                {!! Form::file('doc_3', ['id' => 'doc_3', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg , .jpeg , .png , .bmp , .tiff , .pdf']) !!}
                                <div class="form-error cpp-error pad-zero" data-error="doc_3"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 supporting-doc">
                        <div class="image-upload-wrapper">
                            <div class="embed-responsive embed-responsive-16by9 image-upload-preview">
                                <iframe src="" class="embed-responsive-item"></iframe>
                            </div>
                            <div class="image-upload-controls">
                                <div class="image-loader"></div>
                                <label for="doc_4" class="image-upload-label form-input-disabled text-center">
                                    <span class="image-upload-label-heading">{{ trans('create-project-form.exp-document-input') }}</span>
                                </label>
                                {!! Form::file('doc_4', ['id' => 'doc_4', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg , .jpeg , .png , .bmp , .tiff , .pdf']) !!}
                                <div class="form-error cpp-error pad-zero" data-error="doc_4"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="image-upload-wrapper">
                            <div class="embed-responsive embed-responsive-16by9 image-upload-preview">
                                <iframe src="" class="embed-responsive-item"></iframe>
                            </div>
                            <div class="image-upload-controls">
                                <div class="image-loader"></div>
                                <label for="doc_5" class="image-upload-label form-input-disabled text-center">
                                    <span class="image-upload-label-heading">{{ trans('create-project-form.exp-document-input') }}</span>
                                </label>
                                {!! Form::file('doc_5', ['id' => 'doc_5', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg , .jpeg , .png , .bmp , .tiff , .pdf']) !!}
                                <div class="form-error cpp-error pad-zero" data-error="doc_5"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <div class="image-upload-wrapper">
                            <div class="embed-responsive embed-responsive-16by9 image-upload-preview">
                                <iframe src="" class="embed-responsive-item"></iframe>
                            </div>
                            <div class="image-upload-controls">
                                <div class="image-loader"></div>
                                <label for="doc_6" class="image-upload-label form-input-disabled text-center">
                                    <span class="image-upload-label-heading">{{ trans('create-project-form.exp-document-input') }}</span>
                                </label>
                                {!! Form::file('doc_6', ['id' => 'doc_6', 'class' => 'image-upload-input', 'disabled' => 'disabled', 'accept' => '.jpg , .jpeg , .png , .bmp , .tiff , .pdf']) !!}
                                <div class="form-error cpp-error pad-zero" data-error="doc_6"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end additional documents -->

        <div class="row form-group">
            <div class="col-md-6 col-sm-6 col-xs-6">
                <div class="form-button form-button-nav text-center" data-button="back">{{ trans('create-project-form.back') }}</div>
            </div>
            <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                <div class="form-button form-button-nav text-center" data-button="next">{{ trans('create-project-form.next') }}</div>
            </div>
        </div>