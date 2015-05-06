@extends('app')

@section('content')

    <div class="container-fluid" role="main">

        <div class="row" id="how-it-works">
            <div class="hidden-xs hidden-sm col-md-2 add-nav">
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
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em mb-1em">
                        <h2 class="heading" id="tips_for_success">{{ trans('how-it-works-page.tips-for-success') }}</h2>
                    </div>
                </div>
                <div class="row form-element">
                    <div class="col-md-3 col-md-offset-1 xs-mt">Step 1</div>
                    <div class="col-md-3 col-md-offset-1 xs-mt">Step 1</div>
                    <div class="col-md-3 col-md-offset-1 xs-mt">Step 1</div>
                </div>

<!-- FAQ -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em mb-1em">
                        <h2 class="heading" id="faq">FAQ</h2>
                    </div>
                </div>

                <div class="row form-element">
                    <div class="col-xs-12 text-left">
                        <h4>Question</h4>
                        <p>Answer Lorem ipsum dolor sit amet, consectetur adipisicing elit. A architecto atque consectetur deserunt esse excepturi laboriosam officia optio perspiciatis placeat reiciendis repellat repellendus saepe, sed sequi totam vitae voluptate voluptatibus.</p>

                        <h4>Question</h4>
                        <p>Answer Lorem ipsum dolor sit amet, consectetur adipisicing elit. A amet aspernatur assumenda aut autem ea eveniet illo maxime, minima numquam obcaecati odit perferendis quae quaerat quo repudiandae sit temporibus voluptas!</p>

                        <h4>Question</h4>
                        <p>Answer Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium amet deleniti excepturi facere fuga fugiat inventore maxime molestias, mollitia nihil perspiciatis quae quia rerum sed similique sit unde vero? Modi.</p>
                    </div>
                </div>

<!-- Our goal -->
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em mb-1em">
                        <h2 class="heading" id="our_goal">{{ trans('how-it-works-page.our-goal') }}</h2>
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
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em mb-1em">
                        <h2 class="heading" id="our_team">{{ trans('how-it-works-page.our-team') }}</h2>
                    </div>
                </div>

                <div class="row form-element text-center">
                    <div class="col-md-4 xs-mt">
                       <h4>Andrei Kainer</h4>
                       <p class="team-role">{!! trans('how-it-works-page.team-1') !!}</p>
                       <p class="team"><i class="fa fa-phone"></i><a href="tel:+436801412012"> +43 680 / 14 12 012</a></p>
                       <p class="team"><i class="fa fa-envelope"></i><a href="{{ action('ContactFormController@getContactForm', ['address' => 'o.smirnova1986@gmail.com', 'addressee' => 'Andrei Kainer']) }}"> andrei@kinderfoerderungen.at</a></p>
                    </div>
                    <div class="col-md-4 xs-mt">
                       <h4>Wilhelmine Bauer</h4>
                       <p class="team-role">{!! trans('how-it-works-page.team-2') !!}</p>
                       <p class="team"><i class="fa fa-phone"></i><a href="tel:+4366488299611"> +43 664 / 88 299 611</a></p>
                       <p class="team"><i class="fa fa-envelope"></i><a href="{{ action('ContactFormController@getContactForm', ['address' => 'ladiez.os6@gmail.com', 'addressee' => 'Wilhelmine Bauer']) }}"> wilhelmine@kinderfoerderungen.at</a></p>
                    </div>
                    <div class="col-md-4 xs-mt">
                       <h4>Ingeborg Kubita</h4>
                       <p class="team-role">{!! trans('how-it-works-page.team-2') !!}</p>
                       <p class="team"><i class="fa fa-phone"></i><a href="tel:+4366488299610"> +43 664 / 88 299 610</a></p>
                       <p class="team"><i class="fa fa-envelope"></i><a href="{{ action('ContactFormController@getContactForm', ['address' => 'o.smirnova1986@gmail.com', 'addressee' => 'Ingeborg Kubita']) }}"> ingeborg@kinderfoerderungen.at</a></p>
                    </div>
                </div>
            </div>

            </div>

@endsection

@section('additional_js')
    {{--<script src="{{ asset('js/home-page/home.js') }}"></script>--}}
@endsection