<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\PostRequest; // useする
use App\Models\Comment;
use App\Http\Controllers\CategoryController;


class PostController extends Controller
{
    public function index(Post $post)
    { 
       $posts = Post::with('comments')->get();
       return view('posts.index', compact('posts'));
    }

    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    }

    public function create(Post $post)
    {
        $posts = Post::all();
        return view('posts.create',compact('posts'));
    }

    public function store(Post $post, PostRequest $request) // 引数をRequestからPostRequestにする
    {
        $input = $request['post'];
        $post->fill($input)->save();
        return redirect('/posts/' . $post->id);
    }
    public function edit(Post $post)
     {
     return view('posts.edit')->with(['post' => $post]);
     }
     public function update(PostRequest $request, Post $post)
     { 
     $input_post = $request['post'];
     $post->fill($input_post)->save();
     
     return redirect('/posts/' . $post->id);
     }
     public function delete(Post $post)
     {
     $post->delete();
     return redirect('/');
     }
    
    
}