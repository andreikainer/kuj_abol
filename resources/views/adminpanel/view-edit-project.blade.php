@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 form-element mt-1em">
                <div class="row mb-3em">
                    <div class="col-md-12 col-sm-12">
                        <div class="form-label">{{ trans('adminpanel.project-owner') }}</div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="project-owner-details">
                            <div class="row">
                                <div class="col-md-12 col-sm-12">
                                    <p><i class="fa fa-user"></i>{{ $project->user->first_name.' '.$project->user->last_name }}</p>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p><i class="fa fa-envelope"></i>{{ $project->user->email }}</p>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p><i class="fa fa-phone"></i>{{ $project->user->tel_number }}</p>
                                </div>
                                <div class="col-md-12 col-sm-12">
                                    <p><i class="fa fa-home"></i>{{ $project->user->address }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {!! Form::model($project, ['method' => 'PATCH', 'action' => array('AdminController@patchEditProject', $project->slug)]) !!}
                    <div class="row">
                        <div class="col-md-12 col-sm-12 text-right">
                            <p class="btn_sec">{{ trans('adminpanel.click-edit') }}</p>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-md-12 col-sm-12">
                            {!! Form::label('project_name', trans('create-project-form.project-title'), ['class' => 'form-label']) !!}
                            @if($errors->first('project_name'))
                                <p class="admin-preview-element display-none">{{ $project->project_name }}</p>
                                {!! Form::text('project_name', $project->project_name, ['class' => 'form-input form-input-error']) !!}
                            @else
                                <p class="admin-preview-element">{{ $project->project_name }}</p>
                                {!! Form::text('project_name', $project->project_name, ['class' => 'form-input display-none']) !!}
                            @endif
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-error cpp-error pad-zero" data-error="project_name"></div>
                            <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('project_name') }}</div>
                        </div>
                    </div>

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
                            @if($errors->first('short_desc'))
                                <p class="admin-preview-element display-none">{{ $project->short_desc }}</p>
                                {!! Form::textarea('short_desc', $project->short_desc, ['class' => 'form-input form-input-error']) !!}
                            @else
                                <p class="admin-preview-element">{{ $project->short_desc }}</p>
                                {!! Form::textarea('short_desc', $project->short_desc, ['class' => 'form-input display-none']) !!}
                            @endif
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-error cpp-error pad-zero" data-error="short_desc"></div>
                            <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('short_desc') }}</div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12 col-sm-12">
                            {!! Form::label('full_desc', trans('create-project-form.full-description'), ['class' => 'form-label']) !!}
                            @if($errors->first('full_desc'))
                                <p class="admin-preview-element display-none">{{ $project->full_desc }}</p>
                                {!! Form::textarea('full_desc', $project->full_desc, ['class' => 'form-input form-input-error']) !!}
                            @else
                                <p class="admin-preview-element">{{ $project->full_desc }}</p>
                                {!! Form::textarea('full_desc', $project->full_desc, ['class' => 'form-input display-none']) !!}
                            @endif
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-error cpp-error pad-zero" data-error="full_desc"></div>
                            <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('full_desc') }}</div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12 col-sm-12">
                            {!! Form::label('target_amount', trans('create-project-form.fundraise-amount'), ['class' => 'form-label']) !!}
                            @if($errors->first('target_amount'))
                                <p class="admin-preview-element display-none">{{ $project->target_amount }}</p>
                                {!! Form::text('target_amount', $project->target_amount, ['class' => 'form-input form-input-error']) !!}
                            @else
                                <p class="admin-preview-element">{{ $project->target_amount }}</p>
                                {!! Form::text('target_amount', $project->target_amount, ['class' => 'form-input display-none']) !!}
                            @endif
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-error cpp-error pad-zero" data-error="target_amount"></div>
                            <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('target_amount') }}</div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12 col-sm-12">
                            {!! Form::label('child_name', trans('create-project-form.child-name'), ['class' => 'form-label']) !!}
                            @if($errors->first('child_name'))
                                <p class="admin-preview-element display-none">{{ $project->child_name }}</p>
                                {!! Form::text('child_name', $project->child_name, ['class' => 'form-input form-input-error']) !!}
                            @else
                                <p class="admin-preview-element">{{ $project->child_name }}</p>
                                {!! Form::text('child_name', $project->child_name, ['class' => 'form-input display-none']) !!}
                            @endif
                        </div>
                        <div class="col-md-12 col-sm-12">
                            <div class="form-error cpp-error pad-zero" data-error="child_name"></div>
                            <div class="form-error cpp-error pad-zero display-block">{{ $errors->first('child_name') }}</div>
                        </div>
                    </div>

                    <div class="row form-group">
                        <div class="col-md-12 col-sm-12">
                            {!! Form::submit(trans('adminpanel.approve-submit'), ['class' => 'form-button form-button-full-width']) !!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection

@section('additional_js')
    <script src="{{ asset('js/FormValidation.js') }}"></script>
    <script src="{{ asset('js/view-edit-project/view-edit-project.js') }}"></script>
@endsection