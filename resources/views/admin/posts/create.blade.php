@extends('layouts.admin')

@section('content')
    <h1 class="text-lg font-bold mb-4">
        Publish New Post
    </h1>
    <x-panel class="w-full bg-gray-200 h-full">
        <form action="/admin/posts" method="post" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title" type="text" value="{{ old('title')}}" />

            <x-form.textarea name="summary">{{ old('summary') }}</x-form.textarea>

            <x-form.textarea name="body">{{ old('body') }}</x-form.textarea>

            <x-form.input name="thumbnail" type="file" value="{{ old('thumbnail') }}" />

            <x-form.input name="slug" type="text" value="{{ old('slug') }}" />

            <x-form.select name="category_id" label_name="category" error_name="category_id" :collection="$categories" multiple="" />

            <x-form.select name="tags_id[]" label_name="tags" error_name="tags_id.*" :collection="$tags" multiple="multiple" />

            <x-submit-button>Publish</x-submit-button>

        </form>
    </x-panel>
@endsection
