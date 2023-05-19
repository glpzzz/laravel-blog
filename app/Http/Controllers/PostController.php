<?php

namespace App\Http\Controllers;

use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        return view('post.index', [
            'posts' => Post::with(['category', 'author'])
                ->filter(request(['search', 'category', 'author']))
                ->paginate()->withQueryString(),
        ]);
    }

    public function view(Post $post)
    {
        return view('post.view', [
            'post' => $post,
        ]);
    }
}
