<!doctype html>


<title>Laravel From Scratch Blog</title>
<!-- pulling  tailwin tool through CDN-->
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
{{--alpine js CDN--}}
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<style>
    html{
        scroll-behavior: smooth;
    }


</style>

<body style="font-family: Open Sans, sans-serif">
    <section class="px-6 py-8">
        <!-- use classes provides by tailwind css-->
        <nav class="md:flex md:justify-between md:items-center">
            <div>
                <a href="/">
                    <img src="/images/logo.svg" alt="Laracasts Logo" width="165" height="16">
                </a>
            </div>

            <div class="mt-8 md:mt-0 items-center flex">
              {{--  <a href="/" class="text-xs font-bold uppercase">Home Page</a>--}}

                {{--New account registeration--}}

                @auth{{--@guest--}}{{--@unless(auth()->check())--}}
                    {{--singing in --}}
                    <x-dropdown>
                        <x-slot name="trigger">
                            <button class="text-xs font-bold uppercase">Good to see you, {{ auth()->user()->name }} :)</button>
                        </x-slot>

                        {{--dropdown menue--}}
                        {{--show these tow elements only for admins--}}
                        @if(auth()->user()->can('admin')) {{-- == @can('admin)--}}
                            <x-dropdown-item href="/admin/posts/create" :active="request()->is('admin/posts/create')">Create a New Post</x-dropdown-item>
                            <x-dropdown-item href="/admin/posts" :active="request()->is('admin/posts')">Edit Posts</x-dropdown-item>
                        @endif {{--@endcan--}}
                        <x-dropdown-item href="#" x-data="{}" @click.prevent="document.querySelector('#signout_section').submit()">Sign Out</x-dropdown-item>

                        {{--Log out button--}}
                        <form id="signout_section" class="hidden" method="POST" action="/logout">
                            @csrf
                        </form>
                    </x-dropdown>


                @else
                    <a href="/register" class="text-xs font-bold uppercase">Create New Account</a>
                    <a href="/login" class="text-xs font-bold uppercase ml-6">LOG IN</a>
                @endauth{{--@endguest--}}{{--@endunless--}}

                {{--Newsletter Button--}}
                <a href="#newsletter" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Subscribe for Updates
                </a>
            </div>
        </nav>

        {{$slot}}


        {{--Newslettr Section--}}
        <footer id="newsletter"
                class="bg-gray-100 border border-black border-opacity-5 rounded-xl text-center py-16 px-10 mt-16">
            <img src="/images/lary-newsletter-icon.svg" alt="" class="mx-auto -mb-6" style="width: 145px;">
            <h5 class="text-3xl">Stay in touch with the latest posts</h5>
            <p class="text-sm mt-3">Promise to keep the inbox clean. No bugs.</p>

            <div class="mt-10">
                <div class="relative inline-block mx-auto lg:bg-gray-200 rounded-full">

                    <form method="POST" action="/newsletter" class="lg:flex text-sm">
                       @csrf
                        <div class="lg:py-3 lg:px-5 flex items-center">
                            <label for="email" class="hidden lg:inline-block">
                                <img src="/images/mailbox-icon.svg" alt="mailbox letter">
                            </label>
                            <div>
                                <input id="email" name="email" type="text" placeholder="Your email address"
                                       class="lg:bg-transparent py-2 lg:py-0 pl-4 focus-within:outline-none">

                                @error('email')
                                    <span class="text-xs text-red-600">
                                        {{$message}}
                                    </span>
                                @enderror
                            </div>
                </div>
                        <button type="submit"
                                class="transition-colors duration-300 bg-blue-500 hover:bg-blue-600 mt-4 lg:mt-0 lg:ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-8">
                            Subscribe
                        </button>
                    </form>
                </div>
            </div>
        </footer>
    </section>
    <x-flash />
</body>
