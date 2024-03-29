<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{

    public function postsByCategory(Category $category){
        $posts = $category->posts;
        return view('posts.index', ['posts' =>$posts, 'categories' => Category::all()]);
    }

    public function index(){
        $allPosts = Post::all();
        return view('posts.index', ['posts' =>$allPosts,'categories' => Category::all()]);
    }

    public function create(){
        return view('posts.create', ['categories' => Category::all()]);
    }

    public function store(Request $req){

//       $validated = $req->validate([
//           'title' => 'required|max:255',
//           'content' => 'required',
//           'category_id' => 'required|numeric|exists:categories,id'
//        ]);

        Post::create([
            'title' => $req->input('title'),
            'content' => $req->input('content'),
            'category_id' => $req->input('category_id')
        ]);
        return redirect()->route('posts.index')->with('message', 'Post saved');
    }

    public function show(Post $post){
        return view('posts.show', ['post'=>$post , 'categories' => Category::all()]);
    }

    public function edit(Post $post){
        return view('posts.edit',['post'=>$post, 'categories' => Category::all()]);
    }

    public function update(Request $request,Post $post){
       $post->update([
           'title' => $request->input('title'),
           'content' => $request->input('content'),
           'category_id' => $request->input('category_id')
       ]);
        return redirect()->route('posts.index', ['categories' => Category::all()]);
    }

    public function destroy(Post $post){
        $post->delete();
        return redirect()->route('posts.index');
    }
}
