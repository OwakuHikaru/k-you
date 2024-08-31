<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentController extends Controller
{
    public function comments(Comment $comment)
    {
        return view('comments.show')->with(['comment' => $comment]);
    }
    
    public function delete(Comment $comment)
     {
     $comment->delete();
     return redirect('/index');
     }
     
     public function __construct(){
    $this->middleware('auth');
  }
}