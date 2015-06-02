@extends('app')

@section('content')

    <div class="container-fluid" role="main">
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center mt-3em mb-1em">
                <h2 class="heading" id="faq">{{ trans('routes.imprint') }}</h2>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2">
                <div class="form-element imprint">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <h4> Firmensitz & Seiteninhaber:</h4><p> AK Sponsoring-Agentur GmbH</br> Mühlhofstraße 3/2/12</br>2524 Teesdorf<p/>
                            <h4>Bankverbindung:</h4> <p>Bank: Sparkasse Baden</br> IBAN: AT63 20205 01000 015501</br> BIC: SPBDAT 21XXX</p>
                            <h4>Handelsgericht:</h4> <p>Landesgericht: Wiener Neustadt</br> Firmenbuchnummer: 403967w</br> UID: ATU 68 201 901</p>
                            </br>
                            <h4>Zu Webanalysediensten:</h4>

                            <p class="text-justify">Diese Website benutzt Google Analytics, einen Webanalysedienst der Google Inc. („Google“). Google Analytics verwendet sog. „Cookies“, Textdateien, die auf Ihrem Computer gespeichert werden und die eine Analyse der Benutzung der Website durch Sie ermöglichen. Die durch den Cookie erzeugten Informationen über Ihre Benutzung dieser Website (einschließlich Ihrer IP-Adresse) wird an einen Server von Google in den USA übertragen und dort gespeichert. Google wird diese Informationen benutzen, um Ihre Nutzung der Website auszuwerten, um Reports über die Websiteaktivitäten für die Websitebetreiber zusammenzustellen und um weitere mit der Websitenutzung und der Internetnutzung verbundene Dienstleistungen zu erbringen. Auch wird Google diese Informationen gegebenenfalls an Dritte übertragen, sofern dies gesetzlich vorgeschrieben oder soweit Dritte diese Daten im Auftrag von Google verarbeiten. Google wird in keinem Fall Ihre IP-Adresse mit anderen Daten von Google in Verbindung bringen.</br> Sie können die Installation der Cookies durch eine entsprechende Einstellung Ihrer Browser Software verhindern; wir weisen Sie jedoch darauf hin, dass Sie in diesem Fall gegebenenfalls nicht sämtliche Funktionen dieser Website vollumfänglich nutzen können. Durch die Nutzung dieser Website erklären Sie sich mit der Bearbeitung der über Sie erhobenen Daten durch Google in der zuvor beschriebenen Art und Weise und zu dem zuvor benannten Zweck einverstanden.</p>
                            </br>
                            <p>Stock photos by shutterstock.com</p>
                            <p class="no-bottom-margin">&copy;Copyright AK Sponsoring Agentur GmbH {{ Carbon\Carbon::now()->year }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection