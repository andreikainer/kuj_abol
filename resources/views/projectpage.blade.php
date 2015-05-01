@extends('app')

@section('content')
    <!-- Facebook JS import -->
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/de_DE/sdk.js#xfbml=1&version=v2.3&appId=924969747560616";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));
    </script>

    <div class="container-fluid">
        <div class="row" role="main"> <!--Body content-->

            <div class="row">
            <div class="col-md-6 col-md-offset-3 col-sm-12 text-center"> <!-- project title beginn-->
                <h2 class="heading">Rollstuhlrampe für Hansi</h2>
            </div> <!-- project title end-->
            </div>

            <div class="row">
            <div class="col-sm-12 col-md-8"> <!-- project images beginn-->
                <img class="img-responsive center-block" src="{{ asset('/img/hansi.png') }}">
            </div> <!-- project images end-->

            <div id="project_statistics" class="col-sm-12 col-md-4 text-center boarder">  <!-- statistics beginn-->
                <h3>Total funds raised:</h3>
                <h2><strong>&euro; 2359,53</strong></h2>
                <h4>of &euro; 2000,-- minimum goal</h4>
                <div class="progress" style="height:3em">
                    <div id="progress-bar" class="progress-bar prog-bar-green" role="progressbar" aria-valuenow="5" aria-valuemin="0" aria-valuemax="100" style="width:40%;"><span>40%</span>
                    </div>
                </div>
                <h3>Project ends in:</h3>
                <div id="countdown" data-date="27-05-2015" data-time="19:36" data-timezone="2" data-final="Abgeschloßen">
                    <div class="countdown-value"><span id="countdown-days">0</span></div>:
                    <div class="countdown-value"><span id="countdown-hours">0</span></div>:
                    <div class="countdown-value"><span id="countdown-minutes">0</span></div>:
                    <div class="countdown-value"><span id="countdown-seconds">0</span></div>
                    <div id="time"><strong>Tage</strong><strong>Stunden</strong><strong>Minuten</strong><strong>Sekunden</strong></div>
                </div>
                <div class="btn button-main contribute">Fund this project</div>
                <div class="heading"></div>
                <div id="facebook-share" class="btn pull-left">
                    {{--<div class="fb-share-button" data-href="https://kinderfoerderungen.at" data-layout="button_count" style="width:100%;"></div>--}}
                    <a href="https://www.facebook.com/dialog/share?app_id=924969747560616&display=iframe&href=http://kinderfoerderungen.at&redirect_uri=http://kinderfoerderungen.at"><img src="{{ asset('/img/facebook_teilen.svg') }}" alt="facebook-share" width="100%"></a>
                </div>
                <div id="favorite" class="btn pull-left">
                    <img src="{{ asset('/img/merken.svg') }}" alt="favorite-button" width="100%">
                </div>
            </div> <!-- statistics end-->
            </div>

            <div class="row">
            <div class="col-sm-12 col-md-8 text-center l-font"> <!-- project description beginn-->
                <h2>Rollstuhlrampe für Hansi</h2>
                <p>Wie heute kurz telefonisch besprochen, ist der 9 jährige Hansi von
                    Geburt auf sehr schwer körperlich behindert und sitzt aufgrund
                    dessen auch im Rollstuhl und muss von seinen Eltern rund um die
                    Uhr versorgt werden.
                    Dazu kommt noch, dass er zur Gänze mit Astronautennahrung
                    ernährt werden muss. Das allein kostet schon sehr viel Geld. Um
                    auch Hansi’s oftmalige und wichtige Arztbesuche und Therapien
                    den Eltern zu erleichtern, wird eine Rollstuhlrampe für das Auto
                    dringend benötigt. Wir bitten um Ihre Mithilfe!
                    Für Hansi und seine Familie haben wir ein Bausteinsystem
                    aufgelegt. Ein Baustein kommt auf € 150,- + Ust, für die Sie
                    selbstverständlich eine ordnungsgemäße Rechnung erhalten die
                    beim Finanzamt als Werbeausgabe geltend gemacht werden kann..</p>
                <p>Sie erhalten folgende Bedankungsformen von uns:
                    Darstellung Ihres Unternehmens (Firmenname & Ort) auf unserer Homepage
                    im Bereich BAUSTEIN SPONSOREN. Auf Wunsch auch mit Firmenlogo.
                    Auf Anfrage übertragen wir Ihnen unseren „Offizieller Sponsor von Kinder- und
                    Jugendförderungen“- Banner den Sie für Ihre eigene Homepage sowie Druckmittel
                    verwenden können.
                    Kinder- und Jugendförderungen hilft unbürokratisch dort wo kranke, behinderte und benachteiligte
                    Kinder die finanziellen und organisatorischen Möglichkeiten versagt sind.
                    Um mehr Informationen zu erhalten besuchen Sie unsere Homepage sowie Facebook Seite:</p>
                <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci assumenda commodi consequuntur corporis dignissimos ducimus earum explicabo illo, nostrum obcaecati odit quasi sequi soluta sunt voluptatum. Deserunt ea facere totam!</span><span>Consectetur dolorem molestiae mollitia porro quasi? Doloribus harum provident quod reprehenderit unde. A distinctio fugit quas! Alias consequatur dolorum ducimus eaque esse iusto, necessitatibus optio quo, reiciendis, rem suscipit voluptates.</span><span>Adipisci assumenda delectus dignissimos eaque, facere itaque perspiciatis qui quidem totam? Blanditiis delectus deserunt dignissimos doloremque enim esse ex incidunt iure, laborum necessitatibus nisi, nostrum officia soluta suscipit, veniam voluptas!</span><span>Ab amet consequuntur debitis error ex expedita fuga fugiat magni nemo nostrum, officiis perspiciatis placeat praesentium repellendus, suscipit ut vero? Assumenda doloremque minus rem saepe? Deserunt excepturi ipsa maiores quasi.</span><span>Aliquid architecto at atque consequuntur culpa delectus dignissimos dolore ea eius esse et fuga, harum hic ipsum, itaque minima minus nemo nisi nobis rem repudiandae tenetur vitae voluptas. Qui, quod?</span></p>
            </div> <!-- project description end-->

            <div id="contribution-packs" class="col-sm-12 col-md-4 text-center clearfix"> <!-- contribution packages beginn-->
                <h2 class="heading">Support Options:</h2>
                <a href="#" role="button"><div class="pack1 padding-none pull-left"> <!-- contribution package 1-->
                    <h3>Business-Building-Block <br>
                        &euro; 150,00 + Tax each</h3>
                    <h4>This is our special offer for businesses. Fund this project with one or more "Blocks" and receive this in return:</h4>
                        <ul>
                            <li class="list-item">Logo-Display on our website for 3 months</li>
                            <li class="list-item">Linked to your own website for 3 months</li>
                            <li class="list-item">On request: Transfer of Official Sponsor of KuJ Button</li>
                            <li class="list-item">One time business listing in our Newsletter (2000 recipients)</li>
                            <li class="list-item">Your contribution is 100% tax deductible</li>
                            <li class="list-item">Official KuJ Sponsor Certificate</li>
                        </ul>
                </div></a>
                <a href="#" role="button"><div class="packs2-4 padding-none pull-right"> <!-- contribution package 2-->
                    <h3>Small-Building-Block  | &euro; 15,00</h3>
                        <ul>
                            <li class="list-item">{{ trans('lang.building-block-text1', ['euro' => '&euro; 15,00']) }}</li>
                            <li class="list-item">{{ trans('lang.building-block-text2') }}</li>
                            <li class="list-item">{{ trans('lang.building-block-text3') }}</li>
                        </ul>
                </div></a>
                <a href="#" role="button"><div class="packs2-4 padding-none pull-right"> <!-- contribution package 3-->
                    <h3>Medium-Building-Block | &euro; 25,00</h3>
                        <ul>
                            <li class="list-item">{{ trans('lang.building-block-text1', ['euro' => '&euro; 25,00']) }}</li>
                            <li class="list-item">{{ trans('lang.building-block-text2') }}</li>
                            <li class="list-item">{{ trans('lang.building-block-text3') }}</li>
                        </ul>
                </div></a>
                    <a href="#" role="button"><div class="packs2-4 padding-none pull-left"> <!-- contribution package 4-->
                    <h3>Large-Building-Block  | &euro; 50,00 or more</h3>
                        <ul>
                            <li class="list-item">{{ trans('lang.building-block-text1', ['euro' => '&euro; 50,00']) }}</li>
                            <li class="list-item">{{ trans('lang.building-block-text2') }}</li>
                            <li class="list-item">{{ trans('lang.building-block-text3') }}</li>
                        </ul>
                </div></a>
            </div> <!-- contribution packages end-->
            </div>

            <div class="col-sm-12" style="background:red;"> <!-- sponsors row beginn-->
                Olga's Sponsors row
            </div> <!-- sponsors row end-->
        </div> <!-- main content end -->
@endsection

@section('additional_js')
    <script src="{{ asset('js/view-project-page/view-project.js') }}"></script>
@endsection