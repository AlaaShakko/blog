@props(['posts'])
<x-post-featured-card :post="$posts[0]"></x-post-featured-card>

@if($posts->count()>1)
    <div class="lg:grid lg:grid-cols-6">
        {{--skip the first post because we mentioned it in the header post--}}
        @foreach($posts->skip(1) as $post)
            {{--@dd($loop)--}}
            {{--each post has span 2 column == each post represented using 2 columns--}}
            <x-post-card
                :post="$post"
                class="{{$loop->iteration <3 ? 'col-span-3':'col-span-2'}}"></x-post-card>
        @endforeach
    </div>
@endif
