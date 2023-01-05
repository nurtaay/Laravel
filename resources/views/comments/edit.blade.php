@extends('layouts.app')

@section('title', 'CREATE COMMENT PAGE')

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

                <form action="{{ route('comments.update', $comment->id)}}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="form-group mt-3">
                        <label for="contentGroup">Text</label>
                        <textarea class="form-control" id="contentGroup" rows="3" name="text">{{ $comment->text }}</textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group mt-3">
                        <button class="btn btn-outline-success" type="submit">Update Comment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
