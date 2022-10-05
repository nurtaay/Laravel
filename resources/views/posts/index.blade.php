@extends('layouts.app')

@section('title', 'POST  PAGE')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a class="btn btn-outline-primary" href="{{ route('posts.create') }}">Go to Create page</a>
                @foreach($posts as $post)
                    <div class="card mt-3">
                        <div class="card-header">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">{{ $post->content }}</p>
                                <a href="{{ route('posts.show', $post->id) }}" class="flex-sm-row btn btn-primary">Read more</a>
                                <form action="{{route('posts.destroy', $post->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button class="flex-sm-row btn btn-danger mt-1" type="submit">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

