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
                {!! Form::textarea('short_desc', null, ['class' => 'form-input', 'placeholder' => trans('create-project-form.place-short-desc')]) !!}
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
                    @if(count($project->mainImage))
                        @foreach($project->mainImage as $image)
                            <span class="image-upload-close-button">X</span>
                            <img src="{{ asset('img/'.$project->slug.'/medium/'.$image->filename) }}" alt="{{ $project->slug }}" class="image-upload-preview img-responsive display"/>
                            <input type="hidden" name="mainImage" value="{{ $image->filename }}"/>
                            <div class="image-upload-controls display-none">
                                 <div class="image-loader"></div>
                                <label for="main_img" class="image-upload-label text-center">
                                    <span class="image-upload-label-heading">{{ trans('create-project-form.exp-main-image-1') }}</span>
                                    <span>
                                        {!! trans('create-project-form.exp-main-image-2') !!}
                                    </span>
                                    <span>
                                        {!! trans('create-project-form.exp-main-image-3') !!}
                                    </span>
                                </label>
                                {!! Form::file('main_img', ['id' => 'main_img', 'value' => $image->filename, 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                            </div>
                        @endforeach
                    @else
                    <img src="#" alt="#" class="image-upload-preview img-responsive"/>
                    <div class="image-upload-controls">
                        <div class="image-loader"></div>
                        <label for="main_img" class="image-upload-label text-center">
                            <span class="image-upload-label-heading">{{ trans('create-project-form.exp-main-image-1') }}</span>
                            <span>
                                {!! trans('create-project-form.exp-main-image-2') !!}
                            </span>
                            <span>
                                {!! trans('create-project-form.exp-main-image-3') !!}
                            </span>
                        </label>
                        {!! Form::file('main_img', ['id' => 'main_img', 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                    </div>
                    @endif
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
                    @if(count($project->secondaryImages))
                        @for($i = 0; $i < count($project->secondaryImages); $i++)
                            <div class="col-md-4 col-sm-4">
                                <div class="image-upload-wrapper">
                                    <span class="image-upload-close-button">X</span>
                                    <img src="{{ asset('img/'.$project->slug.'/medium/'.$project->secondaryImages[$i]->filename) }}" alt="{{ $project->slug }}" class="image-upload-preview img-responsive display"/>
                                    <input type="hidden" name="{{ 'img'.(2+$i) }}" value="{{ $project->secondaryImages[$i]->filename }}"/>
                                    <div class="image-upload-controls display-none">
                                        <div class="image-loader"></div>
                                        <label for="{{ 'img_'.(2+$i) }}" class="image-upload-label text-center">
                                            <span class="image-upload-label-heading">{{ trans('create-project-form.exp-secondary-image') }}</span>
                                        </label>
                                        {!! Form::file('img_'.(2+$i), ['id' => 'img_'.(2+$i), 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                                        <div class="form-error cpp-error pad-zero" data-error="{{ 'img_'.(2+$i) }}"></div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                        @if(count($project->secondaryImages) < 3)
                            @for($i = 0; $i < (3-count($project->secondaryImages)); $i++)
                                <div class="col-md-4 col-sm-4">
                                    <div class="image-upload-wrapper">
                                        <img src="#" alt="#" class="image-upload-preview img-responsive"/>
                                        <div class="image-upload-controls">
                                            <div class="image-loader"></div>
                                            <label for="{{ 'img_'.((count($project->secondaryImages)+2)+$i) }}" class="image-upload-label text-center">
                                                <span class="image-upload-label-heading">{{ trans('create-project-form.exp-secondary-image') }}</span>
                                            </label>
                                            {!! Form::file('img_'.((count($project->secondaryImages)+2)+$i), ['id' => 'img_'.((count($project->secondaryImages)+2)+$i), 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                                            <div class="form-error cpp-error pad-zero" data-error="{{ 'img_'.((count($project->secondaryImages)+2)+$i) }}"></div>
                                        </div>
                                    </div>
                                </div>
                            @endfor
                        @endif
                    @else
                        <div class="col-md-4 col-sm-4">
                            <div class="image-upload-wrapper">
                                <img src="#" alt="#" class="image-upload-preview img-responsive"/>
                                <div class="image-upload-controls">
                                    <div class="image-loader"></div>
                                    <label for="img_2" class="image-upload-label text-center">
                                        <span class="image-upload-label-heading">{{ trans('create-project-form.exp-secondary-image') }}</span>
                                    </label>
                                    {!! Form::file('img_2', ['id' => 'img_2', 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                                    <div class="form-error cpp-error pad-zero" data-error="img_2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="image-upload-wrapper">
                                <img src="#" alt="#" class="image-upload-preview img-responsive"/>
                                <div class="image-upload-controls">
                                    <div class="image-loader"></div>
                                    <label for="img_3" class="image-upload-label text-center">
                                        <span class="image-upload-label-heading">{{ trans('create-project-form.exp-secondary-image') }}</span>
                                    </label>
                                    {!! Form::file('img_3', ['id' => 'img_3', 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                                    <div class="form-error cpp-error pad-zero" data-error="img_3"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-sm-4">
                            <div class="image-upload-wrapper">
                                <img src="#" alt="#" class="image-upload-preview img-responsive"/>
                                <div class="image-upload-controls">
                                    <div class="image-loader"></div>
                                    <label for="img_4" class="image-upload-label text-center">
                                        <span class="image-upload-label-heading">{{ trans('create-project-form.exp-secondary-image') }}</span>
                                    </label>
                                    {!! Form::file('img_4', ['id' => 'img_4', 'class' => 'image-upload-input', 'accept' => 'image/*']) !!}
                                    <div class="form-error cpp-error pad-zero" data-error="img_4"></div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div> <!-- end secondary images -->

        <!-- Full Description Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('full_desc', trans('create-project-form.full-description'), ['class' => 'form-label']) !!}
                {!! Form::textarea('full_desc', null, ['class' => 'form-input', 'placeholder' => trans('create-project-form.place-full-desc')]) !!}
            </div>
            <div class="col-md-12 col-sm-12">
                <div class="form-error cpp-error pad-zero" data-error="full_desc"></div>
            </div>
        </div> <!-- end full description -->

        <!-- Fundraise Amount Form Input -->
        <div class="row form-group">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('target_amount', trans('create-project-form.fundraise-amount'), ['class' => 'form-label']) !!}
                {!! Form::text('target_amount', null, ['class' => 'form-input', 'placeholder' => trans('create-project-form.place-fundraise-amt')]) !!}
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