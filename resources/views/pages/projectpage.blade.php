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

            <div class="row content">
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
                <div class="btn btn-primary button-main-big contribute">{{ trans('view-project-page.fund-this-project') }}</div>
                <div class="btn">
                    <div id="facebook-share" class="btn btn-primary button-main fb-share" role="button"><i class="fa fa-facebook"></i> {{ trans('view-project-page.share-on-facebook') }}</div><div id="fb-root"></div>
                </div>
                <div class="btn">
                    @if(Session::has('username') && $favourites->isEmpty() )
                        <a href="{{ action('UserpanelController@addFavourite', $project->id) }}">
                            <div id="favorite" class="btn btn-primary button-main" role="button"><i class="fa fa-star"></i> {{ trans('view-project-page.add-to-favourites') }}</div>
                        </a>
                    @elseif(Session::has('username') && !empty($favourites->all())  )
                        <a href="{{ action('UserpanelController@removeFavourite', $project->id) }}">
                            <div id="favorite" class="btn btn-primary button-main" role="button"><i class="fa fa-star"></i> {{ trans('view-project-page.unfavourite') }}</div>
                        </a>
                    @else
                        <div id="favorite" class="btn btn-primary button-main" role="button" data-toggle="modal" data-target=".modal-message"><i class="fa fa-star"></i> {{ trans('view-project-page.add-to-favourites') }}</div>
                    @endif
                </div>
            </div> <!-- statistics end-->
            </div>
        <!-- Modal -->
        <div class="modal fade modal-message" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <p>{{ trans('view-project-page.login-message') }}</p>
                    </div>
                    <div class="modal-footer">
                        <button id="closing-btn" type="button" class="btn button-main button-user" data-dismiss="modal">{{ trans('view-project-page.close') }}</button>
                        <a href="{{ action('Auth\AuthController@getLogin') }}"><button type="button" class="btn button-main button-user login">{{ trans('view-project-page.login') }}</button></a>
                    </div>
                </div>
            </div>
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

            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center mt-3em">
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

<!--Facebook Share Modal-->
<script>
    $(document).ready(function() {
        $('.fb-share').click(function() {
            FB.ui({
                method: 'feed',
                name: '{{ $project->project_name }}',
                link: '{{ Request::url() }}',
                picture: '',
                caption: 'Initiative Kinder- und Jugendf&ouml;rderungen',
                description: '{{ $project->short_desc }}',
                ref: '{{ $project->child_name}}'
            });
        });
    });
</script>
@endsection