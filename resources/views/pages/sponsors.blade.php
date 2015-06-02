@extends('app')

@section('content')

    <div class="container-fluid" role="main" id="sponsors-page">
        <!-- top sponsors -->
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center mt-3em mb-1em">
                <h2 class="heading" id="faq">{{ trans('app.top-sponsors') }}</h2>
            </div>
        </div>

        <div class="row sponsors">
            <div class="col-sm-10 col-sm-offset-1 mt-2em">
                <div class="row">

                    @foreach($top_sponsors as $top_sponsor)
                        <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0 col-md-3 img-responsive mb-1em">
                            <a href="{{ $top_sponsor->url }}"><div class="logo-name img-responsive text-center hidden">{{$top_sponsor->business_name}}</div>
                                <img src="{{ asset('img/logos/' . $top_sponsor->logo) }}" class="img-responsive form-element" alt="{{ $top_sponsor->business_name }}"></a>
                            <a><h4>Unternehmensbeschreibung</h4></a>
                        </div>

                    @endforeach
                </div>
            </div>
        </div>
        <!-- sponsors -->
        <div class="row">
            <div class="col-md-8 col-sm-8 col-md-offset-2 col-sm-offset-2 text-center mt-3em mb-1em">
                <h2 class="heading" id="faq">{{ trans('app.our-sponsors') }}</h2>
            </div>
        </div>

        <div class="row sponsors">
             <div class="col-sm-10 col-sm-offset-1 mt-2em">
                <div class="row">

        @foreach($logos as $logo)
            <div class="col-xs-8 col-xs-offset-2 col-sm-4 col-sm-offset-0 col-md-3 img-responsive mb-1em">
                <a href="{{ $logo->url }}"><div class="logo-name img-responsive text-center hidden">{{$logo->business_name}}</div>
                <img src="{{ asset('img/logos/' . $logo->logo) }}" class="img-responsive form-element" alt="{{ $logo->business_name }}"></a>
            </div>
        @endforeach
                </div>
            </div>
        </div>

@endsection

@section('additional_js')
    <script src="{{ asset('js/home-page/sponsors-page.js') }}"></script>
@endsection