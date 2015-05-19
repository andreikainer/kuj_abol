@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row" role="main">
        <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em">
            <h2 class="heading">{{ trans('app.create-project')  }}</h2>
        </div>
        <div class="col-md-8 col-sm-8 mt-3em">
            <!-- Section Tabs -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="cpp-error error-box form-error"></div>
                </div>
                <div class="col-md-12 hidden-sm hidden-xs">
                    <div class="col-md-7 padding-none">
                        <div class="col-md-4 text-center form-section-tab form-section-tab-border-left form-section-tab-active" data-section="0">{{ trans('create-project-form.start') }}</div>
                        <div class="col-md-4 text-center form-section-tab" data-section="1">{{ trans('create-project-form.project-details') }}</div>
                        <div class="col-md-4 text-center form-section-tab" data-section="2">{{ trans('create-project-form.your-details') }}</div>
                    </div>
                    <div class="col-md-5 padding-none">
                        <div class="col-md-6 text-center form-section-tab" data-section="3">{{ trans('create-project-form.supporting-evidence') }}</div>
                        <div class="col-md-6 text-center form-section-tab" data-section="4">{{ trans('create-project-form.summary') }}</div>
                    </div>
                </div>
                <div class="col-sm-12 col-xs-12 visible-sm visible-xs">
                    <div class="col-sm-7 col-xs-7 padding-none">
                        <div class="col-sm-4 col-xs-4 text-center form-section-tab form-section-tab-border-left form-section-tab-active mobile-section-tab" data-section="0"><i class="fa fa-play fa-lg"></i></div>
                        <div class="col-sm-4 col-xs-4 text-center form-section-tab mobile-section-tab" data-section="1"><i class="fa fa-edit fa-lg"></i></div>
                        <div class="col-sm-4 col-xs-4 text-center form-section-tab mobile-section-tab" data-section="2"><i class="fa fa-user fa-lg"></i></div>
                    </div>
                    <div class="col-sm-5 col-xs-5 padding-none">
                        <div class="col-sm-6 col-xs-6 text-center form-section-tab mobile-section-tab" data-section="3"><i class="fa fa-file"></i></div>
                        <div class="col-sm-6 col-xs-6 text-center form-section-tab mobile-section-tab" data-section="4"><i class="fa fa-check fa-lg fa-no-margin"></i></div>
                    </div>
                </div>
            </div> <!-- end section tabs -->
            <div class="row">
                <div id="create-project-wrapper" class="col-md-12 col-sm-12">
                    @include('forms.create-project-form')
                </div>
            </div> <!-- end form -->
        </div>
        <div class="col-md-4 col-sm-4 mt-3em">
            <aside class="form-element aside-padding">
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <p class="tips-heading">{{ trans('create-project-form.tips-heading') }}</p>
                    </div>
                </div>
                <div class="row mt-2em">
                    <div class="col-md-12 col-sm-12">
                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a href="#collapseOne" class="tip-title" data-toggle="collapse" data-parent="#accordian" aria-expanded="true" aria-controls="collapseOne">
                                            {{ trans('create-project-form.tip-1-title') }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse in" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body tip-explanation">
                                        <p>{{ trans('create-project-form.tip-1-1') }}</p>
                                    </div>
                                </div>
                            </div> <!-- end tip -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a href="#collapseTwo" class="collapsed tip-title" data-toggle="collapse" data-parent="#accordian" aria-expanded="false" aria-controls="collapseTwo">
                                            {{ trans('create-project-form.tip-2-title') }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body tip-explanation">
                                        <p>{{ trans('create-project-form.tip-2-1') }}</p>
                                        <p>{{ trans('create-project-form.tip-2-2') }}</p>
                                    </div>
                                </div>
                            </div> <!-- end tip -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a href="#collapseThree" class="collapsed tip-title" data-toggle="collapse" data-parent="#accordian" aria-expanded="false" aria-controls="collapseThree">
                                            {{ trans('create-project-form.tip-3-title') }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body tip-explanation">
                                        <p>{{ trans('create-project-form.tip-3-1') }}</p>
                                        <p>
                                            {{ trans('create-project-form.tip-3-2') }}
                                        </p>
                                        <p>{{ trans('create-project-form.tip-3-3') }}</p>
                                    </div>
                                </div>
                            </div> <!-- end tip -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a href="#collapseFour" class="collapsed tip-title" data-toggle="collapse" data-parent="#accordian" aria-expanded="false" aria-controls="collapseFour">
                                            {{ trans('create-project-form.tip-4-title') }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body tip-explanation">
                                        <p>{{ trans('create-project-form.tip-4-1') }}</p>
                                        <p>
                                            {{ trans('create-project-form.tip-4-2') }}
                                        </p>
                                        <p>
                                            {{ trans('create-project-form.tip-4-3') }}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end tip -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a href="#collapseFive" class="collapsed tip-title" data-toggle="collapse" data-parent="#accordian" aria-expanded="false" aria-controls="collapseFive">
                                            {{ trans('create-project-form.tip-5-title') }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseFive" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body tip-explanation">
                                        <p>{{ trans('create-project-form.tip-5-1') }}</p>
                                        <p>
                                            {{ trans('create-project-form.tip-5-2') }}
                                        </p>
                                        <p>
                                            {{ trans('create-project-form.tip-5-3') }}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end tip -->
                        </div>
                    </div>
                </div>
            </aside>
        </div>
    </div> <!-- main content ends -->
@endsection

@section('additional_js')
<script src="{{ asset('js/FormValidation.js') }}"></script>
        <script src="{{ asset('js/timing.js') }}"></script>
        <script src="{{ asset('js/create-project-page/create-project.js') }}"></script>
@endsection