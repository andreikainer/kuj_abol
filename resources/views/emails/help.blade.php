<body>

    {{--<h2>{!! trans('emails.dear') !!}Dear {{ $data['toWhom'] }}</h2>--}}
    <p>{!! trans('emails.hi') !!}</p>

    <p>
        <strong>{!! trans('emails.name') !!} </strong> {{ $name }}
    </p>

    <p>
        <strong>{!! trans('emails.email') !!} </strong> {{ $email }}
    </p>

    <p>
        <strong>{!! trans('emails.enquiry') !!} </strong><br>
        {{ $message_body }}
    </p>

    <p>{!! trans('emails.signature') !!}</p>

</body>
