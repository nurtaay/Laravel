@extends('layouts.app')

@section('title', 'SHOW PAGE')

@section('content')
    <div class="container">
        <div class="justify-content-center">
            <div class="col-md-10">
                <a class="btn btn-outline-primary" href="{{ route('posts.index') }}">Go to Index page</a>

                <div class="card mt-3">
                    <div class="card-header">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->content }}</p>
                            <a class="btn btn-success" href="{{route('posts.edit',$post->id)}}">Edit</a>
                        </div>
                    </div>
                </div>

                <ol class="list-group mt-3">
                    @foreach($post->comments as $comment)
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">
                                    {{ $comment->text }}
                                </div>
                            </div>
                            <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="form-group mt-3">
                                    <button onclick="return confirm('Are you sure')" type="submit" class="btn btn-close"></button>
                                </div>
                            </form>
                        </li>
                    @endforeach
                </ol>
                <form method="post" action="{{ route('comments.store') }}">
                    @csrf
                    <div class="form-group mt-5">
                        <textarea name="text" cols="30" rows="2"  placeholder="leave a comment"></textarea>
                        <input name="post_id" value="{{ $post->id }}" type="hidden">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection



