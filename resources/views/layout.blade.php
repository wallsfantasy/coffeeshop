<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Coffeeshop</title>

    <link rel="stylesheet" href="{{ mix('/css/app.css') }}">
    <link rel="script" href="{{ mix('/js/app.js') }}">
</head>
<body>

    <div class="container">
        @yield('content')
    </div>

</body>
