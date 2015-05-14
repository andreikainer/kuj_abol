@extends('app')

@section('content')
    <!-- Facebook JS import -->

    <div class="container-fluid">
        {{--<div class="row" role="main"> <!--Body content-->--}}

        <div class="row">
            <div class="col-md-8 col-md-offset-2 col-sm-12 text-center mt-3em"> <!-- project title beginn-->
                <h2 class="heading">{{ $project->project_name }}</h2>
            </div> <!-- project title end-->
        </div>

            <div class="row">
            <div class="col-sm-12 col-md-8 col-md-offset-0 project-gallery mt-3em"> <!-- project images beginn-->
                @foreach($galleryImages as $image)
                <div class="project-gallery-item">
                    <img class="img-responsive center-block" src="{{ asset('img/'.$project->slug.'/medium/'.$image->filename) }}" alt="{{ $project->child_name }}">
                </div>
                @endforeach
            </div> <!-- project images end-->

            <div id="project_statistics" class="col-sm-12 col-md-4 text-center boarder mt-3em">  <!-- statistics beginn-->
                <h3 id="funds_text" data-funds-text="{{ trans('view-project-page.funs-text') }}">{{ trans('view-project-page.total-funds-raised') }}</h3>
                <h2 id="amount_raised" data-amount-raised="{{ $project->amount_raised }}"><strong>&euro; {{ $amount_raised }}</strong></h2>
                <h4 id="minimum_goal" data-minimum-goal="{{ $project->target_amount }}"><strong>{{ trans('view-project-page.of-minimum-goal', ['goal' => $target_amount]) }}</strong></h4>
                <h3>{{ trans('view-project-page.progress') }}</h3>
                <div class="progress" style="height:3em">
                    <div id="progress-bar" class="progress-bar prog-bar-green" role="progressbar"><span id="stat-count"></span>
                    </div>
                </div>
                <h3 id="time-text">{{ trans('view-project-page.project-ends-in') }}</h3>
                <div id="countdown" data-date="{{ $finish_date }}" data-time="18:00" data-timezone="2" data-final="{!! trans('view-project-page.completed') !!}">
                    <div class="countdown-value"><span id="countdown-days">0</span></div>:
                    <div class="countdown-value"><span id="countdown-hours">0</span></div>:
                    <div class="countdown-value"><span id="countdown-minutes">0</span></div>:
                    <div class="countdown-value"><span id="countdown-seconds">0</span></div>
                    <div id="time">{!! trans('view-project-page.time-to-goal') !!}</div>
                </div>
                <div class="btn button-main-big contribute">{{ trans('view-project-page.fund-this-project') }}</div>
                <div class="btn">
                   <div id="facebook-share" class="btn btn-primary button-main" role="button">
                       <i class="fa fa-facebook"></i> {{ trans('view-project-page.share-on-facebook') }}
                   </div>
                </div>
                <div class="btn">
                    <a href="#"><div id="favorite" class="btn btn-primary button-main" role="button">
                        <i class="fa fa-star"></i> {{ trans('view-project-page.add-to-favourites') }}
                    </div></a>
                </div>
            </div> <!-- statistics end-->
            </div>

            <div class="row">
            <div class="col-sm-12 col-md-6 col-md-offset-1 text-justify description form-element"> <!-- project description beginn-->
                <p>{{ $project->full_desc }}</p>
            </div> <!-- project description end-->

            <div id="contribution-packs" class="col-sm-12 col-md-4 col-md-offset-1 text-center clearfix"> <!-- contribution packages beginn-->
                <h2 class="heading">{{ trans('view-project-page.support-options') }}</h2>
                <a href="#" role="button"><div class="pack1 padding-none pull-left"> <!-- contribution package 1-->
                        {!! trans('view-project-page.business-building-block') !!}
                </div></a>
                <a href="#" role="button"><div class="packs2-4 padding-none pull-right"> <!-- contribution package 2-->
                        {!! trans('view-project-page.small-block', ['euro' => '15,00']) !!}
                            {!! trans('view-project-page.individual-building-block', ['euro' => '15,00']) !!}
                </div></a>
                <a href="#" role="button"><div class="packs2-4 padding-none pull-right"> <!-- contribution package 3-->
                        {!! trans('view-project-page.medium-block', ['euro' => '25,00']) !!}
                            {!! trans('view-project-page.individual-building-block', ['euro' => '25,00']) !!}
                </div></a>
                    <a href="#" role="button"><div class="packs2-4 padding-none pull-left"> <!-- contribution package 4-->
                        {!! trans('view-project-page.large-block', ['euro' => '50,00']) !!}
                           {!! trans('view-project-page.individual-building-block', ['euro' => '50,00']) !!}
                </div></a>
            </div> <!-- contribution packages end-->
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
                        <div class="col-xs-4 col-sm-4 col-md-2 img-responsive">
                            <a href="{{ $logo->url }}"><div class="logo-name img-responsive text-center hidden">{{$logo->business_name}}</div>
                            <img src="{{ asset('img/logos/' . $logo->logo) }}" class="img-responsive form-element" alt="{{ $logo->business_name }}"></a>
                        </div>
                    @endforeach
                </div>

            </div>

        </div>
@endsection

@section('additional_js')
<script src="{{ asset('js/view-project-page/view-project.js') }}"></script>
@endsection