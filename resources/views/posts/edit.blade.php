<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
    </head>
    <body>
    <a href="{{ route('posts.index') }}">Go to Index page</a>

       <form action="{{ route('posts.update', $post->id)}}" method="post">
           @csrf
           @method('PUT')
           Title: <input type="text" name="title" value="{{$post->title}}"><br>
           Content: <textarea name="content" cols="30" rows="30">{{$post->content}}</textarea><br>
           <button type="submit">Update Posts</button>
       </form>
    </body>
</html>
