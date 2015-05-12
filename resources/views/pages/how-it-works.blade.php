@extends('app')

@section('content')

    <div class="container-fluid" role="main" data-scroll-header>

        <div class="row" id="how-it-works">

            <div class="col-md-10">
<!-- Tips for success -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em mb-1em">
                        <h2 class="heading" id="tips_for_success">{{ trans('app.tips-for-success') }}</h2>
                    </div>
                </div>
                <div class="row form-element">

                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 xs-mt">
                        <div class="text-center">
                            <img class="mt-1em" src="{{ asset('/img/steps/step-1.svg') }}" alt="step-1">
                        </div>
                        <h4 class="text-center mb-1em">{{ trans('how-it-works-page.step-1h')}}</h4>
                        <p class="indent">{{trans('how-it-works-page.step-1')}}</p>
                    </div>

                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 xs-mt">
                        <div class="text-center">
                            <img class="mt-1em" src="{{ asset('/img/steps/step-2.svg') }}" alt="step-2">
                        </div>
                        <h4 class="text-center mb-1em">{{trans('how-it-works-page.step-2h')}}</h4>
                        <p class="indent">{{trans('how-it-works-page.step-2')}}</p>
                    </div>

                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 xs-mt">
                        <div class="text-center">
                            <img class="mt-1em" src="{{ asset('/img/steps/step-3.svg') }}" alt="step-3">
                        </div>
                        <h4 class="text-center mb-1em">{{trans('how-it-works-page.step-3h')}}</h4>
                        <p class="indent">{{trans('how-it-works-page.step-3')}}</p>
                    </div>

                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 xs-mt">
                        <div class="text-center">
                            <img class="mt-1em" src="{{ asset('/img/steps/step-4.svg') }}" alt="step-4">
                        </div>
                        <h4 class="text-center mb-1em">{{trans('how-it-works-page.step-4h')}}</h4>
                        <p class="indent">{{trans('how-it-works-page.step-4')}}</p>
                    </div>
                </div>

<!-- FAQ -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em mb-1em">
                        <h2 class="heading" id="faq">FAQ</h2>
                    </div>
                </div>

                <div class="row form-element">
                    <div class="col-xs-12 text-left">
                        <h4 class="mb-1em">Question</h4>
                        <p>Answer Lorem ipsum dolor sit amet, consectetur adipisicing elit. A architecto atque consectetur deserunt esse excepturi laboriosam officia optio perspiciatis placeat reiciendis repellat repellendus saepe, sed sequi totam vitae voluptate voluptatibus.</p>

                        <h4 class="mb-1em">Question</h4>
                        <p>Answer Lorem ipsum dolor sit amet, consectetur adipisicing elit. A amet aspernatur assumenda aut autem ea eveniet illo maxime, minima numquam obcaecati odit perferendis quae quaerat quo repudiandae sit temporibus voluptas!</p>

                        <h4 class="mb-1em">Question</h4>
                        <p>Answer Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet deleniti excepturi facere fuga fugiat inventore maxime molestias, mollitia nihil perspiciatis quae quia rerum sed similique sit unde vero? Modi.</p>
                    </div>
                </div>

<!-- Our goal -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em mb-1em">
                        <h2 class="heading" id="our_goal">{{ trans('app.our-mission') }}</h2>
                    </div>
                </div>

                <div class="row form-element">
                    <ul class="col-xs-12 text-left">
                        {!! trans('how-it-works-page.goals-list') !!}
                    </ul>
                </div>


                <div class="row">

                </div>

<!-- Our team -->
                <div class="row mb-1em">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em mb-1em">
                        <h2 class="heading" id="our_team">{{ trans('app.our-team') }}</h2>
                    </div>
                </div>

                <div class="row form-element text-center">
                    <div class="col-md-4 xs-mt">
                       <h4>Bernhard Ehn</h4>
                       <p class="team-role">{!! trans('how-it-works-page.team-1') !!}</p>
                       <p class="team"><i class="fa fa-phone"></i><a href="tel:+436801412012"> +43 680 / 14 12 012</a></p>
                       <p class="team"><i class="fa fa-envelope"></i><a href="{{ action('ContactFormController@getContactForm', array('address' => 'bernhard@kinderfoerderungen.at', 'addressee' => 'Bernhard Ehn')) }}"> bernhard@kinderfoerderungen.at</a></p>
                    </div>
                    <div class="col-md-4 xs-mt">
                       <h4>Wilhelmine Bauer</h4>
                       <p class="team-role">{!! trans('how-it-works-page.team-2') !!}</p>
                       <p class="team"><i class="fa fa-phone"></i><a href="tel:+4366488299611"> +43 664 / 88 299 611</a></p>
                       <p class="team"><i class="fa fa-envelope"></i><a href="{{ action('ContactFormController@getContactForm', array('address' => 'wilhelmine@kinderfoerderungen.at', 'addressee' => 'Wilhelmine Bauer')) }}"> wilhelmine@kinderfoerderungen.at</a></p>
                    </div>
                    <div class="col-md-4 xs-mt">
                       <h4>Ingeborg Kubita</h4>
                       <p class="team-role">{!! trans('how-it-works-page.team-2') !!}</p>
                       <p class="team"><i class="fa fa-phone"></i><a href="tel:+4366488299610"> +43 664 / 88 299 610</a></p>
                       <p class="team"><i class="fa fa-envelope"></i><a href="{{ action('ContactFormController@getContactForm', array('address' => 'ingeborg@kinderfoerderungen.at', 'addressee' => 'Ingeborg Kubita')) }}"> ingeborg@kinderfoerderungen.at</a></p>
                    </div>
                </div>
            </div>

            <div class="hidden-xs hidden-sm col-md-2 col-md-push-10 add-nav">
                <div class="list-group">
                    <a href="#tips_for_success" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-compass"></i> {{ trans('app.tips-for-success') }}</a>
                    <a href="#faq" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-comments-o"></i>FAQ</a>
                    <a href="#our_goal" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-life-ring"></i> {{ trans('app.our-mission') }}</a>
                    <a href="#our_team" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-group"></i> {{ trans('app.our-team') }}</a>
                </div>
            </div>

        </div>

@endsection

@section('additional_js')
    {{--<script src="{{ asset('js/home-page/home.js') }}"></script>--}}
@endsection