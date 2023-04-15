<article class="flex flex-col shadow my-4">
    <!-- Article Image -->


    <x-post-image :thumbnail="$post->thumbnail"/>

    <div class="bg-white flex flex-col justify-start p-6">
        <a href="{{route('view-post',['slug' =>$post -> slug])}}" class="text-blue-700 text-sm font-bold uppercase pb-1">{{$post ->  category -> name}}</a>
        <div class="justify-between space-x-2.5">
            @foreach ($post->tags as $tag)
            <a href="{{route('view-post',['slug' =>$post -> slug])}}" class="text-red-500 text-sm font-bold uppercase pb-4">#{{$tag->name}}</a>
            @endforeach
        </div>
        <a href="{{route('view-post',['slug' =>$post -> slug])}}" class="text-3xl font-bold hover:text-gray-700 pb-4">{{ $post -> title }}</a>
        <p href="{{route('view-post',['slug' =>$post -> slug])}}" class="text-sm pb-3">
            By <a href="{{route('search').'?author='.$post->user->username}}" class="font-semibold hover:text-gray-800">{{$post -> user -> name}}</a>, Published on {{$post->published_at->diffForHumans();}}
        </p>
        <a href="{{route('view-post',['slug' =>$post -> slug])}}" class="pb-6">{{ $post -> summary }}</a>

        <x-post-button title="Continue Reading" :href="route('view-post',['slug' =>$post -> slug])"/>

    </div>
</article>
