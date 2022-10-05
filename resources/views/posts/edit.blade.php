@extends('layouts.app')

@section('title', 'CREATE PAGE')

@section('content')
    <div class="container">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-md-10">
                <a class="btn btn-outline-primary" href="{{ route('posts.index') }}">Go to Index page</a>

                   <form action="{{ route('posts.update', $post->id)}}" method="post">
                       @csrf
                       @method('PUT')

                       <div class="form-group mt-3">
                           <label for="titleInput">Title</label>
                           <input type="text" class="form-control" id="titleInput" name="title" value="{{ $post->title }}">
                           <div class="invalid-feedback"></div>
                       </div>
                       <div class="form-group mt-3">
                           <label for="categoryGroup">Category</label>
                           <select class="form-control" name="category_id">
                               @foreach($categories as $cat)
                                   <option @if($cat->id == $post->category_id) selected @endif value="{{$cat->id}}">{{ $cat->name }}</option>
                               @endforeach
                           </select>
                           <div class="invalid-feedback"></div>
                       </div>
                       <div class="form-group mt-3">
                           <label for="contentGroup">Content</label>
                           <textarea class="form-control" id="contentGroup" rows="3" name="content">{{ $post->content }}</textarea>
                           <div class="invalid-feedback"></div>
                       </div>
                       <div class="form-group mt-3">
                           <button class="btn btn-outline-success" type="submit">Update Post</button>
                       </div>
                   </form>
            </div>
        </div>
    </div>
@endsection
