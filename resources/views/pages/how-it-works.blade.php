@extends('app')

@section('content')

    <div class="container-fluid" role="main" data-scroll-header>

        <div class="row content" id="how-it-works">

            <div class="col-md-10">
<!-- Tips for success grafics-->
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center mt-3em mb-1em">
                        <h2 class="heading" id="tips_for_success">{{ trans('app.overview') }}</h2>
                    </div>
                </div>
                <div class="row form-element">

                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 xs-mt">
                        <h2 class="text-center">{{ trans('how-it-works-page.step-1s')}}</h2>
                        <img src="{{ asset('/img/steps/step-1.png') }}" alt="step-1" class="img-responsive">
                        <h4 class="text-center mb-1em">{{ trans('how-it-works-page.step-1h')}}</h4>
                        <p class="text-justify">{{trans('how-it-works-page.step-1')}}</p>
                    </div>

                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 xs-mt">
                        <h2 class="text-center">{{ trans('how-it-works-page.step-2s')}}</h2>
                        <img src="{{ asset('/img/steps/step-2.png') }}" alt="step-2" class="img-responsive">
                        <h4 class="text-center mb-1em">{{trans('how-it-works-page.step-2h')}}</h4>
                        <p class="text-justify">{{trans('how-it-works-page.step-2')}}</p>
                    </div>

                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 xs-mt">
                        <h2 class="text-center">{{ trans('how-it-works-page.step-3s')}}</h2>
                        <img src="{{ asset('/img/steps/step-3.png') }}" alt="step-3" class="img-responsive">
                        <h4 class="text-center mb-1em">{{trans('how-it-works-page.step-3h')}}</h4>
                        <p class="text-justify">{{trans('how-it-works-page.step-3')}}</p>
                    </div>

                    <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-0 xs-mt">
                        <h2 class="text-center">{{ trans('how-it-works-page.step-4s')}}</h2>
                        <img src="{{ asset('/img/steps/step-4.png') }}" alt="step-4" class="img-responsive">
                        <h4 class="text-center mb-1em">{{trans('how-it-works-page.step-4h')}}</h4>
                        <p class="text-justify">{{trans('how-it-works-page.step-4')}}</p>
                    </div>
                </div>
