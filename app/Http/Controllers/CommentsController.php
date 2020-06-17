<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Post;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(int $postId)
    {
        $post = $this->getPost($postId);
        return view('comments.create', [
            'post' => $post
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request, int $postId)
    {
        $post = $this->getPost($postId);
        $comment = new Comment($request->all());
        $comment->post()->associate($post);
        $comment->user()->associate($request->user());
        $comment->save();

        return redirect()->route('posts', ['slug' => $post->category->title]);
    }

    private function getPost($postId)
    {
        $post = Post::find($postId);
        if (!$post) {
            abort(404);
        }

        return $post;
    }
}
