<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use App\Models\Post;
use App\Models\Tag;

use Illuminate\Http\Request;

class AuthorController extends Controller
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
