<!-- extend from layout.blade to avoid duplications -->

<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-6xl mx-auto mt-10 lg:mt-20 space-y-6">
            <article class="max-w-4xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                <div class="col-span-4 lg:text-center lg:pt-14 mb-10">
                    <img src= "{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">
                 {{--   <img src="/storage/ {{$post ->thumbnail}}" alt="" class="rounded-xl">--}}

                    <p class="mt-4 block text-gray-400 text-xs">
                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                    </p>

                    <div class="flex items-center lg:justify-center text-sm mt-4">
                        <img src="/images/lary-avatar.svg" alt="Lary avatar">
                        <div class="ml-3 text-left">
                            <h5 class="font-bold">
                                <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                            </h5>
                        </div>
                    </div>

                </div>
                {{--Back to posts pages Section--}}
                <div class="col-span-8">
                    <div class="hidden lg:flex justify-between mb-6">
                        <a href="/"
                           class="transition-colors duration-300 relative inline-flex items-center text-lg hover:text-blue-500">
                            <svg width="22" height="22" viewBox="0 0 22 22" class="mr-2">
                                <g fill="none" fill-rule="evenodd">
                                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                                    </path>
                                    <path class="fill-current"
                                          d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z">
                                    </path>
                                </g>
                            </svg>
                            Back to Posts
                        </a>
                        <div class="space-x-2">
                            <x-category-button :category="$post->category"></x-category-button>
                            {{--this will show the categoy button multiple times so we created category button component to avoid duplicts--}}
                          {{--  <a href="/categories/{{$post->category->slug}}"
                               class="px-3 py-1 border border-blue-300 rounded-full text-blue-300 text-xs uppercase font-semibold"
                               style="font-size: 10px">{{$post->category->name}}</a>--}}
                        </div>
                    </div>

                    {{--Title Section--}}
                    <h1 class="font-bold text-3xl lg:text-4xl mb-10">
                        {{$post ->title}}
                    </h1>

                    {{--Post Body Section--}}
                    <div class="space-y-4 lg:text-lg leading-loose">
                        {!! $post->body !!}
                    </div>
                </div>

                {{--COMMENTS SECTION--}}
                <section class="col-span-8 col-start-5 mt-10 space-y-6">

                    @include('posts._add-comment-form')

                    {{--comments--}}
                    @foreach ($post->comments as $comment)
                        <x-post-comment :comment="$comment"></x-post-comment>
                    @endforeach
                    {{--<x-post-comment></x-post-comment>
                    <x-post-comment></x-post-comment>
                    <x-post-comment></x-post-comment>
                    <x-post-comment></x-post-comment>--}}
                </section>
            </article>
        </main>
    </section>
</x-layout>


    {{--  @section('content')
          <article>
              <h1> {!! $post ->title !!} </h1>

              <p>
                  By <a href="/authors/{{$post->author->username}}">{{$post->author->name}}</a> in <a href="/categories/{{$post->category->slug}}">{{$post->category->name}}</a>
              </p>

              <div>
                  {!! $post->body !!}
              </div>
          </article>

          <a href="/">Go back</a>
      @endsection
      --}}

