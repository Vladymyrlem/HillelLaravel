<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{

    protected $user;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(function ($request, $next) {

            $this->user = Auth::user();

            return $next($request);
        });
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $posts = Post::with('categories', 'tags', 'users')->paginate(20);
        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $this->authorize('create', Post::class);
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin.posts.create', compact('categories', 'tags', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        if (!$request->user()->can('store', Post::class)) {
            abort(403);
        }
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
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $this->authorize('update', $post);
        $categories = Category::all();
        $tags = Tag::all();
        $users = User::all();
        return view('admin.posts.edit', compact('categories', 'tags', 'post', 'users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
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

        $post = Post::find($request->input('id'));
        $post->update($request->all());
        $post->tags()->sync($request->tags_id);
        return redirect()->route('adminPost')->with('success', 'Изменения сохранены');
    }

    public function delete($id)
    {
        $post = Post::find($id)->delete();
//        $this->authorize('delete', $post);
        $post->delete();
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

    public function files(Post $post, Request $request)
    {
        $request->validate([
            'file' => 'required|image|max:2048'
        ]);

        $url = Storage::put('posts', $request->file('file'));

        $post->images()->create([
            'url' => $url
        ]);
    }
}
