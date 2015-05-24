@extends('app')

@section('content')


<!-- Main content -->
        <div class="container-fluid" role="main">
            <div class="row" id="help-page">

               <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 mt-2em form-element">

                    <div class="no-projects">{!! trans('contact-page.pre-form', ['cta-link' => trans('routes.how-it-works'), 'faq' => '#faq']) !!}</div>

               <!-- Contact form -->
                        @include('forms.help-form')


                </div>
            </div><!-- row ends -->

@endsection

@section('additional_js')
    <script src="{{ asset('js/FormValidation.js') }}"></script>
    <script src="{{ asset('js/contact-page/contact.js') }}"></script>
@endsection