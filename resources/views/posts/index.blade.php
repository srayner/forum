@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Posts</h1>
                @foreach ($posts as $post)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2>{{$post->title}}</h2>
                            <p>{{$post->body}}</p>

                            <form method="POST" action="{{route('posts.destroy', ['post' => $post])}}">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <input type="submit" class="btn btn-danger" value="Delete">
                            </form>


                        </div>
                    </div>
                @endforeach
                <br>
                <a href="{{route('posts.create')}}">New Post</a>
            </div>
        </div>
    </div>
@endsection

