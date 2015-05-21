@extends('app')

@section('content')

<!-- Main content -->
        <div class="container-fluid" role="main">
            <div class="row" id="send-reset-link-page">

               <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 mt-2em form-element content">

                    <div class="no-projects">{{ trans('login-page.reset') }}</div>


			        <!-- Send a reset link form -->
                         @include('forms.send-reset-link-form')
               </div>
            </div>


@endsection

@section('additional_js')
    <script src="{{ asset('/js/FormValidation.js') }}"></script>
    <script src="{{ asset('/js/login-page/send-reset.js') }}"></script>
@endsection
