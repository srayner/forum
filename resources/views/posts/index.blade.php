@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>{{$category->title}}</h1>
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2>{{$post->title}}</h2>
                            <small>{{$post->created_at->format('jS M Y')}} - {{$post->user->name}}</small>
                            <p>{{$post->body}}</p>
                            <div class="mb-3">
                                <span class="action-container">
                                    <a href="{{route('comments.create', ['postId' => $post->id])}}">comment</a>
                                </span>
                                @if (\Illuminate\Support\Facades\Auth::id() == $post->user->id)
                                <form class="float-left" method="POST" action="{{route('posts.destroy', ['post' => $post])}}">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <input type="submit" class="btn btn-link" value="delete">
                                </form>
                                @endif
                            </div>

                            @foreach($post->comments as $comment)
                                <div class="mb-5">
                                    <div>
                                        <p class="comment"><b>{{$comment->user->name}}</b> {{$comment->message}}</p>
                                    </div>
                                    @if (\Illuminate\Support\Facades\Auth::check())
                                        <form class="float-left" method="POST" action="{{route('votes.store', ['comment' => $comment])}}">
                                            {{ csrf_field() }}
                                            <input type="submit" class="btn btn-link" value="Like">
                                        </form>
                                    @endif
                                </div>
                            @endforeach

                        </div>
                    </div>
                @endforeach
                <br>
                <a href="{{route('posts.create', ['slug' => $category->title])}}">New Post</a>
            </div>
        </div>
    </div>
@endsection

