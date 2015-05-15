<body>
    <h1>{{ trans('project-submit-email.user-title') }}</h1><br/>

    <p>{{ trans('project-submit-email.user-line-1') }} {{$user['first_name'].' '.$user['last_name']}}</p>

    <p>{{ trans('project-submit-email.user-line-2') }}</p>

    <p>{{ trans('project-submit-email.user-line-3') }}</p>

    <p>{{ trans('project-submit-email.user-line-4') }}</p>

    <p>{{ trans('register-page.line-5') }}</p>
    <p>{{ trans('register-page.line-6') }}</p>
</body>