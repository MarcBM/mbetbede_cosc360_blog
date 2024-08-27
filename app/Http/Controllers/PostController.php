<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $posts = Post::all();
        $posts = Post::where('user_id', '=', Auth::id())->orderBy('created_at', 'desc')->get();
        return view('Posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::where('_id', '=', Auth::id())->first();
        if (!$user) {
            abort(404);
        }

        if ($user->role == 'user') {
            abort(403);
        }

        return view('Posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = User::where('_id', '=', Auth::id())->first();
        if (!$user) {
            abort(404);
        }

        if ($user->role == 'user') {
            abort(403);
        }
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('Posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $user = User::where('_id', '=', Auth::id())->first();
        if (!$user) {
            abort(404);
        }

        if (Auth::id() != $post->user_id && $user->role != 'admin') {
            abort(403);
        }
        return view('Posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $user = User::where('_id', '=', Auth::id())->first();
        if (!$user) {
            abort(404);
        }

        if (Auth::id() != $post->user_id && $user->role != 'admin') {
            abort(403);
        }
        $request->validate([
            'title' => 'required',
            'content' => 'required'
        ]);

        $post->update($request->all());

        return redirect()->route('posts.show', $post);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $user = User::where('_id', '=', Auth::id())->first();
        if (!$user) {
            abort(404);
        }

        if (Auth::id() != $post->user_id && $user->role != 'admin') {
            abort(403);
        }
        $post->delete();

        return redirect()->route('posts.index');
    }
}
