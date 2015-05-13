@extends('app')

@section('content')

<div class="container-fluid account" role="main">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em mb-1em">
                <h2 class="heading" id="faq">{{ trans('user-cms.heading') }}</h2>
            </div>
        </div>

        <div class="row">

            <!-- Dashboard -->
                <div class="col-md-12 col-sm-12">
                    <div class="cpp-error error-box form-error"></div>
                </div>
                <div class="col-md-12 col-sm-12">

                <!-- Tabs -->
                    <div class="col-xs-12 col-md-10 col-md-offset-1 padding-none">
                        <div class="col-md-4 col-sm-4 col-xs-4 text-center form-section-tab form-section-tab-border-left form-section-tab-active" data-section="0">{{ trans('user-cms.contributions') }}</div>
                        <div class="col-md-4 col-sm-4 col-xs-4 text-center form-section-tab" data-section="1">{{ trans('user-cms.profile') }}</div>
                        <div class="col-md-4 col-sm-4 col-xs-4 text-center form-section-tab" data-section="2">{{ trans('user-cms.favorites') }}</div>
                    </div>

                </div>


                <div id="user-profile-wrapper" class="col-xs-12 col-md-10 col-md-offset-1">
                pipa
                    {{--@include('forms.create-project-form')--}}
                    </div>


        </div>

@endsection

@section('additional_js')
    <script src="{{ asset('js/FormValidation.js') }}"></script>

@endsection