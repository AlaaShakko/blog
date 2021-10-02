{{--form to comment--}}
@auth
    <x-panel>
        <form method="POST" action="/posts/{{$post->slug}}/comments" >
            @csrf
            <header class="item-center flex">
                <img src="https://i.pravatar.cc/100?u={{auth()->id()}}" alt="" class="rounded-full" width="35" height="35">
                <h2 class="ml-5"> write a comment </h2>
            </header>

            <div class="mt-5">

                                                    <textarea class="text-sm w-full focus:outline-none focus:ring"
                                                              name="body" placeholder="You can write your comment here :)" rows="3" required></textarea>
{{--                <textarea
                    class="text-sm w-full focus:outline-none focus:ring"
                    name="body"
                    placeholder="You can write your comment here :)"
                    rows="3"
                    required>
                </textarea>--}}

                {{--to show the validation msg for body --}}
                @error('body')
                <span text-xs text-red-600>{
                    {$message}}
                </span>
                @enderror

            </div>
            <div class="flex justify-end mt-5">
                <x-submit-button> Publish </x-submit-button>
            </div>
        </form>
    </x-panel>


    {{--if user not logged in or registerd ...the wont be able to leave a comment so redirect to register/login page--}}
@else
    <p class="font-semibold">
        Click on to
        <a href="/register" class="hover:underline">Join us</a>
        Or
        <a href="/login" class="hover:underline"> Login</a>
        to leave a comment.
    </p>
@endauth





