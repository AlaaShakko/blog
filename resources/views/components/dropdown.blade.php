@props(['trigger'])
<div class="relative" x-data="{show: false}"@click.away = "show = false">

    {{--Trigger section--}}
    <div @click="show = ! show">
        {{$trigger}}
    </div>

  {{--  <button class="py-2 pl-3 pr-9 text-sm font-semibold lg:w-32 lg:inline-flex w-full text-left flex"
            @click="show = ! show">
        --}}{{--Categories--}}{{--
        {{isset($currentCategory)? ucwords($currentCategory->name) :'Categories'}}
        --}}{{--dropdown arrow--}}{{--
        <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
             height="22" viewBox="0 0 22 22">
            <g fill="none" fill-rule="evenodd">
                <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                </path>
                <path fill="#222"
                      d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
            </g>
        </svg>
    </button>--}}

    {{--we use absolute to avoid moving the layout down coz its relatively positioned--}}
    {{--dropdown menue links Section--}}
    <div x-show="show" class="py-2 w-full mt-2 rounded-xl absolute z-50 bg-gray-100 overflow-auto max-h-52" style = "display: none">
        {{$slot}}
    </div>
</div>
        {{--<a href="/"
           class="block text-left px-3 text-sm leading-5 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white"  >
            All</a>
        @foreach($categories as $category)
            <a href="/categories/{{$category->slug}}"
               class="
                       block text-left px-3 text-sm leading-5
                        hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white
                        {{ isset($currentCategory) && $currentCategory->is($category) ? 'bg-blue-500 text-white': ''}}
                   "
            >
                {{ucwords($category->name)}}</a>
            --}}{{-- <a href="#" class="block text-left px-3 text-sm leading-5 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white" >tow</a>
             <a href="#" class="block text-left px-3 text-sm leading-5 hover:bg-blue-500 focus:bg-blue-500 hover:text-white focus:text-white">three</a>
              --}}{{--
        @endforeach--}}

