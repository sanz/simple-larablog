<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index(Category $category)
    {
        $posts = Post::whereHas('category', function ($query) use ($category){
                $query->where('id', $category->id);
            })
            ->with('category', 'user')
            ->withCount('comments')
            ->published()
            ->paginate(5);
        
        return view('category.index', compact('posts', 'category'));
    }

    public function create()
    {
        return view('user.categories.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required|unique:categories,name']);

        Category::create($request->only('name'));

        return redirect()
            ->route('user.categories')
            ->withMessage('Category created successfully');
    }

    public function edit(Category $category)
    {
        if(auth()->user()->isNotAdmin()) {
            return redirect()
                ->route('user.categories')
                ->withMessage("Only admin can edit categories.");
        }

        return view('user.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        if(auth()->user()->isNotAdmin()) {
            return redirect()
                ->route('user.categories')
                ->withMessage("Only admin can update categories.");
        }

        $request->validate(['name' => 'required']);

        $category->update($request->only('name'));

        return redirect()
            ->route('user.categories')
            ->withMessage('Category updated successfully');
    }
    

    public function destroy(Category $category)
    {
        if(auth()->user()->isNotAdmin()) {
            return redirect()
                ->route('user.categories')
                ->withMessage("Only admin can delete categories.");
        }

        $category->delete();

        return redirect()->route('user.categories');
    }

}
