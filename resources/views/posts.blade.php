<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>personal blog</title>

        <link rel="stylesheet" href="/app.css">
      <!--  <script src="/app.js"></script> -->

    </head>


    <body>
    @foreach ($posts as $post)
    <article class="{{$loop->even ? 'foobar' : '' }}">
        <h1>
            <a href="/posts/{{$post->slug}}">
                {{$post->title}} </a>
        </h1>
        <div>
            {{ $post->excerpt }}
        </div>
    </article>

    @endforeach

    </body>
</html>
