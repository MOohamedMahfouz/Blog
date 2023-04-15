@extends('layouts.single-post')

@section('content')
    <article class="flex flex-col shadow my-4">
        <!-- Article Image -->


        <x-post-image :thumbnail="$post->thumbnail"/>

        <div class="bg-white flex flex-col justify-start p-6">
            <a href="#" class="text-blue-700 text-sm font-bold uppercase pb-4">{{ $post->category->name }}</a>
            <div class="justify-between space-x-2.5">
                @foreach ($post->tags as $tag)
                <a href="{{route('view-post',['slug' =>$post -> slug])}}" class="text-red-500 text-sm font-bold uppercase pb-4">#{{$tag->name}}</a>
                @endforeach
            </div>
            <a href="#" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post->title }}</a>
            <p href="#" class="text-sm pb-8">
                By <a href="{{ route('search').'?author='. $post->user->username }}"
                    class="font-semibold hover:text-gray-800">{{ $post->user->name }}</a>, Published on
                {{ $post->published_at->diffForHumans() }}
            </p>
            <h1 class="text-2xl font-bold pb-3">Introduction</h1>
            <p class="pb-3">{{ $post->summary }}.</p>
            <h1 class="text-2xl font-bold pb-3">Body</h1>
            <p class="pb-3">{{ $post->body }}.</p>
            <h1 class="text-2xl font-bold pb-3">Conclusion</h1>
            <p class="pb-3">Thank you for reading all the blog.</p>
            <x-post-button title="Back To Posts" :href="route('search')"/>
        </div>
        {{-- Commect section--}}
        <section class="bg-white flex flex-col justify-start p-6 space-y-6">
            @include('partials.posts._add-comment-form')

            @foreach ($post->comments as $comment)
                <x-post-comment :comment="$comment"/>
            @endforeach
        </section>
    </article>
@endsection
