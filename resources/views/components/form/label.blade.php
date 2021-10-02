@props(['name'])
<label class="block mb-2 uppercase text-xs text-gray-600 font-bold"
       for="{{ $name }}">
    {{ucwords($name)}}
</label>
