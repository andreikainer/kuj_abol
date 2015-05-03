@extends('app')

@section('content')


<!-- Main content -->
        <div class="container-fluid" role="main">
            <div class="row" id="help-page">

               <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 mt-3em">

                    <div class="no-projects">Have a question? Check out our <a href="{{ action('PagesController@howItWorks') }}" class="button-link">FAQ section</a>, or use the form provided below.
                    <br><br>
                    Our staff will be back to you in 24 hours.</div>

               <!-- to give the user a feedback in a success point, show the success message -->
                    <div class="form-group">
                        @if(Session::has('message_success'))
                        	<div class="image-upload-label text-center">
                          		{{ Session::get('message_success') }}
                          		{{ Session::flash('message_success', 'Thanks for contacting us! Our staff will be back to you in 24 hours.') }}
                        	</div>
                        @endif
                    </div>

               <!-- Contact form -->
                        @include('forms.help-form')


                </div>
            </div><!-- row ends -->

@endsection

@section('additional_js')
    <script src="{{ asset('js/FormValidation.js') }}"></script>
    <script src="{{ asset('js/contact-page/contact.js') }}"></script>
@endsection