<h1>{{ trans('register-page.line-1') }}</h1><br/><br/>

<p>{{ trans('register-page.line-2') }} {{ $user['first_name'] }} {{ $user['last_name'] }}</p>
<p>{{ trans('register-page.line-3') }}</p>
<p>{{ trans('register-page.line-4') }}</p>

{{ URL::to(LaravelLocalization::getCurrentLocale().'/'.trans('routes.account/verify').'/'.$user['confirmation_code']) }}<br/><br/>

<p>{{ trans('register-page.line-5') }}</p>
<p>{{ trans('register-page.line-6') }}</p>