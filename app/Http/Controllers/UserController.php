<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Post;

class UserController extends Controller
{
    public function index()
    {
        $author = User::all();
        return view('author/index', compact('author'));
    }
    public function show($authorId)
    {
        $author = User::find($authorId);
        return view('author/show', compact('author'));
    }

    public function category($authorId, $categoryId)
    {
        $posts = Post::whereHas('users', function ($user) use ($authorId) {
            $user->where('id', $authorId);
        })->where('category_id', $categoryId)->get();
        return view('author/category', compact('posts'));
    }
}
