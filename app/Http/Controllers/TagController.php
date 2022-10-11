<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Post;
use App\Models\Tag;

class TagController extends Controller
{
    public function index($tagId)
    {
        $tag = Tag::find($tagId);
        $posts = Post::whereHas('tags', function ($tag) use ($tagId){
            $tag->where('tag_id', $tagId);
        })->get();

        return view('tag/index', compact('posts', 'tag'));
    }
}
