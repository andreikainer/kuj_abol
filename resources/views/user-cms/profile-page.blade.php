@extends('app')

@section('content')

<div class="container-fluid" role="main">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em mb-1em">
                <h2 class="heading" id="faq">{{Session::get('username')}}{{ trans('user-cms.heading') }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-10 col-sm-offset-1 mt-2em">
                <div class="row">

            <!-- Dashboard -->
                    <div class="col-md-12 col-sm-12">
                        <div class="cpp-error error-box form-error"></div>
                    </div>
                    <div class="col-md-12 col-sm-12">
                        <div class="col-md-7 col-sm-7 col-xs-7 padding-none">
                            <div class="col-md-4 col-sm-4 col-xs-4 text-center form-section-tab form-section-tab-border-left form-section-tab-active" data-section="0">{{ trans('user-cms.contributions') }}</div>
                            <div class="col-md-4 col-sm-4 col-xs-4 text-center form-section-tab" data-section="1">{{ trans('user-cms.profile') }}</div>
                            <div class="col-md-4 col-sm-4 col-xs-4 text-center form-section-tab" data-section="2">{{ trans('user-cms.favorites') }}</div>
                        </div>
                        {{--<div class="col-md-5 col-sm-5 col-xs-5 padding-none">--}}
                            {{--<div class="col-md-6 col-sm-6 col-xs-6 text-center form-section-tab" data-section="3">{{ trans('create-project-form.supporting-evidence') }}</div>--}}
                            {{--<div class="col-md-6 col-sm-6 col-xs-6 text-center form-section-tab" data-section="4">{{ trans('create-project-form.summary') }}</div>--}}
                        {{--</div>--}}
                    </div>
                </div> <!-- end section tabs -->

                <div class="row">
                    <div id="create-project-wrapper" class="col-md-12 col-sm-12">
                        {{--@include('forms.create-project-form')--}}
                    </div>
                </div> <!-- end form -->

            </div>

        </div>

@endsection

@section('additional_js')
    <script src="{{ asset('js/FormValidation.js') }}"></script>

@endsection