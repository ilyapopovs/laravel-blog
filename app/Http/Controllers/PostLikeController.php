<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PostLikeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function store(Request $request, Post $post): RedirectResponse|Response
    {
        if ($post->likedBy($request->user())) {
            return response(null, 409);
        }

        $post->likes()->create(
            [
                'user_id' => $request->user()->id,
            ]
        );

        return back();
    }

    public function destroy(Request $request, Post $post): RedirectResponse|Response
    {
        if (!$post->likedBy($request->user())) {
            return response(null, 409);
        }

        $request->user()->likes()->where('post_id', $post->id)->delete();

        return back();
    }
}
