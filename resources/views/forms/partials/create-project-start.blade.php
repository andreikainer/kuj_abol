<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-explanation">
            {{ trans('create-project-form.exp-project-title') }}
        </div>
    </div>
</div>

        <!-- Project Title Form Input -->
<div class="row form-group">
    <div class="col-md-12 col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                {!! Form::label('project_name', trans('create-project-form.project-title'), ['class' => 'form-label']) !!}
            </div>
            <div class="col-md-8 col-sm-8">
                {!! Form::text('project_name', null, ['class' => 'form-input']) !!}
                <div class="form-error cpp-error pad-zero" data-error="project_name"></div>
            </div>
            <div class="col-md-4 col-sm-4">
                <div class="form-button text-center" data-button="start">{{ trans('create-project-form.start-project') }}</div>
            </div>
        </div>
    </div>
</div> <!-- end project title -->

        <!-- Recently Created Projects -->
<div class="row mt-2em">
    <div class="col-md-12 col-sm-12">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="form-explanation">
                    {{ trans('create-project-form.exp-recent-project') }}
                </div>
            </div>
            <div class="col-md-12 col-sm-12">
                @if(! isset($user) || is_null($user->incompleteProject))
                <div class="no-projects">
                    <p>{{ trans('create-project-form.exp-no-recent-project-1') }}</p>
                    <p>{{ trans('create-project-form.exp-no-recent-project-2') }}</p>
                </div>
                @else
                <div class="project-links">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <p class="saved-project-title">{{ $user->incompleteProject->project_name }}</p>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/edit').'/'.$user->incompleteProject->slug) }}" class="saved-project-continue text-center">
                                        <i class="fa fa-edit fa-lg"></i> {{ trans('create-project-form.continue') }}
                                    </a>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-6">
                                    <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/delete').'/'.$user->incompleteProject->slug) }}" class="saved-project-delete text-center">
                                        <i class="fa fa-trash fa-lg"></i> {{ trans('create-project-form.delete') }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
</div> <!-- end recently created projects -->