@props(['name' , 'id'])

<label for="{{$id}}" class="block mb-2 font-bold text-lg text-gray-700">
    {{ucwords($name)}}
</label>