<!-- Tips for success accordion -->
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                        <p class="tips-heading text-center mt-2em">{{ trans('create-project-form.tips-heading') }} </p>
                    </div>
                </div>
                <div class="row mt-2em">
                    <div class="col-md-12 col-sm-12">
                        <div class="panel-group text-center" id="accordion" role="tablist" aria-multiselectable="false">
                            <div class="panel panel-default">
                                <div class="panel-heading " role="tab" id="headingOne">
                                    <h4 class="panel-title">
                                        <a href="#collapseOne" class="tip-title" data-toggle="collapse" data-parent="#accordion" aria-expanded="true" aria-controls="collapseOne">
                                            {{ trans('create-project-form.tip-1-title') }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseOne" role="tabpanel" aria-labelledby="headingOne">
                                    <div class="panel-body tip-explanation text-left">
                                        <p class="tips">{{ trans('create-project-form.tip-1-1') }}</p>
                                    </div>
                                </div>
                            </div> <!-- end tip -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingTwo">
                                    <h4 class="panel-title">
                                        <a href="#collapseTwo" class="collapsed tip-title" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseTwo">
                                            {{ trans('create-project-form.tip-2-title') }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
                                    <div class="panel-body tip-explanation text-left">
                                        <p class="tips">{{ trans('create-project-form.tip-2-1') }}</p>
                                        <p class="tips">{{ trans('create-project-form.tip-2-2') }}</p>
                                    </div>
                                </div>
                            </div> <!-- end tip -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingThree">
                                    <h4 class="panel-title">
                                        <a href="#collapseThree" class="collapsed tip-title" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseThree">
                                            {{ trans('create-project-form.tip-3-title') }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingThree">
                                    <div class="panel-body tip-explanation text-left">
                                        <p class="tips">{{ trans('create-project-form.tip-3-1') }}</p>
                                        <p class="tips">
                                            {{ trans('create-project-form.tip-3-2') }}
                                        </p>
                                        <p class="tips">{{ trans('create-project-form.tip-3-3') }}</p>
                                    </div>
                                </div>
                            </div> <!-- end tip -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFour">
                                    <h4 class="panel-title">
                                        <a href="#collapseFour" class="collapsed tip-title" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFour">
                                            {{ trans('create-project-form.tip-4-title') }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingFour">
                                    <div class="panel-body tip-explanation text-left">
                                        <p class="tips">{{ trans('create-project-form.tip-4-1') }}</p>
                                        <p class="tips">
                                            {{ trans('create-project-form.tip-4-2') }}
                                        </p>
                                        <p class="tips">
                                            {{ trans('create-project-form.tip-4-3') }}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end tip -->
                            <div class="panel panel-default">
                                <div class="panel-heading" role="tab" id="headingFive">
                                    <h4 class="panel-title">
                                        <a href="#collapseFive" class="collapsed tip-title" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" aria-controls="collapseFive">
                                            {{ trans('create-project-form.tip-5-title') }}
                                        </a>
                                    </h4>
                                </div>
                                <div class="panel-collapse collapse" id="collapseFive" role="tabpanel" aria-labelledby="headingFive">
                                    <div class="panel-body tip-explanation text-left">
                                        <p class="tips">{{ trans('create-project-form.tip-5-1') }}</p>
                                        <p class="tips">
                                            {{ trans('create-project-form.tip-5-2') }}
                                        </p>
                                        <p class="tips">
                                            {{ trans('create-project-form.tip-5-3') }}
                                        </p>
                                    </div>
                                </div>
                            </div> <!-- end tip -->
                        </div>
                    </div>
                </div>

<!-- FAQ accordion -->
                <div class="row" id="faq">
                    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center mt-3em mb-1em">
                        <h2 class="heading" id="faq">FAQ</h2>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2>


                    <div class="panel-group" id="faqAccordion" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingOne">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        {{ trans('faq.qu1') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingOne">
                                <div class="panel-body">
                                    {!! trans('faq.an1') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingTwo">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        {{ trans('faq.qu2') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingTwo">
                                <div class="panel-body">
                                    {!! trans('faq.an2') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingThree">
                                <h4 class="panel-title">
                                    <a class="collapsed" data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseThree" aria-expanded="false" aria-controls="collapseThree">
                                        {{ trans('faq.qu3') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingThree">
                                <div class="panel-body">
                                    {!! trans('faq.an3') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingFour">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseFour" aria-expanded="false" aria-controls="collapseFour">
                                        {{ trans('faq.qu4') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingFour">
                                <div class="panel-body">
                                    {!! trans('faq.an4') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingFive">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseFive" aria-expanded="false" aria-controls="collapseFive">
                                        {{ trans('faq.qu5') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingFive">
                                <div class="panel-body">
                                    {!! trans('faq.an5') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingSix">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        {{ trans('faq.qu6') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingSix">
                                <div class="panel-body">
                                    {!! trans('faq.an6') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingSeven">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                        {{ trans('faq.qu7') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingSeven">
                                <div class="panel-body">
                                    {!! trans('faq.an7') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingEight">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseEight" aria-expanded="false" aria-controls="collapseEight">
                                        {{ trans('faq.qu8') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseEight" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingEight">
                                <div class="panel-body">
                                    {!! trans('faq.an8') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingNine">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseNine" aria-expanded="false" aria-controls="collapseNine">
                                        {{ trans('faq.qu9') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseNine" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingNine">
                                <div class="panel-body">
                                    {!! trans('faq.an9') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingTen">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseTen" aria-expanded="false" aria-controls="collapseTen">
                                        {{ trans('faq.qu10') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseTen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingTen">
                                <div class="panel-body">
                                    {!! trans('faq.an10') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingEleven">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseEleven" aria-expanded="false" aria-controls="collapseEleven">
                                        {{ trans('faq.qu11') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseEleven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingEleven">
                                <div class="panel-body">
                                    {!! trans('faq.an11') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingTwelve">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseTwelve" aria-expanded="false" aria-controls="collapseTwelve">
                                        {{ trans('faq.qu12') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseTwelve" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingTwelve">
                                <div class="panel-body">
                                    {!! trans('faq.an12') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingThirteen">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseThirteen" aria-expanded="false" aria-controls="collapseThirteen">
                                        {{ trans('faq.qu13') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseThirteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingThirteen">
                                <div class="panel-body">
                                    {!! trans('faq.an13') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingFourteen">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseFourteen" aria-expanded="false" aria-controls="collapseFourteen">
                                        {{ trans('faq.qu14') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseFourteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingFourteen">
                                <div class="panel-body">
                                    {!! trans('faq.an14') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingFifteen">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseFifteen" aria-expanded="false" aria-controls="collapseFifteen">
                                        {{ trans('faq.qu15') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseFifteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingFifteen">
                                <div class="panel-body">
                                    {!! trans('faq.an15') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingSixteen">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseSixteen" aria-expanded="false" aria-controls="collapseSixteen">
                                        {{ trans('faq.qu16') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseSixteen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingSixteen">
                                <div class="panel-body">
                                    {!! trans('faq.an16') !!}
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default">
                            <div class="panel-heading faq" role="tab" id="faqHeadingSeventeen">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#faqAccordion" href="#faqCollapseSeventeen" aria-expanded="false" aria-controls="collapseSeventeen">
                                        {{ trans('faq.qu17') }}
                                    </a>
                                </h4>
                            </div>
                            <div id="faqCollapseSeventeen" class="panel-collapse collapse" role="tabpanel" aria-labelledby="faqHeadingSeventeen">
                                <div class="panel-body">
                                    {!! trans('faq.an17') !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                {{--</div>--}}


<!-- About us -->
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center mt-3em mb-1em">
                        <h2 class="heading" id="our_goal">{{ trans('app.about-us') }}</h2>
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
                <div class="row mb-1em" id="team">
                    <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center mt-3em mb-1em">
                        <h2 class="heading" id="our_team">{{ trans('app.our-team') }}</h2>
                    </div>
                </div>

                <div class="row form-element text-center">
                    <div class="col-md-4 xs-mt">
                       <h4>Andreas Huber</h4>
                       <p class="team-role">{!! trans('how-it-works-page.team-1') !!}</p>
                       <p class="team"><i class="fa fa-phone"></i><a href="tel:+436801412012"> +43 680 / 14 12 012</a></p>
                       <p class="team"><i class="fa fa-envelope"></i><a href="{{ action('ContactFormController@getContactForm', array('address' => 'bernhard@kinderfoerderungen.at', 'addressee' => 'Bernhard Ehn')) }}"> andreas@kinderfoerderungen.at</a></p>
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
                    <a href="#tips_for_success" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-compass"></i> {{ trans('app.overview') }}</a>
                    <a href="#faq" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-comments-o"></i>FAQ</a>
                    <a href="#our_goal" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-life-ring"></i> {{ trans('app.about-us') }}</a>
                    <a href="#our_team" data-scroll class="list-group-item sidemenu-item"><i class="fa fa-group"></i> {{ trans('app.our-team') }}</a>
                </div>
            </div>

        </div>

@endsection