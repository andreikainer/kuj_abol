@extends('app')

@section('content')
    

<!-- Main content -->
        <div class="container-fluid" role="main">
            <div class="row" id="help-page">

                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 mt-3em">

                    <div class="form-explanation">Have a question? Check out our <a href="{{ action('PagesController@createProject') }}" class="button-link">FAQ section</a>, or use the form provided below.
                    <br><br>
                    Our staff will be back to you in 24 hours.</div>

                    <!-- Contact form -->
                        @include('forms.help-form')

                </div>
            </div><!-- row ends -->

@endsection