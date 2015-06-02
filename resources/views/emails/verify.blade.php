<body>
    <h1>{{ trans('register-page.line-1') }}</h1><br/>

    <p>{{ trans('register-page.line-2') }} {{ $user['first_name'] }} {{ $user['last_name'] }}</p>
    <p>{!! trans('register-page.line-3') !!}</p>
    <p>{{ trans('register-page.line-4') }}</p>

    <a href="{{ URL::to(LaravelLocalization::getCurrentLocale().'/'.trans('routes.account/verify').'/'.$user['confirmation_code']) }}">Meine E-Mail Adresse bestätigen.</a><br/><br/>

    <p>{{ trans('register-page.line-5') }}</p>
    <p>{{ trans('register-page.line-6') }}</p>
</body>