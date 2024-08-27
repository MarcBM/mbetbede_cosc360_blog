<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index() {
        return view('Admin.index');
    }

    public function posts() {
        $posts = Post::all();
        return view('Admin.posts', compact('posts'));
    }

    public function users() {
        $users = User::all();
        return view('Admin.users', compact('users'));
    }
}
