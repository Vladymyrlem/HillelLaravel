<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use ChristianKuri\LaravelFavorite\Traits\Favoriteable;

class Post extends Model
{
    use SoftDeletes, HasFactory;
    use Favoriteable;

    protected $fillable = [
        'user_id',
        'category_id',
        'tag_id',
        'title',
        'body'
    ];

    public function categories()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'taggables')->withTimestamps();
    }

    /**
     * Get the post's image.
     */
    public function images()
    {
        return $this->morphOne(Image::class, 'imageable');
    }
}
