<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with('user')->get();
        return view('website.index', compact('comments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
            'post_id' => 'required|exists:posts,id',

        ]);

        Comment::create([
            'comment' => $request->comment,
            'post_id' => $request->post_id,
            'user_id' => Auth::id(),
            'parent_id' => $request->parent_id ?? null,
        ]);

        return back()->with('msg', 'Comment Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with(['user', 'comments.user'])->findOrFail($id);
        return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, string $id)
{
    $request->validate([
        'comment' => 'required|string|max:500',
    ]);

    Comment::findOrFail($id)->update([
        'comment' => $request->comment,
    ]);

    return back()->with('msg', 'Comment Updated Successfully');
}

    /**
     * Remove the specified resource from storage.
     */
public function destroy(string $id)
{
    Comment::findOrFail($id)->delete();
    return back()->with('msg', 'Comment Deleted Successfully');
}
}
