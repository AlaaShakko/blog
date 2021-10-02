<x-layout>
    <x-settings heading="Creating A new Blog Post">

            {{--create a post form --}}
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf
                {{--TITLE OF THE POST--}}
                <x-form.input name="title"></x-form.input>

                {{-- THE SLUG OF THE POST--}}
                <x-form.input name="slug"></x-form.input>

                {{-- THE THUMBNAIL OF THE POST--}}
                <x-form.input name="thumbnail"
                              type="file">
                </x-form.input>


                {{--EXCERPT OF THE POST--}}
                <x-form.txtarea name="excerpt"></x-form.txtarea>

                {{--THE BODY OF THE POST--}}
                <x-form.txtarea name="body"></x-form.txtarea>


                {{--THE CATEGORY OF THE POST--}}
                <div class="mb-6">
                    <label class="block mb-2 uppercase text-xs text-gray-600 font-bold"
                           for="category_id"> Category </label>
                    <select id="category_id" name="category_id">

                        @php
                            $categories = App\Models\Category::all();
                        @endphp

                        @foreach($categories as $category)
                            <option value="{{$category->id}}" {{old('category_id')==$category->id ? 'selected':''}}>
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach

                    </select>

                    @error('category')
                    <p class="text-xs text-red-700 mt-2 ">{{$message}}</p>
                    @enderror
                </div>
                {{--PUBLISH BTN--}}
                <x-submit-button>Publish</x-submit-button>

            </form>

    </x-settings>

</x-layout>
