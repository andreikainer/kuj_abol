<body>
    <p>Hi, {{ $details['friend_name'] }}</p>

    <p>
        {{ $details['sender_name'] }} wants you to check out this project on kinderörderungen.at,
        Please take a moment to have a look and maybe support this important cause.
    </p>

    <a href="{{ $url }}">{{ $url }}</a>
    <br/><br/>

    <p>Thank you and have a great day!</p>

    <p>Your KuJ Team</p>
</body>