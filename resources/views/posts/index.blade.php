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
                            @if (\Illuminate\Support\Facades\Auth::id() == $post->user->id)
                            <form method="POST" action="{{route('posts.destroy', ['post' => $post])}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-link" value="Delete">
                            </form>
                            @endif

                        </div>
                    </div>
                @endforeach
                <br>
                <a href="{{route('posts.create', ['slug' => $category->title])}}">New Post</a>
            </div>
        </div>
    </div>
@endsection

