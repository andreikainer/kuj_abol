@extends('app')
@section('content')

<!-- Main content -->
        <div class="container-fluid" role="main">
            <div class="row" id="login-page">

               <div class="col-xs-12 col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3 mt-2em form-element">

               <!-- Login form -->
                        @include('forms.login-form')


                </div>
            </div><!-- row ends -->

@endsection

@section('additional_js')
    <script src="{{ asset('/js/FormValidation.js') }}"></script>
    <script src="{{ asset('/js/login-page/login.js') }}"></script>
@endsection