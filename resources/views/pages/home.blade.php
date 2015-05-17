@extends('app')

@section('content')

<!-- Jumbotron -->
        <div class="jumbotron">
            <div class="container-fluid clearfix carousel slide" id="main_carousel" data-ride="carousel">

                <!-- Indicators -->
                    <ol class="carousel-indicators">
                      <li data-target="#main_carousel" data-slide-to="0" class="active"></li>
                      <li data-target="#main_carousel" data-slide-to="1"></li>
                      <li data-target="#main_carousel" data-slide-to="2"></li>
                      <li data-target="#main_carousel" data-slide-to="3"></li>
                    </ol>

                    <div class="carousel-inner" role="listbox">
                         <div class="item active">
                            <img src="{{ asset('img/main-carousel/lg/seven.jpg') }}" alt="image">
                            <div class="carousel-caption">
                                {!! trans('home-page.carousel-text-1', ['cta-link' => '#contribute']) !!}
                            </div>
                         </div>

                         <div class="item">
                            <img src="{{ asset('img/main-carousel/lg/six.jpg') }}" alt="image">
                            <div class="carousel-caption">
                                {!! trans('home-page.carousel-text-2', ['cta-link' => trans('routes.how-it-works')]) !!}
                            </div>
                         </div>

                         <div class="item">
                            <img src="{{ asset('img/main-carousel/lg/three.jpg') }}" alt="image">
                            <div class="carousel-caption">
                                {!! trans('home-page.carousel-text-3', ['cta-link' => trans('routes.how-it-works')]) !!}
                            </div>
                         </div>

                         <div class="item">
                            <img src="{{ asset('img/main-carousel/lg/five.jpg') }}" alt="image">
                            <div class="carousel-caption">
                                {!! trans('home-page.carousel-text-4', ['cta-link' => trans('routes.how-it-works')]) !!}
                            </div>
                         </div>
                    </div>
            </div>
        </div>


<!-- Main content -->
        <div class="container-fluid" role="main">

<!-- Current projects -->
            <div class="row">

                <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em">
                    <h2 class="heading" id="contribute">{{ trans('home-page.current-projects') }}</h2>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-10 col-lg-offset-1 mt-2em">
                    <div class="row">

                    @foreach($projects as $project)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail pad-zero tile">
                                <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project'), $project->slug) }}">
                                    <img src="{!! asset('img/' . $project->slug .'/small/' . $project->mainImage[0]->filename) !!}" alt="{{ $project->child_name }}">
                                </a>

                                <div class="caption">
                                    <h3>{{ $project->project_name }}</h3>
                                    <p>{{ $project->short_desc }}</p>

                                    <p class="percentage text-right"></p>

                                    <div class="progress">
                                        <div class="progress-bar prog-bar-green" role="progressbar" aria-valuenow="{{ $project->amount_raised }}" aria-valuemin="0" aria-valuemax="{{ $project->target_amount }}">
                                            <span class="sr-only">In progress</span>
                                        </div>
                                    </div>

                                    <p><a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project'), $project->slug) }}" class="btn btn-primary button-main-big" role="button">{{trans('home-page.read-more')}}</a></p>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div> <!-- row ends -->
                </div>
            </div>


<!-- Successful projects -->
            <div class="row">

                <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em">
                    <h2 class="heading">{{ trans('home-page.successfully-funded-projects') }}</h2>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-10 col-lg-offset-1 mt-2em">
                    <div class="row">

                    @foreach($succ_projects as $project)
                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail pad-zero success">
                                <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project'), $project->slug) }}">
                                    <img src="{!! asset('img/' . $project->slug .'/small/' . $project->mainImage[0]->filename) !!}" alt="{{ $project->child_name }}">
                                </a>

                                <div class="caption">
                                    <h3>{{ $project->project_name }}</h3>
                                    <p>{{ $project->short_desc }}</p>

                                    <p class="percentage succ text-right">100%</p>

                                    <div class="progress mb-0">
                                        <div class="progress-bar prog-bar-green" role="progressbar" aria-valuenow="1000" aria-valuemin="0" aria-valuemax="100" style="width: 1000%">
                                            <span class="sr-only">100% Completed</span>
                                        </div>
                                    </div>

                                    <p class="finished-green text-center mb-0"><i class="fa fa-check"></i>{{ trans('home-page.finished') }}</p>
                                    <p class="text-right mb-0"><a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project'), $project->slug) }}" class="button-link" role="button"><i class="fa fa-long-arrow-right"></i>{{ trans('home-page.details') }}</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    </div> <!-- row ends -->

                    <div class="row">
                        <p class="text-center">
                            <a href="{{ action('ProjectsController@showMoreSuccProjects') }}" class="button-link" role="button"><i class="fa fa-long-arrow-right"></i>{{ trans('home-page.view-more') }}</a>
                        </p>
                    </div>

                </div>
            </div>


<!-- Sponsors' logos -->
            {{--<div class="row">--}}

                {{--<div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em">--}}
                    {{--<h2 class="heading">{{ trans('app.our-sponsors') }}</h2>--}}
                {{--</div>--}}

            {{--</div>--}}

            {{--<div class="row carousel slide" id="logo_carousel" data-ride="carousel">--}}

                {{--<div class="carousel-inner" role="listbox">--}}
                    {{--<div class="item active">--}}
                       {{--<img src="{{ asset('img/logos/placehplder.jpg') }}" alt="image">--}}
                       {{--<div class="carousel-caption">--}}
                           {{--{!! trans('home-page.carousel-text-1', ['cta-link' => '#contribute']) !!}--}}
                       {{--</div>--}}
                    {{--</div>--}}

                    {{--<div class="item">--}}
                       {{--@foreach($logos as $logo)--}}
                               {{--<a href="{{ $logo->url }}">--}}
                                   {{--<img src="{{ asset('img/logos/' . $logo->logo) }}" alt="{{ $logo->business_name }}">--}}
                                   {{--<div class="carousel-caption">--}}
                                       {{--{{$logo->business_name}}--}}
                                   {{--</div>--}}
                               {{--</a>--}}
                           {{--</div>--}}
                       {{--@endforeach--}}
                    {{--</div>--}}

                    {{--<!-- Controls -->--}}
                      {{--<a class="left carousel-control" href="#logo-carousel" role="button" data-slide="prev">--}}
                        {{--<span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>--}}
                        {{--<span class="sr-only">Previous</span>--}}
                      {{--</a>--}}
                      {{--<a class="right carousel-control" href="#logo-carousel" role="button" data-slide="next">--}}
                        {{--<span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>--}}
                        {{--<span class="sr-only">Next</span>--}}
                      {{--</a>--}}
                {{--</div>--}}

                {{--<div class="row"><p class="text-center"><a href="{{ action('PagesController@sponsors') }}" class="button-link" role="button"><i class="fa fa-long-arrow-right"></i>{{ trans('home-page.view-all') }}</a></p></div>--}}


            {{--</div>--}}

@endsection

@section('additional_js')
    <script src="{{ asset('js/home-page/home.js') }}"></script>
    <script src="{{ asset('js/progress-bar.js') }}"></script>
@endsection