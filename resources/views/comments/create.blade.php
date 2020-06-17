@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Create new comment</h1>
                <form class="form" method="POST" action="{{route('comments.store', ['postId' => $post->id])}}">
                    @csrf
                    <div class="form-group">
                        <label for="message">Comment</label>
                        <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror"></textarea>
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

