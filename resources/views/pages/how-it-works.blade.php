@extends('app')

@section('content')

    <div class="container-fluid" role="main">

        <div class="row" id="how-it-works">
            <div class="col-md-2 add-nav">
                <div class="list-group">
                    <a href="#" class="list-group-item">Tips for success</a>
                    <a href="#" class="list-group-item">FAQ</a>
                    <a href="#" class="list-group-item">Our goals</a>
                    <a href="#" class="list-group-item">Our team</a>
                </div>
            </div>

            <div class="col-md-10 col-md-offset-2">
            <!-- Tips for success -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-2em mb-1em">
                        <h2 class="heading" id="tips_for_success">{{ trans('how-it-works-page.tips-for-success') }}</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3 col-md-offset-1">Step 1</div>
                    <div class="col-md-3 col-md-offset-1">Step 1</div>
                    <div class="col-md-3 col-md-offset-1">Step 1</div>
                </div>

            <!-- FAQ -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-2em mb-1em">
                        <h2 class="heading" id="faq">FAQ</h2>
                    </div>
                </div>

                <div class="col-xs-12 col-md-11 col-md-offset-1 text-left">
                    <h4>Question</h4>
                    <p>Answer</p>

                    <h4>Question</h4>
                    <p>Answer</p>

                    <h4>Question</h4>
                    <p>Answer</p>
                </div>

            <!-- Our goal -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-2em mb-1em">
                        <h2 class="heading" id="our_goal">{{ trans('how-it-works-page.our-goal') }}</h2>
                    </div>
                </div>

                <div class="row">
                    <ul class="col-xs-12 col-md-11 col-md-offset-1 text-left">
                        {!! trans('how-it-works-page.goals-list') !!}
                        {{--<li><i class="fa fa-check"></i>Alleviate family fortunes.</li>--}}
                        {{--<li><i class="fa fa-check"></i>Fulfil child wishes.</li>--}}
                        {{--<li><i class="fa fa-check"></i>Provide financial support for much needed therapies and disabled facilities.</li>--}}
                        {{--<li><i class="fa fa-check"></i>Give children equal opportunities for their development.</li>--}}
                    </ul>
                </div>


                <div class="row">

                </div>

            <!-- Our team -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-2em mb-1em">
                        <h2 class="heading" id="our_team">{{ trans('how-it-works-page.our-team') }}</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-4">
                       <h4>Andrei Kainer</h4>
                       <p class="team-role">{!! trans('how-it-works-page.team-1') !!}</p>
                       <p class="team"><i class="fa fa-phone"></i> +43 680 / 14 12 012</p>
                       <p class="team"><i class="fa fa-envelope"></i> andrei@kinderfoerderungen.at</p>
                    </div>
                    <div class="col-md-4">
                       <h4>Wilhelmine Bauer</h4>
                       <p class="team-role">{!! trans('how-it-works-page.team-2') !!}</p>
                       <p class="team"><i class="fa fa-phone"></i> +43 664 / 88 299 611</p>
                       <p class="team"><i class="fa fa-envelope"></i> wilhelmine@kinderfoerderungen.at</p>
                    </div>
                    <div class="col-md-4">
                       <h4>Ingeborg Kubita</h4>
                       <p class="team-role">{!! trans('how-it-works-page.team-2') !!}</p>
                       <p class="team"><i class="fa fa-phone"></i> +43 664 / 88 299 610</p>
                       <p class="team"><i class="fa fa-envelope"></i> ingeborg@kinderfoerderungen.at</p>
                    </div>
                </div>
            </div>

            </div>

@endsection

@section('additional_js')
    {{--<script src="{{ asset('js/home-page/home.js') }}"></script>--}}
@endsection