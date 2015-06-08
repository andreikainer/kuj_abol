<body>

    {!! trans('emails.password-reset') !!}

    <p>
        <a href="{{ url('password/reset/'.$token) }}">{{ trans('emails.reset-link') }}</a>
    </p>

    {!! trans('emails.signature') !!}

</body>

