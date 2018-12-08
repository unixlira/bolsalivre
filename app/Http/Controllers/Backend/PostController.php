<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Post;
use Gate;

class PostController extends Controller
{
    private $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function index()
    {
        if (Gate::denies('view_post')) {
            return redirect()->back();
        }
        //abort(403, 'Not permissions Lists Post');

        $posts = $this->post->all();

        return view('painel.posts.index', compact('posts'));
    }
}
