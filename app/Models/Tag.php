<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable = [
        'title',
        'slug'
    ];

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggables')->withTimestamps();
    }
}
