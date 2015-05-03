@extends('app')

@section('content')
<div class="container-fluid">
    <div class="row" role="main">
        <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em">
            <h2 class="heading">{{ trans('lang.create-project')  }}</h2>
        </div>
        <div class="col-md-8 col-sm-8 mt-3em">
            <!-- Section Tabs -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="error-box form-error">Error Box</div>
                </div>
                <div class="col-md-12 col-sm-12">
                    <div class="col-md-7 col-sm-7 col-xs-7 padding-none">
                        <div class="col-md-4 col-sm-4 col-xs-4 text-center form-section-tab form-section-tab-border-left form-section-tab-active" data-section="0">{{ trans('create-project-form.start') }}</div>
                        <div class="col-md-4 col-sm-4 col-xs-4 text-center form-section-tab" data-section="1">{{ trans('create-project-form.project-details') }}</div>
                        <div class="col-md-4 col-sm-4 col-xs-4 text-center form-section-tab" data-section="2">{{ trans('create-project-form.your-details') }}</div>
                    </div>
                    <div class="col-md-5 col-sm-5 col-xs-5 padding-none">
                        <div class="col-md-6 col-sm-6 col-xs-6 text-center form-section-tab" data-section="3">{{ trans('create-project-form.supporting-evidence') }}</div>
                        <div class="col-md-6 col-sm-6 col-xs-6 text-center form-section-tab" data-section="4">{{ trans('create-project-form.summary') }}</div>
                    </div>
                </div>
            </div> <!-- end section tabs -->
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    @include('forms.create-project-form')
                </div>
            </div> <!-- end form -->
        </div>
        <div class="col-md-4 col-sm-4 mt-3em">
            <aside class="form-element">
                Aside content.
            </aside>
        </div>
    </div> <!-- main content ends -->
@endsection

@section('additional_js')
<script src="{{ asset('js/FormValidation.js') }}"></script>
        <script src="{{ asset('js/timing.js') }}"></script>
        <script src="{{ asset('js/create-project-page/create-project.js') }}"></script>
@endsection