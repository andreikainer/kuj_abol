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
                    <li class="form-section-tab form-section-tab-active text-center">Start</li>
                    <li class="form-section-tab text-center">Project Details</li>
                    <li class="form-section-tab text-center">Your Details</li>
                    <li class="form-section-tab text-center">Supporting Evidence</li>
                    <li class="form-section-tab text-center">Summary</li>
                    {{--<li class="form-section-tab text-center">Start</li>--}}
                    {{--<li class="form-section-tab text-center">Projektdetails</li>--}}
                    {{--<li class="form-section-tab text-center">Deine Angaben</li>--}}
                    {{--<li class="form-section-tab text-center">Antragsunterlagen</li>--}}
                    {{--<li class="form-section-tab text-center">Zusammenfassung</li>--}}
                </ul>
            </div>
        </div> <!-- end section tabs -->
        @include('forms.create-project-form')
    </div>
    <div class="col-md-4 col-sm-4 mt-3em">
        <aside class="form-element form-border">
            Aside content.
        </aside>
    </div>
@endsection