@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create new post</h1>
                <form class="form" method="POST" action="{{route('posts.store', ['slug' => $category->title])}}">
                    @csrf
                    <div class="form-group">
                        <label for="title">Post Title</label>
                        <input id="title" name="title" type="text" class="form-control @error('title') is-invalid @enderror">
                        @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="body">Message</label>
                        <textarea id="body" name="body" class="form-control @error('body') is-invalid @enderror"></textarea>
                        @error('body')
                        <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
@endsection
