<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
class Post extends Model
{
    use HasFactory;

    protected $dates = ['created_at', 'updated_at', 'published_at'];
    protected $with = ['category', 'user', 'tags'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public static function findBySlugOrFail($slug)
    {
        $post = static::whereSlug($slug)->first();
        if ($post == null) {
            abort(404);
        }
        return $post;
    }
    public function tags()
    {
        return $this->belongstoMany(Tag::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * Get the user that owns the Post
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function scopeFilter($query,$filters)
    {
        // filter for text
        $query->when($filters['search'] ?? false, fn($query,$search) =>
            $query -> where(fn($query) =>
                $query
                    ->where('title', 'LIKE', '%' . $search . '%')
                    ->orWhere('body', 'LIKE', '%' . $search . '%'))
        );
        // filter for category
        $query->when($filters['category'] ?? false, fn($query,$category) =>
            $query->whereHas('category',fn($query) =>
                $query->where('slug',$category)
            )
        );
        // filter for author
        $query->when($filters['author'] ?? false, fn($query,$user) =>
            $query->whereHas('user',fn($query) =>
                $query->where('username',$user)
            )
        );
    }
}
