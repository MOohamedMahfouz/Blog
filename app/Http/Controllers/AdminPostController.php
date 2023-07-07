<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;
use Illuminate\Validation\Rule;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index',[
            'posts' => Post::paginate(50),
        ]);
    }
    public function create()
    {
        $this->authorize('create',Post::class);
        return view('admin.posts.create',[
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }



    public function store(StoreRequest $request)
    {
        $this->authorize('create',Post::class);

        
        $attributes = $request->validated();
        $tags_id = $request->tags_id;
        $attributes['user_id'] = auth()->id();

        $attributes['thumbnail'] = $request->file('thumbnail')->store('thumbnails','public');

        unset($attributes['tags_id']);

        $post = Post::create($attributes);

        $post->tags()->attach($tags_id);

        return redirect('/');
    }


    public function edit(Post $post)
    {
        $this->authorize('update',$post);

        return view('admin.posts.edit',['post' => $post , 'categories' => Category::all() , 'tags' => Tag::all()]);
    }


    public function update(Post $post)
    {

        $this->authorize('update',$post);



        $attributes = request()->validate([
            'title' => 'required',
            'slug' => ['required',Rule::unique('posts','slug')->ignore($post->id)],
            'summary' => 'required',
            'body' => 'required',
            'thumbnail' => 'image',
            'category_id' => ['required',Rule::exists('categories','id')],
            'tags_id.*' => 'exists:tags,id',
        ]);

        $attributes['user_id'] = auth()->id();


        if (isset($attributes['thumbnail']))
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails','public');


        unset($attributes['tags_id']);

        $post->update($attributes);

        $tags_id = request()->tags_id;

        $post->tags()->sync($tags_id);

        return to_route('view-post',$post);
    }

    public function destroy(Post $post)
    {

        $this->authorize('delete',$post);


        $post->delete();
        return back();
    }
}
