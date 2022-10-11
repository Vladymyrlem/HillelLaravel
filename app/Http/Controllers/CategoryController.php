<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('category/index', compact('categories'));
    }

    public function show($authorId)
    {
        $categories = Category::find($authorId);
        return view('category/show', compact('categories'));
    }
}
