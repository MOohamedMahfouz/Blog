@extends('layouts.admin')

@section('content')
    <h1 class="text-lg font-bold mb-4">
        Manage Posts
    </h1>
    <x-panel class="w-full h-full bg-gray-300">
        <!-- component -->
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:mx-0.5 lg:mx-0.5 ">
                <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8 ">
                    <div class="overflow-hidden ">
                        <table class="min-w-full">
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr class="bg-white border-b transition duration-300 ease-in-out hover:bg-gray-100">
                                        <td class="px-6 py-4 whitespace-nowrap text-lg font-medium text-gray-900">
                                            <a href="{{route('view-post',$post)}}">{{$post->title}}</a>
                                        </td>
                                        <td class="text-sm text-gray-900 font-light text-lg px-6 py-4 whitespace-nowrap">
                                                @can('update', $post)
                                                <a href="/admin/posts/{{$post->slug}}/edit" class="text-blue-500">Edit</a>
                                                @endcan
                                        </td>
                                        <td class="text-sm text-gray-900 font-light px-6 text-lg py-4 whitespace-nowrap">
                                                @can('delete', $post)
                                                {{-- <a href="/admin/posts/{{$post}}/delete" class="text-red-500">Remove</a> --}}
                                                <form action="/admin/posts/{{$post->slug}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="text-red-500">
                                                        Delete
                                                    </button>
                                                </form>
                                                @endcan
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-panel>
@endsection

@section('pagination')
        {{ $posts->links() }}
@endsection
