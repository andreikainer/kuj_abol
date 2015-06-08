<div class="row">
    <div class="col-md-12 col-sm-12">
        <div class="form-explanation">
            {!! trans('create-project-form.exp-project-title') !!}
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
                <div class="image-loader"></div>
                <div class="form-button text-center project-start-button" data-button="start" data-url="{{ url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/start')) }}">
                    {{ trans('create-project-form.start-project') }}
                </div>
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
                <!--@if(! isset($user) || is_null($user->incompleteProject->first()))-->
                <!--<div class="no-projects">-->
                    <!--<p>{{ trans('create-project-form.exp-no-recent-project-1') }}</p>-->
                    <!--<p>{{ trans('create-project-form.exp-no-recent-project-2') }}</p>-->
                <!--</div>-->
                <!--@else-->
                    <!--@foreach($user->incompleteProject as $project)-->
                    <!--<div class="project-links">-->
                        <!--<div class="row">-->
                            <!--<div class="col-md-6 col-sm-12">-->
                                <!--<p class="saved-project-title">{{ $project->project_name }}</p>-->
                            <!--</div>-->
                            <!--<div class="col-md-6 col-sm-12">-->
                                <!--<div class="row">-->
                                    <!--<div class="col-md-6 col-sm-6 col-xs-12 project-start-button">-->
                                        <!--<a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/edit').'/'.$project->slug) }}" class="saved-project-continue text-center">-->
                                            <!--<i class="fa fa-edit fa-lg"></i> {{ trans('create-project-form.continue') }}-->
                                        <!--</a>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-6 col-sm-6 col-xs-12 project-start-button">-->
                                        <!--<a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/delete').'/'.$project->slug) }}" class="saved-project-delete text-center">-->
                                            <!--<i class="fa fa-trash fa-lg"></i> {{ trans('create-project-form.delete') }}-->
                                        <!--</a>-->
                                    <!--</div>-->
                                <!--</div>-->
                            <!--</div>-->
                        <!--</div>-->
                    <!--</div>-->
                    <!--@endforeach-->
                <!--@endif-->
                @if( isset($user) && ! is_null($user->incompleteProject->first()))
                    @foreach($user->incompleteProject as $project)
                    <div class="project-links">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <p class="saved-project-title">{{ $project->project_name }}</p>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="row">
                                    <div class="col-md-6 col-sm-6 col-xs-12 project-start-button">
                                        <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/edit').'/'.$project->slug) }}" class="saved-project-continue text-center">
                                            <i class="fa fa-edit fa-lg"></i> {{ trans('create-project-form.continue') }}
                                        </a>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 project-start-button">
                                        <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.trans('routes.create-project/delete').'/'.$project->slug) }}" class="saved-project-delete text-center">
                                            <i class="fa fa-trash fa-lg"></i> {{ trans('create-project-form.delete') }}
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @elseif( isset($user) && ! is_null($user->submittedProject->first()))
                    @foreach($user->submittedProject as $project)
                    <div class="project-links">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <p class="saved-project-title">{{ $project->project_name }}</p>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <p class="project-pending-approval">{{ trans('create-project-form.pending-approval') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @elseif( isset($user) && ! is_null($user->currentLiveProject->first()))
                    @foreach($user->currentLiveProject as $project)
                    <div class="project-links">
                        <div class="row">
                            <div class="col-md-6 col-sm-12">
                                <p class="saved-project-title">{{ $project->project_name }}</p>
                            </div>
                            <div class="col-md-6 col-sm-12">
                                <p class="project-currently-live">{{ trans('create-project-form.currently-live') }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="no-projects">
                    <p>{{ trans('create-project-form.exp-no-recent-project-1') }}</p>
                    <p>{{ trans('create-project-form.exp-no-recent-project-2') }}</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div> <!-- end recently created projects -->