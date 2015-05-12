@extends('app')
@section('content')

<!-- Main content -->
        <div class="container-fluid" role="main">
            <div class="row">

                <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 mt-2em form-element">

                    <p>Hello, {{ Session::get('username') }}</p>

                </div>
            </div>


@endsection

@section('additional_js')
    <script src="{{ asset('/js/FormValidation.js') }}"></script>
@endsection