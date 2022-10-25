<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;

class AuthorController extends Controller
{

    public function index()
    {
        $author = User::all();
        $posts = Post::with('users', 'categories');
        return view('author/index', compact('author', 'posts'));
    }

    public function show($authorId)
    {
        $author = User::find($authorId);
        $posts = Post::with('users');
        return view('author/show', ['author' => $author, 'posts' => $posts]);
    }

    public function category($authorId, $categoryId)
    {
        $category = Category::find($categoryId);
        $posts = Post::whereHas('users', function ($user) use ($authorId) {
            $user->where('id', $authorId);
        })->where('category_id', $categoryId)->get();
        return view('author/category', compact('posts', 'category'));
    }

    public function categoryTag($authorId, $categoryId, $tagId)
    {

        $posts = Post::whereHas('tags', function ($tag) use ($tagId) {
            $tag->where('tag_id', $tagId);
        })->where('user_id', $authorId)->where('category_id', $categoryId)->get();

        return view('author/categoryTag', compact('posts'));
    }
}
