@extends('app')

@section('content')

<!-- Jumbotron -->
        <div class="jumbotron">
            <div class="container-fluid clearfix main_carousel">
                <div class="main_carousel_item">
                    <img src="{{ asset('img/main-carousel/lg/mc_one.jpg') }}" class="" alt="image">

                    <div class="jumbotron-text">
                        {!! trans('home-page.carousel-text-1', ['cta-link' => action('PagesController@howItWorks')]) !!}
                    </div>
                </div>

                <div class="main_carousel_item">
                    <img src="{{ asset('img/main-carousel/lg/mc_two.jpg') }}" class="" alt="image">

                    <div class="jumbotron-text">
                        {!! trans('home-page.carousel-text-2', ['cta-link' => '#contribute']) !!}
                    </div>
                </div>

                <div class="main_carousel_item">
                    <img src="{{ asset('img/main-carousel/lg/mc_four.jpg') }}" class="" alt="image">

                    <div class="jumbotron-text">
                        {!! trans('home-page.carousel-text-3', ['cta-link' => action('ProjectsController@createProject')]) !!}
                    </div>
                </div>

                <div class="main_carousel_item">
                    <img src="{{ asset('img/main-carousel/lg/mc_five.jpg') }}" class="" alt="image">

                    <div class="jumbotron-text">
                        {!! trans('home-page.carousel-text-4', ['cta-link' => action('PagesController@sponsors')]) !!}
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

                <div class="col-lg-10 col-lg-offset-1 ">
                    <div class="row">

                    @foreach($projects as $project)
                        <div class="col-sm-6 col-md-4 mt-2em">
                            <div class="thumbnail pad-zero tile">
                                <a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project'), $project->slug) }}">
                                    <img src="{!! asset('img/' . $project->slug .'/small/' . $project->mainImage[0]->filename) !!}" alt="{{ $project->child_name }}" class="img-responsive">
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
                                    {{--<p>{{ $now }} days to go</p>--}}
                                    <p><a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project'), $project->slug) }}" class="btn btn-primary button-main-big" role="button">{{trans('home-page.read-more')}}</a></p>

                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div> <!-- row ends -->

                    <div class="row">
                        <p class="text-center">
                            <a href="{{ action('ProjectsController@showMoreProjects') }}" class="button-link" role="button"><i class="fa fa-long-arrow-right"></i>{{ trans('home-page.view-more-curr') }}</a>
                        </p>
                    </div>
                </div>
            </div>


<!-- Successful projects -->
            <div class="row">

                <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em">
                    <h2 class="heading">{{ trans('home-page.successfully-funded-projects') }}</h2>
                </div>

            </div>

            <div class="row">

                <div class="col-lg-10 col-lg-offset-1">
                    <div class="row">

                    @foreach($succ_projects as $project)
                        <div class="col-sm-6 col-md-4 mt-2em">
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
                                    <p><a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project'), $project->slug) }}" class="btn btn-primary button-main-big mt-1em" role="button">{{trans('home-page.read-more')}}</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    </div> <!-- row ends -->

                    <div class="row">
                        <p class="text-center">
                            <a href="{{ action('ProjectsController@showMoreSuccProjects') }}" class="button-link" role="button"><i class="fa fa-long-arrow-right"></i>{{ trans('home-page.view-more-succ') }}</a>
                        </p>
                    </div>

                </div>
            </div>


<!-- Sponsors' logos -->
            <div class="row">

                <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em">
                    <h2 class="heading">{{ trans('app.our-sponsors') }}</h2>
                </div>

            </div>

            <div class="row">

                <div class="col-xs-8 col-xs-offset-2 col-sm-10 col-sm-offset-1 mt-2em">
                    <div class="row sponsors_carousel">
                        @foreach($logos as $logo)
                            <div class="col-xs-4 col-sm-4 col-md-2">
                                <a href="{{ $logo->url }}">
                                    <div class="logo-name img-responsive text-center hidden">{{$logo->business_name}}</div>

                                    <img src="{{ asset('img/logos/' . $logo->logo) }}" class="img-responsive form-element" alt="{{ $logo->business_name }}">
                                </a>
                            </div>
                        @endforeach
                    </div>
                    <div class="row"><p class="text-center"><a href="{{ action('PagesController@sponsors') }}" class="button-link" role="button"><i class="fa fa-long-arrow-right"></i>{{ trans('home-page.view-all') }}</a></p></div>
                </div>

            </div>


@endsection

@section('additional_js')
    <script src="{{ asset('js/home-page/home.js') }}"></script>
    <script src="{{ asset('js/progress-bar.js') }}"></script>
@endsection