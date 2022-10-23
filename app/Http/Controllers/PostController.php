<?php

namespace App\Http\Controllers;

use App\Models\Image;
use App\Models\Post;

class PostController extends Controller
{

    public function index()
    {
        $posts = Post::with('categories')->orderBy('id', 'desc')->paginate(2);
        $images = Image::all();
        return view('post.index', compact('posts', 'images'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)->firstOrFail();
        $post->views += 1;
        $post->update();
        $images = Image::all();
        return view('post.show', compact('post', 'images'));
    }

}
