@props(['heading'])
<section class=" py-8 max-w-3xl mx-auto">
    {{--Header of creatin post form--}}
    <h1 class="font-bold text-xl border-b mb-10 pb-4  "> {{$heading}}</h1>

    <div class="flex">
        <aside class=" flex-shrink-0 w-48">
            <h3 class="font-bold mb-6" >Move to ... </h3>
            <ul>
                <li><a href="/admin/posts/create" class="{{ request()->is('admin/posts/create') ? 'text-blue-800 font-semibold' : ''}}"> Creating New Post</a></li>

                <li><a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-800 font-semibold' : ''}}"> Edit Posts </a></li>

                <li><a href="/admin/setting" class="{{ request()->is('admin/setting') ? 'text-blue-800 font-semibold' : ''}}"> Settings </a></li>

            </ul>
        </aside>

        <main class="flex-1">
            <x-panel class="mx-auto ">
                {{$slot}}
            </x-panel>
        </main>
    </div>
</section>

