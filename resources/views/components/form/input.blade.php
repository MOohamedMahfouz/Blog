@props(['name','type'])




<x-form.panel>
    <x-form.label name="{{$name}}" id="{{$name}}" />
    <input type="{{$type}}" class="border border-gray-400 p-2 w-full" name="{{$name}}" id="{{$name}}" {{$attributes(['value' => old($name)])}}>
    <x-form.error name="{{$name}}" />
</x-form.panel>
