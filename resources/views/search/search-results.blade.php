@extends('app')

@section('content')
<!-- Main content -->
    <div class="container-fluid" role="main">

<!-- Current projects -->
         <div class="row">

             <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center mt-3em">
                 <h2 class="heading" id="contribute">{{ trans('app.search-results') }}</h2>
             </div>

         </div>


<!-- Search results for projects -->
         <div class="row">

             <div class="col-lg-10 col-lg-offset-1 mt-2em">
                 <div class="row-fluid">

                 @if($message !== '')
                    <div class="col-xs-12 form-element text-center">
                        <h4>{!!  $message !!}</h4>
                    </div>
                 @else

                    @foreach($projects_results as $project)
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

                                    <p><a href="{{ url(LaravelLocalization::getCurrentLocale().'/'.LaravelLocalization::transRoute('routes.project'), $project->slug) }}" class="btn btn-primary button-main-big" role="button">Mehr zu diesen Förderungsprojekt</a></p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    </div> <!-- row ends -->

                    <div class="row text-center">
                        <?php echo $projects_results->render(); ?>
                    </div>

                 @endif
                 </div>

             </div>
         </div>

@endsection

@section('additional_js')
    <script src="{{ asset('js/progress-bar.js') }}"></script>
@endsection