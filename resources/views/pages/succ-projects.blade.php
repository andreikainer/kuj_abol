@extends('app')

@section('content')

<!-- Main content -->
        <div class="container-fluid" role="main">

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

                    <div class="row text-center">
                        <?php echo $succ_projects->render(); ?>
                    </div>

                </div>
            </div>


@endsection