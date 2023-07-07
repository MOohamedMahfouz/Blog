<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Models\TemporaryFile;
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

        unset($attributes['tags_id']);
        unset($attributes['avatar']);


        $post = Post::create($attributes);

        $temprorayFile = TemporaryFile::where('folder',$request->avatar)->first();

        if ($temprorayFile) {
            $post->addMedia(storage_path('app/public/avatars/tmp/' . $request->avatar . '/' . $temprorayFile->filename))
                ->toMediaCollection('avatars');

            rmdir(storage_path('app/public/avatars/tmp/' . $request->avatar));
            $temprorayFile->delete();
        }

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
            'avatar' => 'sometimes',
            'category_id' => ['required',Rule::exists('categories','id')],
            'tags_id.*' => 'exists:tags,id',
        ]);

        $attributes['user_id'] = auth()->id();

        unset($attributes['tags_id']);

        unset($attributes['avatar']);


        $temprorayFile = TemporaryFile::where('folder',request()->avatar)->first();

        $post->clearMediaCollection('avatars');


        if ($temprorayFile) {
            $post->addMedia(storage_path('app/public/avatars/tmp/' . request()->avatar . '/' . $temprorayFile->filename))
                ->toMediaCollection('avatars');

            rmdir(storage_path('app/public/avatars/tmp/' . request()->avatar));
            $temprorayFile->delete();
        }

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
