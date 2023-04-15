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
    public function show($slug)
    {
        $post = Post::findBySlugOrFail($slug);
        return view('posts.post',['post' => $post]);
    }
}
