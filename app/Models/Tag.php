<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;

class Tag extends Model
{
    use SoftDeletes, HasFactory;

    public function posts()
    {
        return $this->belongsToMany(Post::class, 'post2tag')->withTimestamps();
    }
}
