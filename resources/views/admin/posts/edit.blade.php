<x-layout>
    <x-settings :heading="'Editing the:' .$post->title ">

        {{--create a post form --}}
        <form method="POST" action="/admin/posts/{{$post->id}}" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            {{--TITLE OF THE POST--}}
            <x-form.input name="title" :value="old('title', $post->title)"></x-form.input>

            {{-- THE SLUG OF THE POST--}}
            <x-form.input name="slug" :value="old('slug', $post->slug)"></x-form.input>

            {{-- THE THUMBNAIL OF THE POST--}}
            <div class="mt-8 flex">
                <div class="flex-1">
                    <x-form.input name="thumbnail"
                                  type="file"
                                  :value="old('thumbnail', $post->thumbnail)">
                    </x-form.input>
                </div>
                <img src= "{{ asset('storage/' . $post->thumbnail) }}" alt="" class=" ml-5 rounded-xl" width="85">
            </div>



            {{--EXCERPT OF THE POST--}}
            <x-form.txtarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.txtarea>

            {{--THE BODY OF THE POST--}}
            <x-form.txtarea name="body">{{ old('body', $post->body) }}</x-form.txtarea>

            {{--THE CATEGORY OF THE POST--}}
            <div class="mb-6">
                <label class="block mb-2 uppercase text-xs text-gray-600 font-bold"
                       for="category_id"> Category </label>
                <select id="category_id" name="category_id">

                    @php
                        $categories = App\Models\Category::all();
                    @endphp

                    @foreach($categories as $category)
                        <option value="{{$category->id}}" {{old('category_id',$post->category_id)==$category->id ? 'selected':''}}>
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach

                </select>

                @error('category')
                <p class="text-xs text-red-700 mt-2 ">{{$message}}</p>
                @enderror
            </div>
            {{--UPDATE BTN--}}
            <x-submit-button>Update</x-submit-button>

        </form>

    </x-settings>

</x-layout>
