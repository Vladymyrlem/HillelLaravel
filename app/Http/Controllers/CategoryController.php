<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;

class CategoryController extends Controller
{
    public function index($authorId)
    {
        $categories = Category::find($authorId);
        return view('category/index', compact('categories'));
    }
}
