<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Comment;
use App\Post;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        return view('user.profile');
    }

    public function dashboard()
    {
        $posts      = Post::count();
        $comments   = Comment::count();
        $categories = Category::count();

        return view('user.dashboard', get_defined_vars());
    }

    public function posts()
    {
        $posts = Post::with(['user', 'category', 'comments'])
            ->paginate(10);

        return view('user.posts', compact('posts'));
    }

    public function categories()
    {
        return view('user.categories');
    }

    public function comments()
    {
        $comments = Comment::with(['user', 'post'])->paginate(10);

        return view('user.comments', compact('comments'));
    }
}
