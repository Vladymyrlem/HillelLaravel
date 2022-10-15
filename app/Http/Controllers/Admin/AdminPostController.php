<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::with('categories', 'tags')->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = Category::find($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin.posts.create', compact('categories', 'tags', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => ['required'],
            'tags_id' => ['required'],
            'category_id' => ['required'],
            'title' => ['required', 'min:2', 'max:255'],
            'body' => ['required', 'min:2', 'max:255']
        ]);

        $post = Post::create($request->all());
        $post->tags()->sync($request->tags_id);

        return redirect()->route('adminPost')->with('success', 'Статья добавлена');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => ['required'],
            'tags_id' => ['required'],
            'category_id' => ['required'],
            'title' => ['required', 'min:2', 'max:255'],
            'body' => ['required', 'min:2', 'max:255']
        ]);

        $post = Post::find($id);
        $post->update($request->all());
        $post->tags()->sync($request->tags_id);
        return redirect()->route('adminPost')->with('success', 'Изменения сохранены');
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        return redirect()->route('adminPost');
    }

    public function trash()
    {
        $posts = Post::onlyTrashed()->get();
        return view('admin.posts.trash', compact('posts'));
    }

    public function restore($id)
    {
        Post::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('adminPostTrash');
    }

    public function forceDelete($id)
    {
        $post = Post::onlyTrashed()->where('id', $id)->first();
        $post->tags()->detach();
        $post->forceDelete();
        return redirect()->route('adminPostTrash');

    }
}
