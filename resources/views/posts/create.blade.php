<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
    </head>
    <body>
    <a href="{{ route('posts.index') }}">Go to Index page</a>

       <form action="{{ route('posts.store')}}" method="post">
           @csrf
           Title: <input type="text" name="title"><br>
           Category:<select name="category_id">
                        @foreach($categories as $cat)
                            <option value="{{$cat->id}}">{{ $cat->name }}</option>
                        @endforeach
                    </select> <br>
           Content: <textarea name="content" cols="30" rows="30"></textarea><br>
           <button type="submit">Save Posts</button>
       </form>
    </body>
</html>
