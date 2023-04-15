@extends('layouts.master')

@section('content')
    @include('partials.posts._post-search')

    @forelse($posts as $post)

        <x-post-card :post="$post"/>

    @empty

        <div class="bg-white flex flex-col justify-start pt-20">
            <p class="text-6xl text-blue-700 text-sm font-bold uppercase pb-4">NO POSTS YET !!</p>
        </div>

    @endforelse
@endsection


@section('pagination')
        {{ $posts->links() }}
@endsection
