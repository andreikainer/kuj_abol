<html>
<head>
    <title>Payment Test</title>
</head>
<body>
<form method="POST">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <input type="submit" value="Try it" />
</form>
</body>
</html>