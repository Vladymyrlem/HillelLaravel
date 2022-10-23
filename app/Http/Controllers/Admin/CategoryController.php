<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $categories = Category::paginate(20);
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $category = Category::find($id);
        return view('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'min:3', 'max:30'],
            'slug' => ['required'],
        ]);
        Category::create($request->all());
        return redirect()->route('adminCategory')->with('success', 'The category is added');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'title' => ['required', 'min:2', 'max:255'],
            'slug' => ['required', 'min:2', 'max:255']
        ]);
        $category = Category::find($request->input('id'));
        $category->update($request->all());
        return redirect()->route('adminCategory')->with('success', 'Changes saved');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('adminCategory')->with('success', 'Category deleted');
    }

    public function trash()
    {
        $categories = Category::onlyTrashed()->get();
        return view('admin.categories.trash', compact('categories'));
    }

    /**
     * Force delete category data
     *
     * @param Category $id
     *
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Category::withTrashed()->where('id', $id)->restore();
        return redirect()->route('adminCategoryTrash');
    }

    /**
     * Force delete user data
     *
     * @param Category $id
     *
     * @return \Illuminate\Http\Response
     */
    public function forceDelete($id)
    {
        $category = Category::onlyTrashed()->where('id', $id)->first();
        foreach ($category->posts as $post) {
            $post->tags()->detach();
            $post->forceDelete();
        }
        $category->forceDelete();
        return redirect()->route('adminCategoryTrash');
    }
}
