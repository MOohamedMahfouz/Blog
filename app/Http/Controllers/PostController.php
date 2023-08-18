<?php

namespace App\Http\Controllers;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function search(Request $request)
    {
        return view('posts.index', [
            'posts' => Post::latest()->filter($request)->orderByDesc('published_at')->paginate(5)->withQueryString(),
            'categories' => Category::all(),
        ]);
    }
    public function show(Post $post)
    {
        $imageItems = $post->getMedia('avatars');
        $image = $imageItems[0];
        $greyUrl = $image->getUrl('grey');
        return view('posts.post',[
            'post' => $post,
            'mediaItems' => $imageItems,
            'greyImageUrl' => $greyUrl
        ]);
    }
}
