<body>

    <h2>{! trans('emails.dear') !}Dear {{ $data['toWhom'] }}</h2>
    <p>you have received an email from</p>

    <p>
        <strong>{! trans('emails.name') !} </strong> {{ $name }}
    </p>

    <p>
        <strong>{! trans('emails.email') !} </strong> {{ $email }}
    </p>

    <p>
        <strong>{! trans('emails.enquiry') !} </strong><br>
        {{ $message_body }}
    </p>

</body>
