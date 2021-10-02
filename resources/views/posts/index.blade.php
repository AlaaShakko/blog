<!DOCTYPE html>

<!-- extend from layout.blade to avoid duplications -->

<x-layout>

    @include('posts._header')


    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">

        @if($posts->count())
            <x-posts-grid :posts="$posts"></x-posts-grid>

            {{$posts->links()}}
        @else
            <p class="text-center">No Posts yet.Please try again Later ;)</p>
        @endif

      {{--  <!--grid contains 2 columns = each column for a post = 2 posts -->
        <div class="lg:grid lg:grid-cols-2">

            <x-post-card/>

            <x-post-card/>
        </div>

        <!--grid contains 3 columns = each column for a post = 3 posts  -->
        <div class="lg:grid lg:grid-cols-3">

            <x-post-card/>
            <x-post-card/>
            <x-post-card/>

        </div>--}}
    </main>

    {{--  @section('content')
          @foreach ($posts as $post)
              <article>
                  <h1>
                      <a href="/posts/{{$post->slug}}">
                          {!!$post->title!!} </a>
                  </h1>

                  <p>
                      By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
                  </p>

                  <div>
                      {{ $post->excerpt }}
                  </div>
              </article>
          @endforeach
      @endsection--}}

</x-layout>
