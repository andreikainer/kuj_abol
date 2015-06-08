@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row" role="main">
            <div class="col-md-6 col-sm-10 col-md-offset-3 col-sm-offset-1">
                <div class="success-container">
                    <h3 class="text-center success-heading">{{ trans('create-project-success.title') }}</h3>

                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                            <p class="success-sub-heading">{{ trans('create-project-success.what-happens') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                            <p>{{ trans('create-project-success.exp-what-happens-1') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                            <p>{{ trans('create-project-success.exp-what-happens-2') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                            <p class="success-sub-heading">{{ trans('create-project-success.success') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                            <p>{{ trans('create-project-success.exp-success-1') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                            <p>{{ trans('create-project-success.exp-success-2') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                            <p>{{ trans('create-project-success.exp-success-3') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                            <p class="success-sub-heading">{{ trans('create-project-success.failure') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                            <p>{{ trans('create-project-success.exp-failure-1') }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                            <p>{{ trans('create-project-success.exp-failure-2') }}</p>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-right mt-1em">
                            <a href="{{ action('ProjectsController@index') }}" class="button-link success-page-link"><i class="fa fa-long-arrow-right"></i>{{ trans('create-project-success.link') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection