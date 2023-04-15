@props(['name','collection','multiple','label_name','error_name','old' => null])



<x-form.panel>
    <x-form.label name="{{$label_name}}" id="{{$name}}" />
    <select name="{{$name}}" id="{{$name}}" {{$multiple}}>
        @foreach ($collection as $item)
            <option value="{{$item->id}}" {{old($name,$old) == $item->id ? 'selected' : ''}}>{{$item->name}}</option>
        @endforeach
    </select>
    <x-form.error name="{{$error_name}}" />
</x-form.panel>
