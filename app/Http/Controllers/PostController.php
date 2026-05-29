<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }


    // public function getPosts()
    // {
    //     $posts = Post::with('user')->get();
    //     return view('website.index',compact('posts'));
    // }







    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'title.required'   => 'Please enter post title.',
            'title.string'     => 'Title must be text.',
            'title.max'        => 'Title must not exceed 255 characters.',
            'content.required' => 'Please enter post content.',
            'content.string'   => 'Content must be text.',
            'image.image'      => 'Uploaded file must be an image.',
            'image.mimes'      => 'Image must be JPG, JPEG, PNG, or WEBP.',
            'image.max'        => 'Image size must not exceed 2MB.',
        ]);

        if ($request->hasFile('image')) {
            $file     = $request->file('image');
            $fileName = time() . "_" . $file->getClientOriginalName();
            $path     = $file->storeAs('posts', $fileName, 'public');
            $data['image'] = $path;
        } else {
            $data['image'] = null;
        }

        $data['user_id'] = Auth::id();

        Post::create($data);

        return redirect()->back()->with('msg', 'Post Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $post = Post::with(['user', 'likes.user', 'comments.user'])->findOrFail($id);
    return view('admin.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $post = Post::findOrFail($id);

        $data = $request->validate(

            [
                'title' => 'required|string|max:255',
                'content' => 'required|string',
                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            ],

            [
                // Title
                'title.required' => 'Please enter post title.',
                'title.string' => 'Title must be text.',
                'title.max' => 'Title must not exceed 255 characters.',

                // Content
                'content.required' => 'Please enter post content.',
                'content.string' => 'Content must be text.',

                // Image
                'image.image' => 'Uploaded file must be an image.',
                'image.mimes' => 'Image must be JPG, JPEG, PNG, or WEBP.',
                'image.max' => 'Image size must not exceed 2MB.',
            ]

        );

        // Upload New Image
        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $fileName = time() . "_" . $file->getClientOriginalName();

            $path = $file->storeAs('posts', $fileName, 'public');

            $data['image'] = $path;
        }

        $post->update($data);

        return redirect()
            ->route('posts.index')
            ->with('msg', 'Post Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Post::findOrFail($id)->delete();
        return redirect()->route('posts.index')->with('msg', 'Post Deleted successfully');
    }
}
