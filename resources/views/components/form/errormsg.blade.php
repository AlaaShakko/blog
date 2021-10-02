@props(['name'])

@error($name)
<p class="text-xs text-red-700 mt-2 ">{{$message}}</p>
@enderror
