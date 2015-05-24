<body>

    {! trans('emails.password-reset') !}

    <p>
        {{ url('password/reset/'.$token) }}
    </p>

    {! trans('emails.signature') !}

</body>

