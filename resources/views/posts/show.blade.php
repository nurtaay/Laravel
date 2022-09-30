<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
    </head>
    <body>
    @if(session('message'))
        <div class="alert alert-success" role="alert">
            {{ session('message') }}
        </div>
    @endif
        <a href="{{ route('posts.index') }}">Go to Index page</a>

        <h3>{{$post->title}}</h3>
        <p>{{$post->content}}</p>

       <button> <a href="{{route('posts.edit',$post->id)}}">Edit</a></button>
        <br><br>

        @foreach($post->comments as $comment)
            <li class="list-group-item d-flex justify-content-between align-items-start">
                <div class="ms-2 me-auto">
                    <div class="fw-bold">
                        {{ $comment->text }}
                    </div>
                </div>
                <form action="{{ route('comments.destroy', $post->id) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Are you sure')" type="submit" class="btn btn-danger">Delete</button>
                </form>
            </li>
        @endforeach
        <form method="post" action="{{ route('comments.store') }}">
            @csrf
            <textarea name="text" cols="20" rows="2"></textarea>
            <input name="post_id" value="{{ $post->id }}" type="hidden">
            <button type="submit">Save</button>
        </form>
    </body>
</html>
