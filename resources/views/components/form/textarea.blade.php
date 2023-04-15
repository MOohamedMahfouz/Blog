
@props(['name'])

<x-form.panel>
    <x-form.label name="{{$name}}" id="{{$name}}" />

    <textarea type="text" class="border border-gray-400 p-2 w-full h-32" name="{{$name}}" id="{{$name}}" required>{{$slot}}</textarea>

    <x-form.error name="{{$name}}" />
</x-form.panel>
