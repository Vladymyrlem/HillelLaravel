<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminTagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tags = Tag::paginate(20);
        return view('admin.tags.index', compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.tags.create');
    }

    public function show($slug)
    {
        $tag = Tag::where('slug', $slug)->firstOrFail();
        $posts = $tag->posts()->with('category')->orderBy('id', 'desc')->paginate(2);
        return view('tags.show', compact('tag', 'posts'));
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
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['required', 'min:2', 'max:255']
        ]);

        Tag::create($request->all());
        return redirect()->route('tags.index')->with('success', 'Tag added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'));
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
            'id' => ['required'],
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['required', 'min:2', 'max:255']
        ]);
        $tag = Tag::find($id);
        $tag->update($request->all());
        return redirect()->route('tags.index')->with('success', 'Changes updates');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        if ($tag->posts->count()) {
            return redirect()->route('tags.index')->with('error', 'Ошибка! У тегов есть записи');
        }
        $tag->delete();
        return redirect()->route('tags.index')->with('success', 'Тег удален');
    }

    public function trash()
    {
        $tags = Tag::onlyTrashed()->get();
        return view('admin/tag/trash', compact('tags'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function restore($id)
    {
        Tag::onlyTrashed()->where('id', $id)->restore();
        return redirect()->route('adminTagTrash');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function forceDelete($id)
    {
        $tag = Tag::onlyTrashed()->where('id', $id)->first();
        foreach ($tag->posts as $post) {
            $post->tags()->detach();
        }
        $tag->forceDelete();
        return redirect()->route('adminTagTrash');

    }
}
