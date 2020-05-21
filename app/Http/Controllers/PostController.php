<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'search', 'show']);
    }
    
    public function index(Request $request)
    {
        $posts = Post::with('category', 'user')
            ->withCount('comments')
            ->published()
            ->paginate(5);

        return view('home', compact('posts'));
    }

    public function search(Request $request)
    {
        $this->validate($request, ['query' => 'required']);

        $query = $request->get('query');

        $posts = Post::where('title', 'like', "%{$query}%")
            ->orWhere('body', 'like', "%{$query}%")
            ->with('category', 'user')
            ->withCount('comments')
            ->published()
            ->paginate(5);

        return view('post.search', compact('posts'));
    }

    public function show(Post $post)
    {
        $post = $post->load(['comments.user', 'user', 'category']);

        return view('post.show', compact('post'));
    }

    public function comment(Request $request, Post $post)
    {
        $this->validate($request, ['body' => 'required']);

        $post->comments()->create([
            'user_id'   => auth()->id(),
            'body'      => $request->body           
        ]);

        session()->flash('message', 'Comment successfully created.');

        return redirect("/posts/{$post->id}");
            
    }

    public function create()
    {
        return view('user.posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'      => 'required|max:250',
            'body'       => 'required|min:50',
            'category'   => 'required|exists:categories,id',
            'publish'    => 'accepted'
        ]);

        $post = Post::create([
            'title'         => $request->title,
            'body'          => $request->body,
            'user_id'       => auth()->id(),
            'category_id'   => $request->category,
            'is_published'  => $request->has('publish'),
        ]);

        session()->flash('message', 'Post created successfully.');

        return redirect()->route('user.posts');
    }

    public function edit(Post $post)
    {
        if($post->user_id != auth()->user()->id && auth()->user()->isNotAdmin()) {

            session()->flash('message', "You can't edit other peoples post.");

            return redirect()->route('user.posts');
        }

        return view('user.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if($post->user_id != auth()->user()->id && auth()->user()->isNotAdmin()) {

            session()->flash('message', "You can't update other peoples post.");

            return redirect()->route('user.posts');
        }

        $request->validate([
            'title'      => 'required|max:250',
            'body'       => 'required|min:50',
            'category'   => 'required|exists:categories,id',
            'publish'    => 'accepted'
        ]);

        $post->update([
            'title'       => $request->title,
            'body'        => $request->body,
            'category_id' => $request->category,
            'is_published'  => $request->has('publish'),
        ]);

        session()->flash('message', 'Post updated successfully.');

        return redirect()->to("/posts/$post->id");
    }

    public function destroy(Post $post)
    {
        if($post->user_id != auth()->user()->id && auth()->user()->isNotAdmin()) {

            session()->flash('message', "You can't delete other peoples post.");

            return redirect()->route('user.posts');
        }

        $post->delete();

        session()->flash('message', 'Post deleted successfully.');

        return redirect()->route('user.posts');
    }
}
