<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class PostController extends Controller
{
    public function index(): Factory|View|Application
    {
        $posts = Post::paginate(20);

        return view('posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $this->validate($request, [
            'body' => 'required'
        ]);

        auth()->user()->posts()->create($request->only('body'));

        return back();
    }
}
