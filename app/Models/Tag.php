<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post;


class Tag extends Model
{
    public $timestamps = false;

    use HasFactory;
    public function posts(){

        return $this -> belongstoMany(Post::class);
    }
}
