<?php

namespace App\Http\Controllers\website;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function toggle($postId)
{
    $existing = Like::where('user_id', Auth::id())
                    ->where('post_id', $postId)
                    ->first();

    if ($existing) {
        $existing->delete(); // Unlike
    } else {
        Like::create([
            'user_id' => Auth::id(),
            'post_id' => $postId,
        ]);
    }

    return back();
}
}
