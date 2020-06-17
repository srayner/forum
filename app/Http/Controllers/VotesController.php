<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Vote;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

/**
 * Class VotesController
 *
 * @author Steve Rayner stephen.rayner@marmalade.co.uk
 * @package App\Http\Controllers
 */
class VotesController extends Controller
{
    /**
     * VotesController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @param Comment $comment
     *
     * @return RedirectResponse
     */
    public function store(Request $request, Comment $comment)
    {
        $vote = new Vote();
        $vote->comment()->associate($comment);
        $vote->user()->associate($request->user());
        $vote->save();

        return redirect()->route('posts', ['slug' => $comment->post->category->title]);
    }
}
