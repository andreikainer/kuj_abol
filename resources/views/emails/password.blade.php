<body>

    <h2>Hi!</h2>
    <p>you have received an email from kinderfoerderungen.at</p>

    <p>
        To reset you password, please, click the link below:
    </p>

    <p>
        {{ url('password/reset/'.$token) }}
    </p>

    <p>
        Kind regards,
        kinderfoerderungen.at team
    </p>

</body>

