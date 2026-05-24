<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
        return redirect()->route('admin');
    }
        $posts = Post::with(['user', 'comments.user'])->latest()->get();
    return view('website.index', compact('posts'));
    }

    public function getComments()
    {
        $comments = Comment::all();
        return view('website.index',compact('comments'));
    }
}
