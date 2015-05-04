@extends('app')

@section('content')


<!-- Main content -->
        <div class="container-fluid" role="main">
            <div class="row" id="help-page">

               <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 mt-3em">

                    <div class="no-projects">{!! trans('contact-page.pre-form', ['cta-link' => trans('routes.how-it-works')]) !!}</div>

               <!-- to give the user a feedback in a success point, show the success message -->
                    <div class="form-group">
                        @if(Session::has('message_success'))
                        	<div class="image-upload-label text-center">
                          		{{ Session::get('message_success') }}
                          		{{ Session::flash('message_success', trans('contact-page.thanks')) }}
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