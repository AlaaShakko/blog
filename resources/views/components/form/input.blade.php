@props(['name','type'=>'text'])
{{--TITLE,SLUG,THUMBNAIL OF THE POST--}}
<div class="mb-6">
    {{--LABEL NAME--}}
    <x-form.label name="{{$name}}"></x-form.label>

    <input
        class="border border-gray-500 w-full p-2 rounded"

        type="{{$type}}"
        name="{{$name}}"
        id="{{$name}}"
        {{$attributes(['value'=>old($name)])}}

    >
    {{--ERROR MSG--}}
    <x-form.errormsg name="{{$name}}"></x-form.errormsg>
</div>
