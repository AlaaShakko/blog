<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>My personal blog</title>

        <link rel="stylesheet" href="/app.css">
        <!--  <script src="/app.js"></script> -->

    </head>

    <body>
        @yield('content')
    </body>
</html>
