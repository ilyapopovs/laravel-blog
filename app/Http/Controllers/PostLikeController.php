<?php

namespace App\Http\Controllers;

use App\Mail\PostLiked;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;

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

        $hadPreviouslyLiked = (bool)($post->likes()->where('user_id', $request->user()->id)->onlyTrashed()->get())
            ->count();

        $post->likes()->create(
            [
                'user_id' => $request->user()->id,
            ]
        );

        if (!$hadPreviouslyLiked) {
            Mail::to($post->user)->send(new PostLiked(auth()->user(), $post));
        }

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
