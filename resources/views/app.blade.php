<html>
    <head>
        <title>kinderfoerderungen.at</title>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}"/>
        <style>
            .box1 {
                background: red;
            }

            .box2 {
                background: #008000;
            }
        </style>
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>
    </body>
</html>