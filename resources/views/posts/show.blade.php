<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
    </head>
    <body>
        <a href="{{ route('posts.index') }}">Go to Index page</a>

        <h3>{{$post->title}}</h3>
        <p>{{$post->content}}</p>

       <button> <a href="{{route('posts.edit',$post->id)}}">Edit</a></button>
    </body>
</html>
