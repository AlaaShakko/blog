@props(['name'])
{{--EXCERPT OF THE POST--}}
<div class="mb-6">
    {{--LABEL NAME--}}
    <x-form.label name="{{$name}}"></x-form.label>


    <textarea
        class="border border-gray-500 rounded w-full p-2 "
              name="{{$name}}"
              id="{{$name}}"
        required>
        {{ $slot ?? old($name) }}
    </textarea>

    {{--ERROR MSG--}}
    <x-form.errormsg name="{{$name}}"></x-form.errormsg>

</div>
