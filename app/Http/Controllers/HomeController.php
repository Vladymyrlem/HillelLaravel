<?php

namespace App\Http\Controllers;

use App\Models\Post;

class HomeController
{
    public function index(){
        $posts = Post::all();
        return view('home', compact('posts'));
    }
}
