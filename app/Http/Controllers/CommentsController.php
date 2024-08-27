<?php

namespace App\Http\Controllers;

use App\Models\Comment;

class CommentsController extends Controller
{
    public function comments(Comment $comment)
    {
        return view('comments.show')->with(['comment' => $comment]);
    }
}