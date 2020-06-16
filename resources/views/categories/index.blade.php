@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Categories</h1>
                @foreach ($categories as $category)
                    <div class="card mb-3">
                        <div class="card-body">
                            <h2>{{$category->title}}</h2>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
