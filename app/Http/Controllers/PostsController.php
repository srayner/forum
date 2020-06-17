<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * Class PostsController
 *
 * @author Steve Rayner stephen.rayner@marmalade.co.uk
 * @package App\Http\Controllers
 */
class PostsController extends Controller
{
    /**
     * PostsController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @param int $category
     *
     * @return Response
     */
    public function index(string $slug)
    {
        $category = $this->getCategory($slug);
        $posts = $category->posts;

        return view('posts.index', [
            'category' => $category,
            'posts' => $posts
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(string $slug)
    {
        $category = $this->getCategory($slug);

        return view('posts.create', [
            'category' => $category
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function store(Request $request, string $slug)
    {
        $category = $this->getCategory($slug);
        $post = new Post($request->all());
        $post->category()->associate($category);
        $post->user()->associate($request->user());
        $post->save();

        return redirect()->route('posts', ['slug' => $category->title]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        // TODO:
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Request $request, $id)
    {
        // TODO:
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Post $post
     *
     * @return RedirectResponse
     * @throws Exception
     */
    public function destroy(Post $post)
    {
        $post->delete();

        return redirect()->route('posts.index');
    }

    /**
     * @param $slug
     *
     * @return mixed
     */
    private function getCategory($slug)
    {
        $category = Category::where('title', $slug)->first();
        if (!$category) {
            abort(404);
        }

        return $category;
    }
}
