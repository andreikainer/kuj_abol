@extends('app')

@section('content')

<!-- Jumbotron -->
        <div class="jumbotron">
            <div class="container-fluid clearfix main_carousel">
                <div class="main_carousel_item">
                    <img src="{{ asset('img/main-carousel/lg/seven.jpg') }}" class="img-responsive" alt="image">

                    <div class="jumbotron-text">
                        {!! trans('home-page.carousel-text-1', ['cta-link' => '#contribute']) !!}
                    </div>
                </div>

                <div class="main_carousel_item">
                    <img src="{{ asset('img/main-carousel/lg/six.jpg') }}" class="img-responsive" alt="image">

                    <div class="jumbotron-text">
                        {!! trans('home-page.carousel-text-2', ['cta-link' => trans('routes.how-it-works')]) !!}
                    </div>
                </div>

                <div class="main_carousel_item">
                    <img src="{{ asset('img/main-carousel/lg/three.jpg') }}" class="img-responsive" alt="image">

                    <div class="jumbotron-text">
                        {!! trans('home-page.carousel-text-3', ['cta-link' => trans('routes.how-it-works')]) !!}
                    </div>
                </div>

                <div class="main_carousel_item">
                     <img src="{{ asset('img/main-carousel/lg/five.jpg') }}" class="img-responsive" alt="image">

                     <div class="jumbotron-text">
                         {!! trans('home-page.carousel-text-4', ['cta-link' => trans('routes.how-it-works')]) !!}
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
                                <a href="{{ url('/projects', $project->slug) }}">
                                    <img src="{{ asset('img/main-carousel/xs/one.jpg') }}" alt="{{ $project->child_name }}">
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

                                    <p><a href="{{ url('/projects', $project->slug) }}" class="btn btn-primary button-main-big" role="button">Mehr zu diesen Förderungsprojekt</a></p>
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
                                <a href="{{ url('/projects', $project->slug) }}">
                                    <img src="{{ asset('img/main-carousel/xs/three.jpg') }}" alt="{{ $project->child_name }}">
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
                                    <p class="text-right mb-0"><a href="{{ url('/projects', $project->slug) }}" class="button-link" role="button"><i class="fa fa-long-arrow-right"></i>{{ trans('home-page.details') }}</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach


                    </div> <!-- row ends -->

                    <div class="row"><p class="text-center"><a href="{{ action('ProjectsController@showMoreSuccProjects') }}" class="button-link" role="button"><i class="fa fa-long-arrow-right"></i>View more</a></p></div>

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

                        <div class="col-xs-4 col-sm-4 col-md-2 img-responsive">
                            <div class="logo-name img-responsive text-center hidden">onhghjgjhg ghjgkgglglgl glhglglhglhe</div>
                            <img src="{{ asset('img/logoplaceholder.jpg') }}" class="img-responsive" alt="one">
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <div class="logo-name img-responsive text-center hidden">two</div>
                            <img src="{{ asset('img/logoplaceholder.jpg') }}" class="img-responsive" alt="two">
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <div class="logo-name img-responsive text-center hidden">three</div>
                            <img src="{{ asset('img/logoplaceholder.jpg') }}" class="img-responsive" alt="three">
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <div class="logo-name img-responsive text-center hidden">four</div>
                            <img src="{{ asset('img/logoplaceholder.jpg') }}" class="img-responsive" alt="four">
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <div class="logo-name img-responsive text-center hidden">five</div>
                            <img src="{{ asset('img/logoplaceholder.jpg') }}" class="img-responsive" alt="five">
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <div class="logo-name img-responsive text-center hidden">four</div>
                            <img src="{{ asset('img/logoplaceholder.jpg') }}" class="img-responsive" alt="four">
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <div class="logo-name img-responsive text-center hidden">five</div>
                            <img src="{{ asset('img/logoplaceholder.jpg') }}" class="img-responsive" alt="five">
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <div class="logo-name img-responsive text-center hidden">five</div>
                            <img src="{{ asset('img/logoplaceholder.jpg') }}" class="img-responsive" alt="five">
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <div class="logo-name img-responsive text-center hidden">four</div>
                            <img src="{{ asset('img/logoplaceholder.jpg') }}" class="img-responsive" alt="four">
                        </div>

                        <div class="col-xs-4 col-sm-4 col-md-2">
                            <div class="logo-name img-responsive text-center hidden">five</div>
                            <img src="{{ asset('img/logoplaceholder.jpg') }}" class="img-responsive" alt="five">
                        </div>

                    </div>
                    <div class="row"><p class="text-center"><a href="#" class="button-link" role="button"><i class="fa fa-long-arrow-right"></i>{{ trans('home-page.view-all') }}</a></p></div>
                </div>

            </div>

@endsection

@section('additional_js')
    <script src="{{ asset('js/home-page/home.js') }}"></script>
@endsection