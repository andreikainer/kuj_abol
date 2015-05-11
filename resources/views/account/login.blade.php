@extends('app')
@section('content')

<!-- Main content -->
        <div class="container-fluid" role="main">
            <div class="row" id="login-page">

               <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-6 col-md-offset-3 mt-2em form-element">

                    {{--<div class="no-projects">{!! trans('contact-page.pre-form', ['cta-link' => trans('routes.how-it-works')]) !!}</div>--}}

               <!-- to give the user a feedback in a success logout point, show the success message -->
                    <div class="form-group">
                        @if(Session::has('message_logout'))
                        	<div class="image-upload-label text-center">
                          		{{ Session::get('message_logout') }}
                          		{{ Session::flash('message_logout', trans('login-page.logout')) }}
                        	</div>
                        @endif
                    </div>

               <!-- Login form -->
                        @include('forms.login-form')


                </div>
            </div><!-- row ends -->
{{--<div class="container-fluid">--}}
	{{--<div class="row">--}}
		{{--<div class="col-md-8 col-md-offset-2">--}}
			{{--<div class="panel panel-default">--}}
				{{--<div class="panel-heading">Login</div>--}}
				{{--<div class="panel-body">--}}
					{{--@if (count($errors) > 0)--}}
						{{--<div class="alert alert-danger">--}}
							{{--<strong>Whoops!</strong> There were some problems with your input.<br><br>--}}
							{{--<ul>--}}
								{{--@foreach ($errors->all() as $error)--}}
									{{--<li>{{ $error }}</li>--}}
								{{--@endforeach--}}
							{{--</ul>--}}
						{{--</div>--}}
					{{--@endif--}}

					{{--<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">--}}
						{{--<input type="hidden" name="_token" value="{{ csrf_token() }}">--}}

						{{--<div class="form-group">--}}
							{{--<label class="col-md-4 control-label">E-Mail Address</label>--}}
							{{--<div class="col-md-6">--}}
								{{--<input type="email" class="form-control" name="email" value="{{ old('email') }}">--}}
							{{--</div>--}}
						{{--</div>--}}

						{{--<div class="form-group">--}}
							{{--<label class="col-md-4 control-label">Password</label>--}}
							{{--<div class="col-md-6">--}}
								{{--<input type="password" class="form-control" name="password">--}}
							{{--</div>--}}
						{{--</div>--}}

						{{--<div class="form-group">--}}
							{{--<div class="col-md-6 col-md-offset-4">--}}
								{{--<div class="checkbox">--}}
									{{--<label>--}}
										{{--<input type="checkbox" name="remember"> Remember Me--}}
									{{--</label>--}}
								{{--</div>--}}
							{{--</div>--}}
						{{--</div>--}}

						{{--<div class="form-group">--}}
							{{--<div class="col-md-6 col-md-offset-4">--}}
								{{--<button type="submit" class="btn btn-primary">Login</button>--}}

								{{--<a class="btn btn-link" href="{{ url('/password/email') }}">Forgot Your Password?</a>--}}
							{{--</div>--}}
						{{--</div>--}}
					{{--</form>--}}
				{{--</div>--}}
			{{--</div>--}}
		{{--</div>--}}
	{{--</div>--}}
@endsection

@section('additional_js')
    <script src="{{ asset('/js/FormValidation.js') }}"></script>
    <script src="{{ asset('/js/login-page/login.js') }}"></script>
@endsection