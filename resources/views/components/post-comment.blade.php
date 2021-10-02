@props(['comment'])
{{--Styling panel--}}
<x-panel class="bg-gray-100">
<article class="flex  space-x-5">
    {{--left side == user logo'avatar'--}}
    <div class="flex-shrink-0">
        <img src="https://i.pravatar.cc/100?u={{$comment->user_id}}" alt="" class="rounded-xl" width="55" height="55">
    </div>
    {{-- right side ==main section --}}
    <div>
        <header class="mb-4">
            {{--user name--}}
            <h3 class ="font-bold">{{$comment->author->username}}</h3>
            {{--meta info.--}}
            <p class="text-xs text-gray-500"> This comment posted on
                <time >{{$comment->created_at->format('F j, Y, g:i a') /*diffForHumans()*/}}</time>
            </p>
        </header>

        {{--The comment body--}}
        <p>{{$comment->body}}</p>

    </div>


</article>
</x-panel>
