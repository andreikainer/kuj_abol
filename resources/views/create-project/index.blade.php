@extends('app')

@section('content')
    <div class="col-md-6 col-sm-6 col-md-offset-3 col-sm-offset-3 text-center mt-3em">
        <h2 class="heading">Create Project</h2>
    </div>-
    <div class="col-md-8 col-sm-8 mt-3em">
        <!-- Section Tabs -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <ul class="form-section-tab-container clearfix">
                    <li class="form-section-tab form-section-tab-active text-center" data-section="1">Start</li>
                    <li class="form-section-tab text-center" data-section="2">Project Details</li>
                    <li class="form-section-tab text-center" data-section="3">Your Details</li>
                    <li class="form-section-tab text-center" data-section="4">Supporting Evidence</li>
                    <li class="form-section-tab text-center" data-section="5">Summary</li>
                    {{--<li class="form-section-tab text-center" data-section="1">Start</li>--}}
                    {{--<li class="form-section-tab text-center" data-section="2">Projektdetails</li>--}}
                    {{--<li class="form-section-tab text-center" data-section="3">Deine Angaben</li>--}}
                    {{--<li class="form-section-tab text-center" data-section="4">Antragsunterlagen</li>--}}
                    {{--<li class="form-section-tab text-center" data-section="5">Zusammenfassung</li>--}}
                </ul>
            </div>
        </div> <!-- end section tabs -->
        <div class="row">
            <div class="col-md-12 col-sm-12">
                @include('forms.create-project-form')
            </div>
        </div> <!-- end form -->
    </div>
    <div class="col-md-4 col-sm-4 mt-3em">
        <aside class="form-element">
            Aside content.
        </aside>
    </div>
@endsection

@section('additional_js')
    <script src="{{ asset('js/create-project-page/create-project.js') }}"></script>
@endsection