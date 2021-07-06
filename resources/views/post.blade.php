<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>personal blog</title>

        <link rel="stylesheet" href="/app.css">
      <!--  <script src="/app.js"></script> -->

    </head>

    <body>

    <article>
        <h1> {{$post->title}} </h1>

        <div>
            {!! $post->body !!}
        </div>
    </article>

    <a href="/">Go back</a>

    </body>
</html>
