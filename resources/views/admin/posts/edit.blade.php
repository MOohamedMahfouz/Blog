@extends('layouts.admin')

@section('content')
    <h1 class="text-lg font-bold mb-4">
        Edit Post
    </h1>
    <x-panel class="w-full bg-gray-200 h-full">
        <form action="/admin/posts/{{$post->slug}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" type="text" value="{{ old('title', $post->title) }}" />

            <x-form.textarea name="summary">{{ old('summary', $post->summary) }}</x-form.textarea>

            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.input name="thumbnail" type="file" value="{{ old('thumbnail', $post->thumbnail) }}" />

            <div class="pb-3">
                <img src="/storage/{{$post->thumbnail}}" alt="" width="500" height="500">
            </div>

            <x-form.input name="slug" type="text" value="{{ old('slug', $post->slug) }}" />

            <x-form.select name="category_id" label_name="category" error_name="category_id" :old="$post->category_id" :collection="$categories" multiple="" />

            <x-form.select name="tags_id[]" label_name="tags" error_name="tags_id.*" :collection="$tags" multiple="multiple"/>

            <x-submit-button>Update</x-submit-button>
        </form>
    </x-panel>
@endsection
