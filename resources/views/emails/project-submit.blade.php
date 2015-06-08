<body>
    <h1>{{ trans('project-submit-email.admin-title') }}</h1><br/>

    <p>{{ trans('project-submit-email.admin-line-1') }}</p>

    <p>{{ trans('project-submit-email.admin-line-2') }}</p>

    <p>{{ trans('project-submit-email.admin-line-3') }}</p>

    {{ URL::to(LaravelLocalization::getCurrentLocale().'/'.$project['slug']) }}
</body>