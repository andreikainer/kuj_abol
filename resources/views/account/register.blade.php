@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
        <div class="col-md-6 col-sm-10 col-md-offset-3 col-sm-offset-1">
            <div class="register-container form-element">
                <div class="row">
                    <div class="col-md-12 col-sm-12 content">
                        @include('forms.register-form')
                    </div>
                </div>
            </div>
        </div>
	</div>

@endsection

@section('additional_js')
<script src="{{ asset('js/FormValidation.js') }}"></script>
        <script src="{{ asset('js/timing.js') }}"></script>
        <script src="{{ asset('js/register-page/register-page.js') }}"></script>
@endsection
