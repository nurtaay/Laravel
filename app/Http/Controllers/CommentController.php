<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(){
        return redirect()->route('posts.index');
    }

   public function store(Request $request){
        Comment::create([
            'text' => $request->text,
            'post_id' => $request->post_id
        ]);
   }

    public function destroy(Comment $comment){
        $comment->delete();
        return redirect()->back()->with('message', 'Comment deleted successfully');
    }

}
