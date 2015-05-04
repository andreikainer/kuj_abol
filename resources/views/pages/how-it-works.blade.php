@extends('app')

@section('content')

    <div class="container-fluid" role="main">

            {{--<div class="row">--}}
                {{--how it works--}}
            {{--</div>--}}

        <div class="row">

            <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em">
                <h2 class="heading" id="our_goal">{{ trans('how-it-works-page.our-goal') }}</h2>
            </div>

        </div>

                    <div class="row">


@endsection

@section('additional_js')
    {{--<script src="{{ asset('js/home-page/home.js') }}"></script>--}}
@endsection